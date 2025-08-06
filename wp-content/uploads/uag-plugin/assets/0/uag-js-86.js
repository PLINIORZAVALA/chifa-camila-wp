document.addEventListener("DOMContentLoaded", function(){ var selector = document.querySelectorAll( '.uagb-block-c973f564' );
if ( selector.length > 0 ) {

	var blockquote__tweet = selector[0].getElementsByClassName("uagb-blockquote__tweet-button");

	if ( blockquote__tweet.length > 0 ) {

		blockquote__tweet[0].addEventListener("click",function(){	
			var request_url = "https://twitter.com/intent/tweet?text=Click+here+to+change+this+text.+Lorem+ipsum+dolor+sit+amet%2C+consectetur+adipiscing+elit.+Ut+elit+tellus%2C+luctus+nec+ullamcorper+mattis%2C+pulvinar+dapibus+leo.Lorem+ipsum+dolor+sit+amet%2C+consectetur+adipiscing+elit.+Ut+elit+tellus%2C+luctus+nec+ullamcorper+mattis%2C+pulvinar+dapibus+leo.+%E2%80%94+Author+Name&url=http%3A%2F%2Flocalhost%2Fchifacamila%2Fchifacamila%2Fgaleria%2F";
			window.open( request_url );
		});
	}
}
 });