<?php
declare( strict_types=1 );
namespace Automattic\WooCommerce\StoreApi;

use Automattic\WooCommerce\StoreApi\Utilities\RateLimits;
use Automattic\WooCommerce\StoreApi\Utilities\CartTokenUtils;
use Automattic\WooCommerce\Utilities\FeaturesUtil;

/**
 * Authentication class.
 */
class Authentication {
	/**
	 * Hook into WP lifecycle events. This is hooked by the StoreAPI class on `rest_api_init`.
	 */
	public function init() {
		if ( ! $this->is_request_to_store_api() ) {
			return;
		}
		add_filter( 'rest_authentication_errors', array( $this, 'check_authentication' ) );
		add_filter( 'rest_authentication_errors', array( $this, 'opt_in_checkout_endpoint' ), 9, 1 );
		add_action( 'set_logged_in_cookie', array( $this, 'set_logged_in_cookie' ) );
		add_filter( 'rest_pre_serve_request', array( $this, 'send_cors_headers' ), 10, 4 );
		add_filter( 'rest_allowed_cors_headers', array( $this, 'allowed_cors_headers' ) );
		add_filter( 'rest_exposed_cors_headers', array( $this, 'exposed_cors_headers' ) );

		// Remove the default CORS headers--we will add our own.
		remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	}

	/**
	 * Add allowed cors headers for store API headers.
	 *
	 * @param array $allowed_headers Allowed headers.
	 * @return array
	 */
	public function allowed_cors_headers( $allowed_headers ) {
		$allowed_headers[] = 'Cart-Token';
		$allowed_headers[] = 'Nonce';
		return $allowed_headers;
	}

	/**
	 * Expose Store API headers in CORS responses.
	 * We're explicitly exposing the Cart-Token, not the nonce. Only one of them is needed.
	 *
	 * @param array $exposed_headers Exposed headers.
	 * @return array
	 */
	public function exposed_cors_headers( $exposed_headers ) {
		$exposed_headers[] = 'Cart-Token';
		return $exposed_headers;
	}

	/**
	 * Add CORS headers to a response object.
	 *
	 * These checks prevent access to the Store API from non-allowed origins. By default, the WordPress REST API allows
	 * access from any origin. Because some Store API routes return PII, we need to add our own CORS headers.
	 *
	 * Allowed origins can be changed using the WordPress `allowed_http_origins` or `allowed_http_origin` filters if
	 * access needs to be granted to other domains.
	 *
	 * Users of valid Cart Tokens are also allowed access from any origin.
	 *
	 * @param bool              $served Whether the request has already been served.
	 * @param \WP_REST_Response $result The response object.
	 * @param \WP_REST_Request  $request The request object.
	 * @param \WP_REST_Server   $server The REST server instance.
	 * @return bool
	 */
	public function send_cors_headers( $served, $result, $request, $server ) {
		$origin = get_http_origin();

		if ( 'null' !== $origin ) {
			$origin = esc_url_raw( $origin );
		}

		// Send standard CORS headers.
		$server->send_header( 'Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, PATCH, DELETE' );
		$server->send_header( 'Access-Control-Allow-Credentials', 'true' );
		$server->send_header( 'Vary', 'Origin', false );

		// Allow preflight requests, certain http origins, and any origin if a cart token is present. Preflight requests
		// are allowed because we'll be unable to validate cart token headers at that point.
		if ( $this->is_preflight() || CartTokenUtils::validate_cart_token( $this->get_cart_token( $request ) ) || is_allowed_http_origin( $origin ) ) {
			$server->send_header( 'Access-Control-Allow-Origin', $origin );
		}

		// Exit early during preflight requests. This is so someone cannot access API data by sending an OPTIONS request
		// with preflight headers and a _GET property to override the method.
		if ( $this->is_preflight() ) {
			exit;
		}

		return $served;
	}

	/**
	 * Is the request a preflight request? Checks the request method
	 *
	 * @return boolean
	 */
	protected function is_preflight() {
		return isset( $_SERVER['REQUEST_METHOD'], $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'], $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'], $_SERVER['HTTP_ORIGIN'] ) && 'OPTIONS' === $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * Gets the cart token from the request header.
	 *
	 * @param \WP_REST_Request $request The REST request instance.
	 * @return string
	 */
	protected function get_cart_token( \WP_REST_Request $request ) {
		return wc_clean( wp_unslash( $request->get_header( 'Cart-Token' ) ?? '' ) );
	}

	/**
	 * The Store API does not require authentication.
	 *
	 * @param \WP_Error|mixed $result Error from another authentication handler, null if we should handle it, or another value if not.
	 * @return \WP_Error|null|bool
	 */
	public function check_authentication( $result ) {
		// Enable Rate Limiting for logged-in users without 'edit posts' capability.
		if ( ! current_user_can( 'edit_posts' ) ) {
			$result = $this->apply_rate_limiting( $result );
		}

		// Pass through errors from other authentication methods used before this one.
		return ! empty( $result ) ? $result : true;
	}

	/**
	 * When the login cookies are set, they are not available until the next page reload. For the Store API, specifically
	 * for returning updated nonces, we need this to be available immediately.
	 *
	 * @param string $logged_in_cookie The value for the logged in cookie.
	 */
	public function set_logged_in_cookie( $logged_in_cookie ) {
		if ( ! defined( 'LOGGED_IN_COOKIE' ) ) {
			return;
		}
		$_COOKIE[ LOGGED_IN_COOKIE ] = $logged_in_cookie;
	}

	/**
	 * Opt in to rate limiting for the checkout endpoint.
	 *
	 * @param \WP_Error|mixed $result Error from another authentication handler, null if we should handle it, or another value if not.
	 * @return \WP_Error|null|bool
	 */
	public function opt_in_checkout_endpoint( $result ) {
		if (
			FeaturesUtil::feature_is_enabled( 'rate_limit_checkout' )
			&& $this->is_request_to_store_api()
			&& preg_match( '#/wc/store(?:/v\d+)?/checkout#', $GLOBALS['wp']->query_vars['rest_route'] )
			&& isset( $_SERVER['REQUEST_METHOD'] )
			&& 'POST' === $_SERVER['REQUEST_METHOD']
		) {
			add_filter(
				'woocommerce_store_api_rate_limit_options',
				function ( $options ) {
					$options['enabled'] = true;
					$options['limit']   = 3;
					$options['seconds'] = 60;
					return $options;
				},
				1,
				1
			);
		}
		return $result;
	}
	/**
	 * Applies Rate Limiting to the request, and passes through any errors from other authentication methods used before this one.
	 *
	 * @param \WP_Error|mixed $result Error from another authentication handler, null if we should handle it, or another value if not.
	 * @return \WP_Error|null|bool
	 */
	protected function apply_rate_limiting( $result ) {
		$rate_limiting_options = RateLimits::get_options();

		if ( $rate_limiting_options->enabled ) {
			$action_id = 'store_api_request_' . self::get_rate_limiting_id( $rate_limiting_options->proxy_support );

			$retry  = RateLimits::is_exceeded_retry_after( $action_id );
			$server = rest_get_server();
			$server->send_header( 'RateLimit-Limit', $rate_limiting_options->limit );

			if ( false !== $retry ) {
				$server->send_header( 'RateLimit-Remaining', 0 );
				$server->send_header( 'RateLimit-Retry-After', $retry );
				$server->send_header( 'RateLimit-Reset', time() + $retry );

				/**
				 * Fires when the rate limit is exceeded.
				 *
				 * @param string $ip_address The IP address of the request.
				 * @param string $action_id  The grouping identifier to the request.
				 *
				 * @since 8.9.0
				 * @since 9.8.0 Added $action_id parameter.
				 */
				do_action(
					'woocommerce_store_api_rate_limit_exceeded',
					self::get_ip_address( $rate_limiting_options->proxy_support ),
					$action_id
				);

				return new \WP_Error(
					'rate_limit_exceeded',
					sprintf(
						'Too many requests. Please wait %d seconds before trying again.',
						$retry
					),
					array( 'status' => 400 )
				);
			}

			$rate_limit = RateLimits::update_rate_limit( $action_id );
			$server->send_header( 'RateLimit-Remaining', $rate_limit->remaining );
			$server->send_header( 'RateLimit-Reset', $rate_limit->reset );
		}

		return $result;
	}

	/**
	 * Generates the request grouping identifier for the rate limiting.
	 *
	 * @param bool $proxy_support Rate Limiting proxy support.
	 *
	 * @return string
	 */
	protected static function get_rate_limiting_id( bool $proxy_support ): string {

		if ( is_user_logged_in() ) {
			$id = (string) get_current_user_id();
		} else {
			$id = md5( self::get_ip_address( $proxy_support ) );
		}

		/**
		 * Filters the rate limiting identifier.
		 *
		 * @param string $id The rate limiting identifier.
		 *
		 * @since 9.8.0
		 */
		$id = apply_filters( 'woocommerce_store_api_rate_limit_id', $id );

		return sanitize_key( $id );
	}

	/**
	 * Check if is request to the Store API.
	 *
	 * @return bool
	 */
	protected function is_request_to_store_api() {
		if ( empty( $GLOBALS['wp']->query_vars['rest_route'] ) ) {
			return false;
		}
		return 0 === strpos( $GLOBALS['wp']->query_vars['rest_route'], '/wc/store/' );
	}

	/**
	 * Get current user IP Address.
	 *
	 * X_REAL_IP and CLIENT_IP are custom implementations designed to facilitate obtaining a user's ip through proxies, load balancers etc.
	 *
	 * _FORWARDED_FOR (XFF) request header is a de-facto standard header for identifying the originating IP address of a client connecting to a web server through a proxy server.
	 * Note for X_FORWARDED_FOR, Proxy servers can send through this header like this: X-Forwarded-For: client1, proxy1, proxy2.
	 * Make sure we always only send through the first IP in the list which should always be the client IP.
	 * Documentation at https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Forwarded-For
	 *
	 * Forwarded request header contains information that may be added by reverse proxy servers (load balancers, CDNs, and so on).
	 * Documentation at https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Forwarded
	 * Full RFC at https://datatracker.ietf.org/doc/html/rfc7239
	 *
	 * @param boolean $proxy_support Enables/disables proxy support.
	 *
	 * @return string
	 */
	protected static function get_ip_address( bool $proxy_support = false ) {

		if ( ! $proxy_support ) {
			return self::validate_ip( sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? 'unresolved_ip' ) ) );
		}

		if ( array_key_exists( 'HTTP_X_REAL_IP', $_SERVER ) ) {
			return self::validate_ip( sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_REAL_IP'] ) ) );
		}

		if ( array_key_exists( 'HTTP_CLIENT_IP', $_SERVER ) ) {
			return self::validate_ip( sanitize_text_field( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ) ) );
		}

		if ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $_SERVER ) ) {
			$ips = explode( ',', sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) );
			if ( is_array( $ips ) && ! empty( $ips ) ) {
				return self::validate_ip( trim( $ips[0] ) );
			}
		}

		if ( array_key_exists( 'HTTP_FORWARDED', $_SERVER ) ) {
			// Using regex instead of explode() for a smaller code footprint.
			// Expected format: Forwarded: for=192.0.2.60;proto=http;by=203.0.113.43,for="[2001:db8:cafe::17]:4711"...
			preg_match(
				'/(?<=for\=)[^;,]*/i', // We catch everything on the first "for" entry, and validate later.
				sanitize_text_field( wp_unslash( $_SERVER['HTTP_FORWARDED'] ) ),
				$matches
			);

			if ( strpos( $matches[0] ?? '', '"[' ) !== false ) { // Detect for ipv6, eg "[ipv6]:port".
				preg_match(
					'/(?<=\[).*(?=\])/i', // We catch only the ipv6 and overwrite $matches.
					$matches[0],
					$matches
				);
			}

			if ( ! empty( $matches ) ) {
				return self::validate_ip( trim( $matches[0] ) );
			}
		}

		return '0.0.0.0';
	}

	/**
	 * Uses filter_var() to validate and return ipv4 and ipv6 addresses
	 * Will return 0.0.0.0 if the ip is not valid. This is done to group and still rate limit invalid ips.
	 *
	 * @param string $ip ipv4 or ipv6 ip string.
	 *
	 * @return string
	 */
	protected static function validate_ip( $ip ) {
		$ip = filter_var(
			$ip,
			FILTER_VALIDATE_IP,
			array( FILTER_FLAG_NO_RES_RANGE, FILTER_FLAG_IPV6 )
		);

		return $ip ?: '0.0.0.0';
	}
}
