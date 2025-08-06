<?php
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

//toggle button CSS
wp_enqueue_style('awl-blog-filter-settings-css', plugin_dir_url(__FILE__) . 'css/blog-filter-settings.css');
//wp_enqueue_style( 'awl-fontawesome-all-5.min-css', plugin_dir_url( __FILE__ ).'css/fontawesome-all-5.min.css' );
wp_enqueue_style('awl-font-awesome-4-min-css', plugin_dir_url(__FILE__) . 'css/font-awesome-4.min.css');
//wp_enqueue_style('awl-bootstrap-css', plugin_dir_url(__FILE__) . 'css/blog-filter-bootstrap.css');
wp_enqueue_style('awl-styles-css', plugin_dir_url(__FILE__) . 'css/styles.css');
wp_enqueue_style('wp-color-picker');

//js
wp_enqueue_script('jquery');
wp_enqueue_script('wp-color-picker');
wp_enqueue_script('awl-blog-filter-isotope-js', plugin_dir_url(__FILE__) . 'js/isotope.pkgd.js', array('jquery'), '', false);
wp_enqueue_script('awl-bootstrap-js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), '', true);

wp_enqueue_style('blog-filter-tailwind', plugin_dir_url(__FILE__) . 'css/styles.min.css', [], '1.0');
?>


<script src="https://cdn.tailwindcss.com"></script>

<script>
	// Ensure Tailwind is loaded before configuring it
	if (typeof tailwind !== 'undefined') {
		tailwind.config = {
			prefix: 'bfg-',
		};
	} else {
		console.error('Tailwind is not defined. Make sure Tailwind CSS is loaded before this script.');
	}
</script>
<div class="bfg-min-h-screen bfg-bg-[aliceblue] bfg-p-6">
	<div class="bfg-max-w-6xl bfg-mx-auto bfg-rounded-lg bfg-mt-8 ">
		<div class="bfg-shadow-lg">
			<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-bg-white bfg-p-8">

				<!-- Left side: your title -->
				<h1 class="bfg-text-xl bfg-font-bold">
					<?php _e('Blog Filter ', 'blog-filter'); ?>
				</h1>

				<!-- Right side: version + button in a single flex item -->
				<div class="bfg-flex bfg-items-center bfg-space-x-4">
					<span class="bfg-text-gray-500 bfg-text-sm">
					<?php _e('Try Pro Version – 5.9.0', 'blog-filter'); ?>
					</span>
					<a
					class="bfg-bg-[#6dbe73] bfg-hover:bg-green-600 bfg-text-white bfg-font-semibold
					bfg-px-4 bfg-py-2 bfg-rounded-md bfg-shadow-lg bfg-transition bfg-duration-200"
					target="_blank"
					href="https://awplife.com/product/blog-filter-wordpress-plugin/"
					style="text-decoration:none"
					>
					<?php _e('Upgrade To Pro', 'blog-filter'); ?>
					</a>
				</div>

			</div>

			<!-- Main Content Area -->
			<div class=" bfg-bg-[aliceblue]">

				<div class="bfg-flex">
					<!-- Sidebar Vertical Tabs -->
					<div class="bfg-w-1/4 bfg-border bfg-border-gray-100 bfg-bg-[white]">
						<ul class="bfg-flex bfg-flex-col">
							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'general')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M12 8.25C9.92894 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92894 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z"
												fill="#000000"></path>
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M11.9747 1.25C11.5303 1.24999 11.1592 1.24999 10.8546 1.27077C10.5375 1.29241 10.238 1.33905 9.94761 1.45933C9.27379 1.73844 8.73843 2.27379 8.45932 2.94762C8.31402 3.29842 8.27467 3.66812 8.25964 4.06996C8.24756 4.39299 8.08454 4.66251 7.84395 4.80141C7.60337 4.94031 7.28845 4.94673 7.00266 4.79568C6.64714 4.60777 6.30729 4.45699 5.93083 4.40743C5.20773 4.31223 4.47642 4.50819 3.89779 4.95219C3.64843 5.14353 3.45827 5.3796 3.28099 5.6434C3.11068 5.89681 2.92517 6.21815 2.70294 6.60307L2.67769 6.64681C2.45545 7.03172 2.26993 7.35304 2.13562 7.62723C1.99581 7.91267 1.88644 8.19539 1.84541 8.50701C1.75021 9.23012 1.94617 9.96142 2.39016 10.5401C2.62128 10.8412 2.92173 11.0602 3.26217 11.2741C3.53595 11.4461 3.68788 11.7221 3.68786 12C3.68785 12.2778 3.53592 12.5538 3.26217 12.7258C2.92169 12.9397 2.62121 13.1587 2.39007 13.4599C1.94607 14.0385 1.75012 14.7698 1.84531 15.4929C1.88634 15.8045 1.99571 16.0873 2.13552 16.3727C2.26983 16.6469 2.45535 16.9682 2.67758 17.3531L2.70284 17.3969C2.92507 17.7818 3.11058 18.1031 3.28089 18.3565C3.45817 18.6203 3.64833 18.8564 3.89769 19.0477C4.47632 19.4917 5.20763 19.6877 5.93073 19.5925C6.30717 19.5429 6.647 19.3922 7.0025 19.2043C7.28833 19.0532 7.60329 19.0596 7.8439 19.1986C8.08452 19.3375 8.24756 19.607 8.25964 19.9301C8.27467 20.3319 8.31403 20.7016 8.45932 21.0524C8.73843 21.7262 9.27379 22.2616 9.94761 22.5407C10.238 22.661 10.5375 22.7076 10.8546 22.7292C11.1592 22.75 11.5303 22.75 11.9747 22.75H12.0252C12.4697 22.75 12.8407 22.75 13.1454 22.7292C13.4625 22.7076 13.762 22.661 14.0524 22.5407C14.7262 22.2616 15.2616 21.7262 15.5407 21.0524C15.686 20.7016 15.7253 20.3319 15.7403 19.93C15.7524 19.607 15.9154 19.3375 16.156 19.1985C16.3966 19.0596 16.7116 19.0532 16.9974 19.2042C17.3529 19.3921 17.6927 19.5429 18.0692 19.5924C18.7923 19.6876 19.5236 19.4917 20.1022 19.0477C20.3516 18.8563 20.5417 18.6203 20.719 18.3565C20.8893 18.1031 21.0748 17.7818 21.297 17.3969L21.3223 17.3531C21.5445 16.9682 21.7301 16.6468 21.8644 16.3726C22.0042 16.0872 22.1135 15.8045 22.1546 15.4929C22.2498 14.7697 22.0538 14.0384 21.6098 13.4598C21.3787 13.1586 21.0782 12.9397 20.7378 12.7258C20.464 12.5538 20.3121 12.2778 20.3121 11.9999C20.3121 11.7221 20.464 11.4462 20.7377 11.2742C21.0783 11.0603 21.3788 10.8414 21.6099 10.5401C22.0539 9.96149 22.2499 9.23019 22.1547 8.50708C22.1136 8.19546 22.0043 7.91274 21.8645 7.6273C21.7302 7.35313 21.5447 7.03183 21.3224 6.64695L21.2972 6.60318C21.0749 6.21825 20.8894 5.89688 20.7191 5.64347C20.5418 5.37967 20.3517 5.1436 20.1023 4.95225C19.5237 4.50826 18.7924 4.3123 18.0692 4.4075C17.6928 4.45706 17.353 4.60782 16.9975 4.79572C16.7117 4.94679 16.3967 4.94036 16.1561 4.80144C15.9155 4.66253 15.7524 4.39297 15.7403 4.06991C15.7253 3.66808 15.686 3.2984 15.5407 2.94762C15.2616 2.27379 14.7262 1.73844 14.0524 1.45933C13.762 1.33905 13.4625 1.29241 13.1454 1.27077C12.8407 1.24999 12.4697 1.24999 12.0252 1.25H11.9747ZM10.5216 2.84515C10.5988 2.81319 10.716 2.78372 10.9567 2.76729C11.2042 2.75041 11.5238 2.75 12 2.75C12.4762 2.75 12.7958 2.75041 13.0432 2.76729C13.284 2.78372 13.4012 2.81319 13.4783 2.84515C13.7846 2.97202 14.028 3.21536 14.1548 3.52165C14.1949 3.61826 14.228 3.76887 14.2414 4.12597C14.271 4.91835 14.68 5.68129 15.4061 6.10048C16.1321 6.51968 16.9974 6.4924 17.6984 6.12188C18.0143 5.9549 18.1614 5.90832 18.265 5.89467C18.5937 5.8514 18.9261 5.94047 19.1891 6.14228C19.2554 6.19312 19.3395 6.27989 19.4741 6.48016C19.6125 6.68603 19.7726 6.9626 20.0107 7.375C20.2488 7.78741 20.4083 8.06438 20.5174 8.28713C20.6235 8.50382 20.6566 8.62007 20.6675 8.70287C20.7108 9.03155 20.6217 9.36397 20.4199 9.62698C20.3562 9.70995 20.2424 9.81399 19.9397 10.0041C19.2684 10.426 18.8122 11.1616 18.8121 11.9999C18.8121 12.8383 19.2683 13.574 19.9397 13.9959C20.2423 14.186 20.3561 14.29 20.4198 14.373C20.6216 14.636 20.7107 14.9684 20.6674 15.2971C20.6565 15.3799 20.6234 15.4961 20.5173 15.7128C20.4082 15.9355 20.2487 16.2125 20.0106 16.6249C19.7725 17.0373 19.6124 17.3139 19.474 17.5198C19.3394 17.72 19.2553 17.8068 19.189 17.8576C18.926 18.0595 18.5936 18.1485 18.2649 18.1053C18.1613 18.0916 18.0142 18.045 17.6983 17.8781C16.9973 17.5075 16.132 17.4803 15.4059 17.8995C14.68 18.3187 14.271 19.0816 14.2414 19.874C14.228 20.2311 14.1949 20.3817 14.1548 20.4784C14.028 20.7846 13.7846 21.028 13.4783 21.1549C13.4012 21.1868 13.284 21.2163 13.0432 21.2327C12.7958 21.2496 12.4762 21.25 12 21.25C11.5238 21.25 11.2042 21.2496 10.9567 21.2327C10.716 21.2163 10.5988 21.1868 10.5216 21.1549C10.2154 21.028 9.97201 20.7846 9.84514 20.4784C9.80512 20.3817 9.77195 20.2311 9.75859 19.874C9.72896 19.0817 9.31997 18.3187 8.5939 17.8995C7.86784 17.4803 7.00262 17.5076 6.30158 17.8781C5.98565 18.0451 5.83863 18.0917 5.73495 18.1053C5.40626 18.1486 5.07385 18.0595 4.81084 17.8577C4.74458 17.8069 4.66045 17.7201 4.52586 17.5198C4.38751 17.314 4.22736 17.0374 3.98926 16.625C3.75115 16.2126 3.59171 15.9356 3.4826 15.7129C3.37646 15.4962 3.34338 15.3799 3.33248 15.2971C3.28921 14.9684 3.37828 14.636 3.5801 14.373C3.64376 14.2901 3.75761 14.186 4.0602 13.9959C4.73158 13.5741 5.18782 12.8384 5.18786 12.0001C5.18791 11.1616 4.73165 10.4259 4.06021 10.004C3.75769 9.81389 3.64385 9.70987 3.58019 9.62691C3.37838 9.3639 3.28931 9.03149 3.33258 8.7028C3.34348 8.62001 3.37656 8.50375 3.4827 8.28707C3.59181 8.06431 3.75125 7.78734 3.98935 7.37493C4.22746 6.96253 4.3876 6.68596 4.52596 6.48009C4.66055 6.27983 4.74468 6.19305 4.81093 6.14222C5.07395 5.9404 5.40636 5.85133 5.73504 5.8946C5.83873 5.90825 5.98576 5.95483 6.30173 6.12184C7.00273 6.49235 7.86791 6.51962 8.59394 6.10045C9.31998 5.68128 9.72896 4.91837 9.75859 4.12602C9.77195 3.76889 9.80512 3.61827 9.84514 3.52165C9.97201 3.21536 10.2154 2.97202 10.5216 2.84515Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('General Settings', 'blog-filter'); ?>
								</button>
							</li>

							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'filter')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M3 1.25C3.41421 1.25 3.75 1.58579 3.75 2V22C3.75 22.4142 3.41421 22.75 3 22.75C2.58579 22.75 2.25 22.4142 2.25 22V2C2.25 1.58579 2.58579 1.25 3 1.25ZM9.46777 4.25H18.5322C18.972 4.24998 19.3514 4.24997 19.6626 4.27818C19.9918 4.30802 20.3178 4.37407 20.625 4.55144C20.967 4.74892 21.2511 5.03296 21.4486 5.375C21.6259 5.68221 21.692 6.00817 21.7218 6.33735C21.75 6.64864 21.75 7.02797 21.75 7.46775V7.53225C21.75 7.97203 21.75 8.35136 21.7218 8.66265C21.692 8.99183 21.6259 9.31779 21.4486 9.625C21.2511 9.96704 20.967 10.2511 20.625 10.4486C20.3178 10.6259 19.9918 10.692 19.6626 10.7218C19.3514 10.75 18.972 10.75 18.5322 10.75H9.46779C9.028 10.75 8.64865 10.75 8.33735 10.7218C8.00817 10.692 7.68221 10.6259 7.375 10.4486C7.03296 10.2511 6.74892 9.96704 6.55144 9.625C6.37407 9.31779 6.30802 8.99183 6.27818 8.66265C6.24997 8.35136 6.24998 7.97201 6.25 7.53223V7.46777C6.24998 7.02799 6.24997 6.64864 6.27818 6.33735C6.30802 6.00817 6.37407 5.68221 6.55144 5.375C6.74892 5.03296 7.03296 4.74892 7.375 4.55144C7.68221 4.37407 8.00817 4.30802 8.33735 4.27818C8.64864 4.24997 9.02799 4.24998 9.46777 4.25ZM8.47274 5.77206C8.2476 5.79246 8.16586 5.82689 8.125 5.85048C8.01099 5.91631 7.91631 6.01099 7.85048 6.125C7.82689 6.16586 7.79246 6.2476 7.77206 6.47275C7.75072 6.7082 7.75 7.01889 7.75 7.5C7.75 7.98111 7.75072 8.2918 7.77206 8.52725C7.79246 8.7524 7.82689 8.83414 7.85048 8.875C7.91631 8.98901 8.01099 9.08369 8.125 9.14952C8.16586 9.17311 8.2476 9.20754 8.47274 9.22794C8.7082 9.24928 9.01889 9.25 9.5 9.25H18.5C18.9811 9.25 19.2918 9.24928 19.5273 9.22794C19.7524 9.20754 19.8341 9.17311 19.875 9.14952C19.989 9.08369 20.0837 8.98901 20.1495 8.875C20.1731 8.83414 20.2075 8.7524 20.2279 8.52725C20.2493 8.2918 20.25 7.98111 20.25 7.5C20.25 7.01889 20.2493 6.7082 20.2279 6.47275C20.2075 6.2476 20.1731 6.16586 20.1495 6.125C20.0837 6.01099 19.989 5.91631 19.875 5.85048C19.8341 5.82689 19.7524 5.79246 19.5273 5.77206C19.2918 5.75072 18.9811 5.75 18.5 5.75H9.5C9.01889 5.75 8.7082 5.75072 8.47274 5.77206ZM9.46779 13.25H15.5322C15.972 13.25 16.3514 13.25 16.6627 13.2782C16.9918 13.308 17.3178 13.3741 17.625 13.5514C17.967 13.7489 18.2511 14.033 18.4486 14.375C18.6259 14.6822 18.692 15.0082 18.7218 15.3373C18.75 15.6486 18.75 16.028 18.75 16.4678V16.5322C18.75 16.972 18.75 17.3514 18.7218 17.6627C18.692 17.9918 18.6259 18.3178 18.4486 18.625C18.2511 18.967 17.967 19.2511 17.625 19.4486C17.3178 19.6259 16.9918 19.692 16.6627 19.7218C16.3514 19.75 15.972 19.75 15.5322 19.75H9.46775C9.02797 19.75 8.64864 19.75 8.33735 19.7218C8.00817 19.692 7.68221 19.6259 7.375 19.4486C7.03296 19.2511 6.74892 18.967 6.55144 18.625C6.37407 18.3178 6.30802 17.9918 6.27818 17.6627C6.24997 17.3514 6.24998 16.972 6.25 16.5322V16.4678C6.24998 16.028 6.24997 15.6486 6.27818 15.3373C6.30802 15.0082 6.37407 14.6822 6.55144 14.375C6.74892 14.033 7.03296 13.7489 7.375 13.5514C7.68221 13.3741 8.00817 13.308 8.33735 13.2782C8.64865 13.25 9.028 13.25 9.46779 13.25ZM8.47275 14.7721C8.2476 14.7925 8.16586 14.8269 8.125 14.8505C8.01099 14.9163 7.91631 15.011 7.85048 15.125C7.82689 15.1659 7.79246 15.2476 7.77206 15.4727C7.75072 15.7082 7.75 16.0189 7.75 16.5C7.75 16.9811 7.75072 17.2918 7.77206 17.5273C7.79246 17.7524 7.82689 17.8341 7.85048 17.875C7.91631 17.989 8.01099 18.0837 8.125 18.1495C8.16586 18.1731 8.2476 18.2075 8.47274 18.2279C8.7082 18.2493 9.01889 18.25 9.5 18.25H15.5C15.9811 18.25 16.2918 18.2493 16.5273 18.2279C16.7524 18.2075 16.8341 18.1731 16.875 18.1495C16.989 18.0837 17.0837 17.989 17.1495 17.875C17.1731 17.8341 17.2075 17.7524 17.2279 17.5273C17.2493 17.2918 17.25 16.9811 17.25 16.5C17.25 16.0189 17.2493 15.7082 17.2279 15.4727C17.2075 15.2476 17.1731 15.1659 17.1495 15.125C17.0837 15.011 16.989 14.9163 16.875 14.8505C16.8341 14.8269 16.7524 14.7925 16.5273 14.7721C16.2918 14.7507 15.9811 14.75 15.5 14.75H9.5C9.01889 14.75 8.7082 14.7507 8.47275 14.7721Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Filter Settings', 'blog-filter'); ?>
								</button>
							</li>

							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'image')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62178 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62178 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12C21.25 9.62178 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62178 2.75 7.91356 2.75159 6.61358 2.92637ZM16 6.75C15.3096 6.75 14.75 7.30964 14.75 8C14.75 8.69036 15.3096 9.25 16 9.25C16.6904 9.25 17.25 8.69036 17.25 8C17.25 7.30964 16.6904 6.75 16 6.75ZM13.25 8C13.25 6.48122 14.4812 5.25 16 5.25C17.5188 5.25 18.75 6.48122 18.75 8C18.75 9.51878 17.5188 10.75 16 10.75C14.4812 10.75 13.25 9.51878 13.25 8ZM8.50397 13.1766C7.91991 12.5566 6.94501 12.5241 6.32092 13.1038L5.51041 13.8566C5.20691 14.1385 4.73236 14.1209 4.45047 13.8174C4.16858 13.5139 4.1861 13.0394 4.48959 12.7575L5.3001 12.0047C6.52816 10.8641 8.44651 10.9281 9.59579 12.1481L12.2433 14.9584C12.5202 15.2523 12.9735 15.2919 13.2972 15.0504C14.4971 14.1553 16.1679 14.257 17.2503 15.2911L19.5181 17.4577C19.8176 17.7438 19.8284 18.2186 19.5423 18.5181C19.2562 18.8176 18.7814 18.8284 18.4819 18.5423L16.2141 16.3757C15.661 15.8473 14.8073 15.7953 14.1941 16.2527C13.2596 16.9499 11.9509 16.8356 11.1515 15.9869L8.50397 13.1766Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Image Settings', 'blog-filter'); ?>
								</button>
							</li>
							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'title')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C21.1071 3.38961 21.4392 4.33856 21.5969 5.51098C21.75 6.65019 21.75 8.10583 21.75 9.94359V14.0564C21.75 15.8942 21.75 17.3498 21.5969 18.489C21.4392 19.6614 21.1071 20.6104 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.7213 19.8749 19.975 19.2952 20.1102 18.2892C20.2484 17.2615 20.25 15.9068 20.25 14V10C20.25 8.09318 20.2484 6.73851 20.1102 5.71085C19.975 4.70476 19.7213 4.12511 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976ZM7.25 10C7.25 9.58579 7.58579 9.25 8 9.25H16C16.4142 9.25 16.75 9.58579 16.75 10C16.75 10.4142 16.4142 10.75 16 10.75H8C7.58579 10.75 7.25 10.4142 7.25 10ZM7.25 14C7.25 13.5858 7.58579 13.25 8 13.25H13C13.4142 13.25 13.75 13.5858 13.75 14C13.75 14.4142 13.4142 14.75 13 14.75H8C7.58579 14.75 7.25 14.4142 7.25 14Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Title & Discription Settings', 'blog-filter'); ?>
								</button>
							</li>

							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'link')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path
												d="M15.7285 3.88396C17.1629 2.44407 19.2609 2.41383 20.4224 3.57981C21.586 4.74798 21.5547 6.85922 20.1194 8.30009L17.6956 10.7333C17.4033 11.0268 17.4042 11.5017 17.6976 11.794C17.9911 12.0863 18.466 12.0854 18.7583 11.7919L21.1821 9.35869C23.0934 7.43998 23.3334 4.37665 21.4851 2.5212C19.6346 0.663551 16.5781 0.905664 14.6658 2.82536L9.81817 7.69182C7.90688 9.61053 7.66692 12.6739 9.51519 14.5293C9.80751 14.8228 10.2824 14.8237 10.5758 14.5314C10.8693 14.2391 10.8702 13.7642 10.5779 13.4707C9.41425 12.3026 9.44559 10.1913 10.8809 8.75042L15.7285 3.88396Z"
												fill="#000000"></path>
											<path
												d="M14.4851 9.47074C14.1928 9.17728 13.7179 9.17636 13.4244 9.46868C13.131 9.76101 13.1301 10.2359 13.4224 10.5293C14.586 11.6975 14.5547 13.8087 13.1194 15.2496L8.27178 20.1161C6.83745 21.556 4.73937 21.5863 3.57791 20.4203C2.41424 19.2521 2.44559 17.1408 3.88089 15.6999L6.30473 13.2667C6.59706 12.9732 6.59614 12.4984 6.30268 12.206C6.00922 11.9137 5.53434 11.9146 5.24202 12.2081L2.81818 14.6413C0.906876 16.5601 0.666916 19.6234 2.51519 21.4789C4.36567 23.3365 7.42221 23.0944 9.33449 21.1747L14.1821 16.3082C16.0934 14.3895 16.3334 11.3262 14.4851 9.47074Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Link (Url) Settings', 'blog-filter'); ?>
								</button>
							</li class="bfg-mb-0">


							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'post-meta')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M10.6628 3.25L13.3962 3.25C14.4775 3.24999 15.3438 3.24998 16.0539 3.32024C16.7893 3.393 17.4138 3.54511 18.0018 3.88204C18.5885 4.21826 19.0412 4.68264 19.4875 5.28464C19.9201 5.86804 20.3781 6.62574 20.9521 7.57545L21.6722 8.7667C22.1517 9.55986 22.5408 10.2035 22.8055 10.7633C23.0815 11.3467 23.25 11.8935 23.25 12.5C23.25 13.1065 23.0815 13.6533 22.8055 14.2367C22.5408 14.7965 22.1517 15.4401 21.6722 16.2333L20.9521 17.4246C20.3781 18.3743 19.9201 19.132 19.4875 19.7154C19.0412 20.3174 18.5885 20.7817 18.0018 21.118C17.4138 21.4549 16.7893 21.607 16.0539 21.6798C15.3438 21.75 14.4775 21.75 13.3962 21.75H10.6628C8.77448 21.75 7.27837 21.75 6.10742 21.5873C4.90024 21.4194 3.92827 21.0659 3.16484 20.2766C2.4048 19.4908 2.06748 18.4962 1.90675 17.2601C1.74998 16.0544 1.74999 14.5118 1.75 12.555V12.445C1.74999 10.4882 1.74998 8.94556 1.90675 7.73988C2.06748 6.50385 2.4048 5.50922 3.16484 4.72339C3.92827 3.93405 4.90024 3.58055 6.10742 3.41274C7.27838 3.24997 8.7745 3.24998 10.6628 3.25ZM6.31395 4.89846C5.28243 5.04185 4.68356 5.31074 4.24305 5.76621C3.79914 6.22517 3.53449 6.85468 3.39423 7.93331C3.25149 9.03102 3.25 10.476 3.25 12.5C3.25 14.524 3.25149 15.969 3.39423 17.0667C3.53449 18.1453 3.79914 18.7748 4.24305 19.2338C4.68356 19.6893 5.28243 19.9582 6.31395 20.1015C7.36968 20.2483 8.76142 20.25 10.721 20.25H13.358C14.4863 20.25 15.2785 20.2492 15.9062 20.187C16.517 20.1266 16.9142 20.0123 17.256 19.8165C17.599 19.6199 17.9062 19.3297 18.2826 18.822C18.668 18.3022 19.09 17.6055 19.6875 16.617L20.3683 15.4908C20.8728 14.6562 21.2214 14.0778 21.4495 13.5954C21.6702 13.1287 21.75 12.8077 21.75 12.5C21.75 12.1923 21.6702 11.8713 21.4495 11.4046C21.2214 10.9222 20.8728 10.3438 20.3683 9.50924L19.6875 8.383C19.09 7.39452 18.668 6.69782 18.2826 6.17798C17.9062 5.6703 17.599 5.38005 17.256 5.1835C16.9142 4.98766 16.517 4.87339 15.9062 4.81295C15.2785 4.75084 14.4863 4.75 13.358 4.75H10.721C8.76142 4.75 7.36968 4.7517 6.31395 4.89846ZM7.5 7.24512C7.91421 7.24512 8.25 7.5809 8.25 7.99512V17C8.25 17.4142 7.91421 17.75 7.5 17.75C7.08579 17.75 6.75 17.4142 6.75 17V7.99512C6.75 7.5809 7.08579 7.24512 7.5 7.24512Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Post Meta Settings', 'blog-filter'); ?>
								</button>
							</li>

							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'post-filter-order')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M19.75 10C19.75 10.4142 19.4142 10.75 19 10.75L5 10.75C4.58579 10.75 4.25 10.4142 4.25 10C4.25 9.58579 4.58579 9.25 5 9.25L19 9.25C19.4142 9.25 19.75 9.58579 19.75 10Z"
												fill="#000000"></path>
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M19.75 14C19.75 14.4142 19.4142 14.75 19 14.75L5 14.75C4.58579 14.75 4.25 14.4142 4.25 14C4.25 13.5858 4.58579 13.25 5 13.25L19 13.25C19.4142 13.25 19.75 13.5858 19.75 14Z"
												fill="#000000"></path>
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M19.75 6C19.75 6.41421 19.4142 6.75 19 6.75L5 6.75C4.58579 6.75 4.25 6.41421 4.25 6C4.25 5.58579 4.58579 5.25 5 5.25L19 5.25C19.4142 5.25 19.75 5.58579 19.75 6Z"
												fill="#000000"></path>
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M19.75 18C19.75 18.4142 19.4142 18.75 19 18.75L5 18.75C4.58579 18.75 4.25 18.4142 4.25 18C4.25 17.5858 4.58579 17.25 5 17.25L19 17.25C19.4142 17.25 19.75 17.5858 19.75 18Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Post & Filter Order', 'blog-filter'); ?>
								</button>
							</li>

							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'pagination')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M6.27769 1.7555C5.1348 1.01747 3.83955 1.13428 2.86078 1.80371C1.89423 2.46477 1.25 3.64507 1.25 5.03297V18.9672C1.25 20.3551 1.89423 21.5354 2.86078 22.1965C3.83956 22.8659 5.1348 22.9827 6.2777 22.2447L17.0667 15.2775C18.217 14.5347 18.75 13.2342 18.75 12.0001C18.75 10.7659 18.217 9.46544 17.0667 8.72261L6.27769 1.7555ZM2.75 5.03297C2.75 4.11167 3.17287 3.40753 3.70757 3.04182C4.23005 2.68448 4.87022 2.63219 5.46397 3.0156L16.253 9.98271C16.8895 10.3938 17.25 11.1637 17.25 12.0001C17.25 12.8364 16.8895 13.6064 16.253 14.0174L5.46397 20.9846C4.87023 21.368 4.23005 21.3157 3.70758 20.9583C3.17287 20.5926 2.75 19.8885 2.75 18.9672L2.75 5.03297Z"
												fill="#000000"></path>
											<path
												d="M22.75 5.00008C22.75 4.58586 22.4142 4.25008 22 4.25008C21.5858 4.25008 21.25 4.58586 21.25 5.00008V19.0001C21.25 19.4143 21.5858 19.7501 22 19.7501C22.4142 19.7501 22.75 19.4143 22.75 19.0001V5.00008Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Pagination Settings', 'blog-filter'); ?>
								</button>
							</li>
							<li class="bfg-mb-0">
								<button
									class="bfg-w-full bfg-text-left bfg-py-3 bfg-px-4 bfg-font-medium bfg-border-gray-200 hover:bfg-bg-[aliceblue] active-tab    bfg-flex bfg-gap-2 bfg-items-center"
									onclick="showTab(event, 'exclude')">
									<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
										<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
										</g>
										<g id="SVGRepo_iconCarrier">
											<path
												d="M10.0303 8.96967C9.73741 8.67678 9.26253 8.67678 8.96964 8.96967C8.67675 9.26256 8.67675 9.73744 8.96964 10.0303L10.9393 12L8.96966 13.9697C8.67677 14.2626 8.67677 14.7374 8.96966 15.0303C9.26255 15.3232 9.73743 15.3232 10.0303 15.0303L12 13.0607L13.9696 15.0303C14.2625 15.3232 14.7374 15.3232 15.0303 15.0303C15.3232 14.7374 15.3232 14.2625 15.0303 13.9697L13.0606 12L15.0303 10.0303C15.3232 9.73746 15.3232 9.26258 15.0303 8.96969C14.7374 8.6768 14.2625 8.6768 13.9696 8.96969L12 10.9394L10.0303 8.96967Z"
												fill="#000000"></path>
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M12.0574 1.25H11.9426C9.63424 1.24999 7.82519 1.24998 6.41371 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63422 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.41371 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62177 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62177 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z"
												fill="#000000"></path>
										</g>
									</svg> <?php _e('Exclude Posts', 'blog-filter'); ?>
								</button>
							</li>
						</ul>
					</div>

					<!-- Settings Content -->
					<div class="bfg-w-3/4  bfg-border bfg-border-gray-100 bfg-bg-[white]">

						<div id="general" class="settings-tab ">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-lg bfg-font-semibold"><?php _e('General Settings', 'blog-filter'); ?></h2>
							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-8">

								<div class="bfg-flex bfg-justify-between bfg-items-center bfg-py-2">
									<label for="post_type"
										class="bfg-font-medium"><?php _e('Select Custom Post Type', 'blog-filter'); ?></label>
									<select id="post_type" name="post_type"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-1/3">
										<?php
										$args = array(
											'public' => true,
										);
										$post_types = get_post_types( $args, 'objects' );
										$selected_post_type = get_option( 'your_plugin_post_type_setting', 'post' );

										if ( ! empty( $post_types ) ) {
											foreach ( $post_types as $post_type ) {
												// Only 'post' and 'page' should be selectable
												$is_enabled  = in_array( $post_type->name, array( 'post', 'page' ), true );
												$disabled    = $is_enabled ? '' : 'disabled';
												// We only allow selecting 'post' or 'page'; ignore saved values for others
												$is_selected = ( $is_enabled && $post_type->name === $selected_post_type ) ? 'selected' : '';

												printf(
													'<option value="%s" %s %s>%s</option>' . "\n",
													esc_attr( $post_type->name ),
													$disabled,
													$is_selected,
													esc_html( $post_type->label )
												);
											}
										}
										?>
									</select>
								</div>

								<!-- Toggle Switch Component -->
								<div class="bfg-flex bfg-justify-between bfg-items-center ">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Template Right To Left ', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_direction" name="blog_direction" value="rtl"
											class="bfg-sr-only bfg-peer" onchange="toggleSwitch(this)">
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Toggle Switch Example -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Enable Fixed Grid', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_fixed_grid" name="blog_fixed_grid" value="yes"
											class="bfg-sr-only bfg-peer" onchange="toggleSwitch(this)">
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Dropdown Selection -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Blog Template', 'blog-filter'); ?></p>
									<select id="blog_template" name="blog_template"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="template1"><?php _e('Template 1', 'blog-filter'); ?></option>
										<option value="template1" disabled><?php _e('Template 2', 'blog-filter'); ?></option>
										<option value="template1"disabled><?php _e('Template 3', 'blog-filter'); ?></option>
									</select>
								</div>

								<!-- Dropdown Selection -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Column On Large Desktop', 'blog-filter'); ?>
									</p>
									<select id="blog_col_large_desktops" name="blog_col_large_desktops"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="col-lg-12"><?php _e('1 Column', 'blog-filter'); ?></option>
										<option value="col-lg-6"><?php _e('2 Column', 'blog-filter'); ?></option>
										<option value="col-lg-4" selected><?php _e('3 Column', 'blog-filter'); ?>
										</option>
										<option value="col-lg-3"><?php _e('4 Column', 'blog-filter'); ?></option>
										<option value="col-lg-2"><?php _e('6 Column', 'blog-filter'); ?></option>
										<option value="col-lg-1"><?php _e('12 Column', 'blog-filter'); ?></option>
									</select>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Column On Desktop', 'blog-filter'); ?>
									</p>
									<select id="blog_col_desktops" name="blog_col_desktops"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="col-md-12"><?php _e('1 Column', 'blog-filter'); ?></option>
										<option value="col-md-6"><?php _e('2 Column', 'blog-filter'); ?></option>
										<option value="col-md-4" selected><?php _e('3 Column', 'blog-filter'); ?>
										</option>
										<option value="col-md-3"><?php _e('4 Column', 'blog-filter'); ?></option>
										<option value="col-md-2"><?php _e('6 Column', 'blog-filter'); ?></option>
										<option value="col-md-1"><?php _e('12 Column', 'blog-filter'); ?></option>
									</select>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Column On Tablet', 'blog-filter'); ?>
									</p>
									<select id="blog_col_tablets" name="blog_col_tablets"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="col-sm-12"><?php _e('1 Column', 'blog-filter'); ?></option>
										<option value="col-sm-6" selected><?php _e('2 Column', 'blog-filter'); ?>
										</option>
										<option value="col-sm-4"><?php _e('3 Column', 'blog-filter'); ?></option>
										<option value="col-sm-3"><?php _e('4 Column', 'blog-filter'); ?></option>
										<option value="col-sm-2"><?php _e('6 Column', 'blog-filter'); ?> &nbsp </option>
									</select>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Column On Phone', 'blog-filter'); ?>
									</p>
									<select id="blog_col_phones" name="blog_col_phones"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="col-xs-12" selected><?php _e('1 Column', 'blog-filter'); ?>
										</option>
										<option value="col-xs-6"><?php _e('2 Column', 'blog-filter'); ?></option>
										<option value="col-xs-4"><?php _e('3 Column', 'blog-filter'); ?></option>
										<option value="col-xs-3"><?php _e('4 Column', 'blog-filter'); ?> &nbsp </option>
									</select>
								</div>
								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
									<h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
										<?php esc_html_e( 'More options in pro', 'blog-filter' ); ?>
									</h3>
									<div>
										<div id=""
											class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
											<label for="bfg_term_select"
												class="bfg-font-medium"><?php _e('CPT ( Custom Post Type ) Select Option', 'blog-filter'); ?></label>
										</div>
									</div>
									<!-- Filter Style Dropdown -->
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium"><?php _e('2 Pro Templates', 'blog-filter'); ?></p>
										
									</div>
									
								</div>
							</div>
						</div>

						<div id="filter" class="settings-tab bfg-hidden">

							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Filter Settings', 'blog-filter'); ?></h2>
							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">

								<div class="bfg-flex bfg-justify-between bfg-items-center bfg-py-2">
									<label for="bfg_taxonomy_select"
										class="bfg-font-medium"><?php _e('Select Taxonomy for Filtering', 'blog-filter'); ?></label>
									<select id="bfg_taxonomy_select" name="bfg_taxonomy_select"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-1/3">
										<option value=""><?php _e('Select a post type first', 'blog-filter'); ?>
										</option>
									</select>
								</div>
								
								<div id="bfg_term_table_container" class="bfg-flex-col bfg-gap-4 bfg-hidden">
									<div id="bfg_term_table_loader" class="bfg-text-center bfg-py-4">
										<p><?php _e('Loading terms...', 'blog-filter'); ?></p>
									</div>
								</div>

								<!-- Show Filters Toggle -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Filters', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_filters" name="blog_filters" value="yes" checked class="bfg-sr-only bfg-peer" >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Show Post Count On Filters Toggle -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Show Post Count On Filters', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="filter_post_count" name="filter_post_count"
											value="yes" class="bfg-sr-only bfg-peer" checked>
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Filter "All', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_filter_all" name="blog_filter_all" value="yes"
											checked class="bfg-sr-only bfg-peer" checked >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Text For 'All' Button -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Text For "All" Button', 'blog-filter'); ?>
									</p>
									<input type="text" id="blog_all_text" name="blog_all_text"
										value="All"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Blog Search Field', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_search" name="blog_search" value="yes" checked
											class="bfg-sr-only bfg-peer" >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Text For Search', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="text" id="blog_search_text" name="blog_search_text" value="Search"
											style="width: -webkit-fill-available;">
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Buttons Color', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="text" class="form-control" id="blog_buttons_color"
											name="blog_buttons_color" value="#58BBEE" default-color="#58BBEE">
									</label>
								</div>
								
								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
									<h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
										<?php esc_html_e( 'Filter options in pro', 'blog-filter' ); ?>
									</h3>
									<div>
										<div id=""
											class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
											<label for="bfg_term_select"
												class="bfg-font-medium"><?php _e('Select Default Filter Term', 'blog-filter'); ?></label>
											
										</div>
									</div>
									<!-- Filter Style Dropdown -->
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium"><?php _e('Filter Style', 'blog-filter'); ?></p>
										
									</div>
									<!-- Filters In Dropdown Toggle -->
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Filters In Dropdown', 'blog-filter'); ?>
										</p>
										
									</div>
									
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Multi-Filter In Same Time', 'blog-filter'); ?>
										</p>
										
									</div>
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('"And" logic for Multi-Filter', 'blog-filter'); ?>
										</p>
										
									</div>
									<div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('URL Based Filtering', 'blog-filter'); ?>
										</p>
										
									</div>
								</div>

							</div>

						</div>

						<div id="image" class="settings-tab bfg-hidden">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Image Settings', 'blog-filter'); ?></h2>
							</div>

							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">
								<!-- Toggle Switch Example -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Blog Images', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_image" name="blog_image" value="yes" checked
											class="bfg-sr-only bfg-peer" onchange="toggleSwitch(this)">
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Dropdown Selection -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Image Quality', 'blog-filter'); ?></p>
									<select id="blog_image_quality" name="blog_image_quality"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="thumbnail"><?php _e('Thumbnail', 'blog-filter'); ?></option>
										<option value="medium" selected><?php _e('Medium', 'blog-filter'); ?></option>
										<option value="large"><?php _e('Large', 'blog-filter'); ?></option>
										<option value="full"><?php _e('Full', 'blog-filter'); ?></option>
									</select>
								</div>
								<!-- Dropdown Selection -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Image Hover Effect', 'blog-filter'); ?>
									</p>
									<select id="blog_image_hover_effect" name="blog_image_hover_effect"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										<option value="none"><?php _e('None', 'blog-filter'); ?> &nbsp &nbsp </option>
										<option value="hover1" selected><?php _e('Hover 1', 'blog-filter'); ?></option>
										<option value="hover1"disabled><?php _e('Hover 2', 'blog-filter'); ?></option>
										<option value="hover1"disabled><?php _e('Hover 3', 'blog-filter'); ?></option>
										<option value="hover1"disabled><?php _e('Hover 4', 'blog-filter'); ?></option>
										<option value="hover1"disabled><?php _e('Hover 5', 'blog-filter'); ?></option>
									</select>
								</div>
								

								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
								  <h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
									<?php esc_html_e( 'Image options in pro', 'blog-filter' ); ?>
								  </h3>

								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php esc_html_e( 'Get more hover effect in Pro', 'blog-filter' ); ?></p>
									
								  </div>
								  
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Image', 'blog-filter'); ?></p>
									
								  </div>

								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Lightbox On Image', 'blog-filter'); ?></p>
									
								  </div>

								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Thumbnail Hover Effect', 'blog-filter'); ?></p>
									
								  </div>

								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Thumbnail Spacing', 'blog-filter'); ?></p>
									
								  </div>
								</div>
				
							</div>
						</div>

						<div id="title" class="settings-tab bfg-hidden">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Title Settings', 'blog-filter'); ?></h2>

							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Blog Title', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_title" name="blog_title" value="yes"
											class="bfg-sr-only bfg-peer" checked onchange="toggleSwitch(this)">
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>


								<div class="blog_title_below_image bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Title Below The Image', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_title_below_image" name="blog_title_below_image"
											value="yes" class="bfg-sr-only bfg-peer" onchange="toggleSwitch(this)">
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Title Text Color', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="text" class="form-control" id="blog_title_color" name="blog_title_color" value="#000" default-color="#000">
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Title Font Size', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<p class="range-slider">
											<input id="blog_title_font_size" name="blog_title_font_size"
												class="range-slider__range" type="range" value="25" min="15" max="45"
												step="1">
											<span class="range-slider__value">0</span>
										</p>
									</label>
								</div>

								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Discription Settings', 'blog-filter'); ?></h2>

								<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6">
									<!-- Show Blog Description -->

									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Show Blog Description', 'blog-filter'); ?>
										</p>
										<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
											<input type="checkbox" id="blog_desc" name="blog_desc" value="yes" checked
												class="bfg-sr-only bfg-peer" onchange="toggleSwitch(this)">
											<div
												class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
											</div>
											<div
												class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
											</div>
										</label>
									</div>

									<!-- Description Text Color -->

									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Description Text Color', 'blog-filter'); ?>
										</p>
										<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
											<input type="text" class="form-control" id="blog_desc_color"
												name="blog_desc_color"
												value="#606060"
												default-color="#606060">
										</label>
									</div>

									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Description Box Color', 'blog-filter'); ?>
										</p>
										<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
											<input type="text" class="form-control" id="blog_desc_box_color"
												name="blog_desc_box_color"
												value="#EDEEF0"
												default-color="#EDEEF0">
										</label>
									</div>

									<!-- Description Font Size -->

									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Description Font Size', 'blog-filter'); ?>
										</p>
										<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
											<p class="range-slider">
												<input id="blog_desc_font_size" name="blog_desc_font_size"
													class="range-slider__range" type="range" value="14" min="8" max="25"
													step="1">
												<span class="range-slider__value">0
											</p>
											</p>
										</label>
									</div>

									<!-- Characters in Description -->
									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('How Many Characters to Show in Description', 'blog-filter'); ?>
										</p>
										<input type="number" id="blog_desc_characters" name="blog_desc_characters"
											value="100" min="10" class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-24">
									</div>

									<!-- Three Dots After Description -->
									<div class="bfg-flex bfg-justify-between bfg-items-center">
										<p class="bfg-mb-0 bfg-font-medium">
											<?php _e('Three Dots After Description', 'blog-filter'); ?>
										</p>
										<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
											<input type="checkbox" id="three_dots" name="three_dots" value="yes" checked
												class="bfg-sr-only bfg-peer" checked onchange="toggleSwitch(this)">
											<div
												class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
											</div>
											<div
												class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>

						<div id="link" class="settings-tab bfg-hidden">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Link Settings', 'blog-filter'); ?></h2>
							</div>

							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">
								<!-- Show Read More Link -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Show Read More Link', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_read_more" name="blog_read_more" value="yes"
											checked class="bfg-sr-only bfg-peer" checked >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>
								<!-- Link On Date -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Date', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="link_on_date" name="link_on_date" value="yes"
											class="bfg-sr-only bfg-peer" >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>
								<!-- Text For Read More Link -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Text For Read More Link', 'blog-filter'); ?>
									</p>
									<input type="text" id="blog_read_more_text" name="blog_read_more_text" value="Read More"
										class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
								</div>
								
								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
								  <h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
									<?php esc_html_e( 'More link options in pro', 'blog-filter' ); ?>
								  </h3>

								  <!-- Link Open In New Tab -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link Open In New Tab', 'blog-filter'); ?></p>
									
								  </div>

								  <!-- Link On Title -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Title', 'blog-filter'); ?></p>
									
								  </div>

								  <!-- Link On Author -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Author', 'blog-filter'); ?></p>
									
								  </div>

								  <!-- Link On Category -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Category', 'blog-filter'); ?></p>
									
								  </div>

								  <!-- Link On Tags -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Link On Tags', 'blog-filter'); ?></p>
									
								  </div>
								</div>

								
							</div>
						</div>

						<div id="post-meta" class="settings-tab bfg-hidden">

							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Post Meta Settings', 'blog-filter'); ?></h2>
							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Post Date', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_date" name="blog_date" value="yes" checked
											class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>
								<div class="blog_date_below_image bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Date Below The Image', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_date_below_image" name="blog_date_below_image"
											value="yes" class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Post Author', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_author" name="blog_author" value="yes"
											class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="blog_author_below_image bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Author Below The Image', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_author_below_image"
											name="blog_author_below_image" value="yes" checked class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Show Post Categories', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_categories" name="blog_categories" value="yes"
											class="bfg-sr-only bfg-peer" checked />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Post Tags', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_tags" name="blog_tags" value="yes"
											class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-flex bfg-justify-between bfg-items-center blog_comments_count"
									style="display:none">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Show Comments Count in Template 3', 'blog-filter'); ?>
									</p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_comments_count" name="blog_comments_count"
											value="yes" checked class="bfg-sr-only bfg-peer" />
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>
							</div>
						</div>

						<div id="post-filter-order" class="settings-tab bfg-hidden">

							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Post Order', 'blog-filter'); ?></h2>
							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">
								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
								  <h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
									<?php esc_html_e( 'Available in Pro', 'blog-filter' ); ?>
								  </h3>

								  <!-- Post Order By -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Post Order By', 'blog-filter'); ?></p>
									<select disabled class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
									  <option selected><?php _e('Date', 'blog-filter'); ?></option>
									  <option ><?php _e('Title', 'blog-filter'); ?></option>
									  <option ><?php _e('Slug', 'blog-filter'); ?></option>
									  <option ><?php _e('Random', 'blog-filter'); ?></option>
									</select>
								  </div>

								  <!-- Post Order -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Post Order', 'blog-filter'); ?></p>
									<select disabled class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
									  <option ><?php _e('Ascending', 'blog-filter'); ?></option>
									  <option selected><?php _e('Descending', 'blog-filter'); ?></option>
									</select>
								  </div>
								</div>
							</div>

							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">

								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Filter Order', 'blog-filter'); ?></h2>

								<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6">
									<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
									  <h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
										<?php esc_html_e( 'Available in Pro', 'blog-filter' ); ?>
									  </h3>

									  <!-- Filter Order By -->
									  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed bfg-mb-3">
										<p class="bfg-mb-0 bfg-font-medium"><?php _e('Filter Order By', 'blog-filter'); ?></p>
										<select disabled class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										  <option ><?php _e('Date', 'blog-filter'); ?></option>
										  <option  selected><?php _e('Title', 'blog-filter'); ?></option>
										  <option ><?php _e('Slug', 'blog-filter'); ?></option>
										</select>
									  </div>

									  <!-- Filter Order -->
									  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed">
										<p class="bfg-mb-0 bfg-font-medium"><?php _e('Filter Order', 'blog-filter'); ?></p>
										<select disabled class="bfg-border bfg-rounded bfg-px-3 bfg-py-2 bfg-w-auto">
										  <option  selected><?php _e('Ascending', 'blog-filter'); ?></option>
										  <option ><?php _e('Descending', 'blog-filter'); ?></option>
										</select>
									  </div>
									</div>
								</div>
							</div>
						</div>

						<div id="pagination" class="settings-tab bfg-hidden">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold "><?php _e('Pagination Settings', 'blog-filter'); ?></h2>

							</div>
							<div class="bfg-grid bfg-grid-cols-1 bfg-gap-6 bfg-p-6">
								<!-- Pagination Toggle -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Pagination', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_pagination" name="blog_pagination" value="yes"
											checked class="bfg-sr-only bfg-peer" >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<!-- Load More Toggle -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Load More', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center bfg-cursor-pointer">
										<input type="checkbox" id="blog_load_more" name="blog_load_more" value="yes"
											 class="bfg-sr-only bfg-peer" >
										<div
											class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full bfg-peer-checked:bfg-bg-skyCustom bfg-transition">
										</div>
										<div
											class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow bfg-transform bfg-transition-transform bfg-peer-checked:bfg-translate-x-5">
										</div>
									</label>
								</div>

								<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4">
								  <h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
									<?php esc_html_e( 'Infinite scroll in Pro', 'blog-filter' ); ?>
								  </h3>

								  <!-- Load On Scroll Toggle -->
								  <div class="bfg-flex bfg-justify-between bfg-items-center bfg-opacity-50 bfg-cursor-not-allowed">
									<p class="bfg-mb-0 bfg-font-medium"><?php _e('Load On Scroll', 'blog-filter'); ?></p>
									<label class="bfg-relative bfg-inline-flex bfg-items-center">
									  <input type="checkbox" disabled class="bfg-sr-only">
									  <div class="bfg-w-11 bfg-h-6 bfg-bg-gray-200 bfg-rounded-full"></div>
									  <div class="bfg-absolute bfg-top-0.5 bfg-left-0.5 bfg-w-5 bfg-h-5 bfg-bg-white bfg-rounded-full bfg-shadow"></div>
									</label>
								  </div>
								</div>

								<!-- Pagination / Load More Button Color -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Pagination / Load More Button Color', 'blog-filter'); ?>
									</p>
									<input type="color" id="blog_pagination_color" name="blog_pagination_color"
										value="#58BBEE"	class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-24">
								</div>

								<!-- Blogs Per Page -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Blogs Per Page (First Load)', 'blog-filter'); ?>
									</p>
									<input type="number" id="blog_per_page" name="blog_per_page" value="12" min="1"
										class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-24">
								</div>

								<!-- Blogs On Load More / Scroll -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Blogs On Load More / Scroll', 'blog-filter'); ?>
									</p>
									<input type="number" id="blog_on_load_scroll" name="blog_on_load_scroll"
										value="3" min="1"
										class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-24">
								</div>

								<!-- Load More Button Text -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Text For "Load More"', 'blog-filter'); ?>
									</p>
									<input type="text" id="load_more_text" name="load_more_text"
										value="<?php echo esc_attr(get_option('load_more_text', 'Load More')); ?>"
										class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-1/4">
								</div>

								<!-- No More Posts Text -->
								<div class="bfg-flex bfg-justify-between bfg-items-center">
									<p class="bfg-mb-0 bfg-font-medium">
										<?php _e('Text For "No More Posts"', 'blog-filter'); ?>
									</p>
									<input type="text" id="no_more_text" name="no_more_text"
										value="<?php echo esc_attr(get_option('no_more_text', 'No More Posts')); ?>"
										class="bfg-border bfg-rounded bfg-px-2 bfg-py-1 bfg-w-1/4">
								</div>
							</div>
						</div>

						<div id="exclude" class="settings-tab bfg-hidden">
							<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b bfg-p-4">
								<h2 class="bfg-text-xl bfg-font-semibold"><?php _e('Exclude Posts', 'blog-filter'); ?>
								</h2>
							</div>
							<div class="bfg-border bfg-border-gray-300 bfg-rounded-lg bfg-p-4 bfg-mt-4 bfg-opacity-50 bfg-cursor-not-allowed">
								<h3 class="bfg-text-lg bfg-font-semibold bfg-mb-4">
									<?php esc_html_e( 'Exclude post by categories or tags in Pro', 'blog-filter' ); ?>
								</h3>
								<div id="bfg_exclude_term_table_container" class="bfg-p-6">
									<p><?php _e('Please select a Post Type and a Taxonomy to see exclusion options.', 'blog-filter'); ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bfg-flex bfg-items-center bfg-justify-between bfg-border-b  bfg-p-8 bfg-bg-white ">
				<h1 class="bfg-text-xl bfg-font-bold bfg-flex-1"><?php _e('Blog Filter', 'blog-filter'); ?>
				<span class="bfg-text-gray-500 bfg-text-sm"><?php _e('Version - ', 'blog-filter');
					echo BF_PLUGIN_VER; ?></span></h1>
				<button type="button" onclick="BfGetShortcode();" class="bfg-bg-[#6dbe73] bfg-hover:bg-green-600 bfg-text-white bfg-font-semibold 
					   bfg-px-4 bfg-py-2 bfg-rounded-md bfg-shadow-lg bfg-transition bfg-duration-200">
					<?php _e('[ Generate Shortcode ]', 'blog-filter'); ?>
				</button>
			</div>
		</div>

		<!--Banner-->
		<div class="bfg-relative bfg-isolate bfg-overflow-hidden bfg-bg-gray-900 bfg-py-24 sm:bfg-py-24 bfg-mt-24 bfg-mb-24 bfg-shadow-lg"
			style="background-color:#2f4f4f">


			<div class="bfg-mx-auto bfg-max-w-7xl bfg-px-6 lg:bfg-px-8">
				<div class="bfg-mx-auto bfg-max-w-2xl lg:bfg-mx-0">
					<h2 class=" bfg-font-semibold bfg-tracking-tight bfg-text-white"><?php _e('WordPress Solutions & Support', 'blog-filter'); ?></h2>
					<p class="bfg-mt-8 bfg-text-lg bfg-font-medium bfg-text-pretty bfg-text-gray-300 sm:bfg-text-xl/8">
						<?php _e('We provide services and support to enhance your WordPress experience. Check out our resources
						below.', 'blog-filter'); ?>
					</p>
				</div>

				<div class="bfg-mx-auto bfg-mt-10 bfg-max-w-2xl lg:bfg-mx-0 lg:bfg-max-w-none">
					<div
						class="bfg-grid bfg-grid-cols-1 bfg-gap-x-8 bfg-gap-y-6 bfg-text-base/7 bfg-font-semibold bfg-text-white sm:bfg-grid-cols-2 md:bfg-flex lg:bfg-gap-x-10">

						<div>
							<p class="bfg-text-gray-400 bfg-text-sm bfg-mb-1"><?php _e('Submit Query & Get Support', 'blog-filter'); ?></p>
							<a href="https://awplife.com/contact" target="_blank"
								style="color: white; text-decoration: none;">
								<?php _e('Contact Us', 'blog-filter'); ?> <span aria-hidden="true">→</span>
							</a>
						</div>

						<div>
							<p class="bfg-text-gray-400 bfg-text-sm bfg-mb-1"><?php _e('Shortcode Management & Update', 'blog-filter'); ?></p>
							<a href="http://awplife.com/configure-blog-filter-plugin-shortcode/" target="_blank"
								style="color: white; text-decoration: none;">
								<?php _e('Update Shortcode', 'blog-filter'); ?> <span aria-hidden="true">→</span>
							</a>
						</div>

						<div>
							<p class="bfg-text-gray-400 bfg-text-sm bfg-mb-1"><?php _e('Pro Live Demo', 'blog-filter'); ?></p>
							<a href="https://awplife.com/demo/blog-filter-premium/" target="_blank"
								style="color: white; text-decoration: none;">
								<?php _e('Check Demo', 'blog-filter'); ?> <span aria-hidden="true">→</span>
							</a>
						</div>

						<div>
							<p class="bfg-text-gray-400 bfg-text-sm bfg-mb-1"><?php _e('Upgrade To Pro Version 5.9.0', 'blog-filter'); ?></p>
							<a href="https://awplife.com/product/blog-filter-wordpress-plugin/" target="_blank"
								style="color: white; text-decoration: none;">
								<?php _e('Buy Pro', 'blog-filter'); ?> <span aria-hidden="true">→</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="loader" style="display:none;"></div>

<div id="modal-show-shortcode"
	class="bfg-fixed bfg-inset-0 bfg-bg-black/50 bfg-flex bfg-items-center bfg-justify-center bfg-hidden">
	<div id="inner-modal"
		class="bfg-absolute bfg-top-[15%] bfg-left-[40%] bfg-transform bfg-translate-x-[50%] bfg-translate-y-[50%] bfg-bg-white bfg-rounded-lg bfg-shadow-lg bfg-w-[35rem] bfg-max-w-full ">

		<div class="bfg-flex bfg-justify-between bfg-items-center bfg-border-b bfg-p-6">
			<h4 class="bfg-text-lg bfg-font-semibold"><?php _e('Blog Filter Shortcode', 'blog-filter'); ?></h4>
			<button type="button" class="bfg-text-gray-500 hover:bfg-text-gray-700" onclick="closeModal()">
				<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
					<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
					<g id="SVGRepo_iconCarrier">
						<path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
							stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
						<path d="M9.16998 14.83L14.83 9.17004" stroke="#292D32" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round"></path>
						<path d="M14.83 14.83L9.16998 9.17004" stroke="#292D32" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round"></path>
					</g>
				</svg>
			</button>
		</div>

		<div class="bfg-text-center bfg-p-6">
			<p class="bfg-mb-2 bfg-font-medium"><?php _e('Copy The Shortcode', 'blog-filter'); ?></p>
			<textarea id="awl-shortcode" readonly rows="15"
				class="bfg-w-full bfg-border bfg-rounded-md bfg-p-2 bfg-text-gray-700"></textarea>
			<div class="bfg-mt-4">
				<button type="button"
					class="bfg-bg-[#6dbe73] bfg-text-white bfg-font-semibold bfg-px-4 bfg-py-2 bfg-rounded-md"
					onclick="CopyShortcode()">
					<i class="fa fa-copy bfg-mr-1" aria-hidden="true"></i> <?php _e('Copy Shortcode', 'blog-filter'); ?>
				</button>
			</div>
		</div>

	</div>
</div>

<style>
	.bfg-flex ul li button {
		transition: background-color 0.2s ease;
	}

	.bfg-peer:checked+div {
		background-color: #58bbee;
	}

	.bfg-peer:checked+div+div {
		transform: translateX(100%);
	}
</style>

<script>

	function showTab(event, tabId) {
		// Hide all settings tab content
		document.querySelectorAll('.settings-tab').forEach(tab => tab.classList.add('bfg-hidden'));

		// Show the selected tab content
		document.getElementById(tabId).classList.remove('bfg-hidden');

		// Remove active styles from all buttons
		document.querySelectorAll('.bfg-flex ul li button').forEach(button => {
			button.classList.remove('bfg-border-l-4', 'bfg-border-skyCustom', 'bfg-bg-[aliceblue]');
		});

		// Add active styles to the clicked button
		event.currentTarget.classList.add('bfg-border-l-4', 'bfg-border-skyCustom', 'bfg-bg-[aliceblue]');
	}

	function toggleSwitch(checkbox) {
		if (checkbox.checked) {
			console.log(`${checkbox.id} switched ON`);
		} else {
			console.log(`${checkbox.id} switched OFF`);
		}
	}

	window.addEventListener('DOMContentLoaded', () => {
		const defaultTab = document.querySelector('.active-tab');
		if (defaultTab) showTab({
			currentTarget: defaultTab
		}, 'general');
	});
	
	
	jQuery(document).ready(function (jQuery) {
		// --- AJAX for fetching TAXONOMIES based on POST TYPE ---
		jQuery('#post_type').on('change', function () {
			var selectedPostType = jQuery(this).val();
			var taxonomyDropdown = jQuery('#bfg_taxonomy_select');

			// Hide all dependent sections when post type changes
			jQuery('#bfg_term_select').parent().addClass('bfg-hidden');
			jQuery('#bfg_term_table_container').html('').addClass('bfg-hidden');
			// Also hide the main exclude tab when the post type changes
			jQuery('#exclude').addClass('bfg-hidden');

			taxonomyDropdown.html('<option value=""><?php _e('Loading...', 'blog-filter'); ?></option>');

			jQuery.post(ajaxurl, {
				'action': 'get_taxonomies_for_post_type',
				'post_type': selectedPostType,
				'security': '<?php echo wp_create_nonce("bfg_admin_nonce"); ?>'
			}, function (response) {
				taxonomyDropdown.html(response.success ? response.data : '<option value=""><?php _e('Error', 'blog-filter'); ?></option>');
			});
		});

		// --- AJAX for fetching all TERM data (dropdown, include table, exclude table) ---
		jQuery('#bfg_taxonomy_select').on('change', function () {
			var selectedTaxonomy = jQuery(this).val();
			var termDropdownContainer = jQuery('#bfg_term_select').parent();
			var termDropdown = jQuery('#bfg_term_select');
			var includeTableContainer = jQuery('#bfg_term_table_container');

			// --- FIX IS HERE ---
			var excludeTab = jQuery('#exclude'); // Get the main exclude tab container
			var excludeTableContainer = jQuery('#bfg_exclude_term_table_container'); // Get the inner table container

			if (!selectedTaxonomy) {
				termDropdownContainer.addClass('bfg-hidden');
				includeTableContainer.addClass('bfg-hidden');
				excludeTab.addClass('bfg-hidden'); // Hide the entire exclude tab
				return;
			}

			// Show loading messages and make containers visible
			termDropdownContainer.removeClass('bfg-hidden');
			includeTableContainer.removeClass('bfg-hidden').html('<p class="bfg-text-center bfg-py-4"><?php _e('Loading...', 'blog-filter'); ?></p>');
			excludeTab.removeClass('bfg-hidden'); // Make the main exclude tab visible
			excludeTableContainer.html('<p class="bfg-text-center bfg-py-4"><?php _e('Loading...', 'blog-filter'); ?></p>');

			jQuery.post(ajaxurl, {
				'action': 'get_terms_for_taxonomy',
				'taxonomy': selectedTaxonomy,
				'security': '<?php echo wp_create_nonce("bfg_admin_nonce"); ?>'
			}, function (response) {
				if (response.success) {
					// Populate all elements from the single response object
					termDropdown.html(response.data.dropdown);
					includeTableContainer.html(response.data.table);
					excludeTableContainer.html(response.data.exclude_table); // Populate the inner container
				} else {
					var errorMsg = '<p class="bfg-text-red-500"><?php _e('Error loading terms.', 'blog-filter'); ?></p>';
					termDropdown.html('<option value=""><?php _e('Error', 'blog-filter'); ?></option>');
					includeTableContainer.html(errorMsg);
					excludeTableContainer.html(errorMsg);
				}
				
				// Filter selecetion limit
				jQuery('.bfg-term-checkbox').click(function () {
					jQuery(this).next().next().prop('disabled', !this.checked)
					jQuery('.bfg-term-checkbox').not(':checked').prop('disabled', jQuery('.bfg-term-checkbox:checked').length == 4);
				});

				
			});
		});
		

		// On page load, trigger the change handler if a post type is already selected
		// This is useful for when you save the settings and the page reloads.
		if (jQuery('#post_type').val()) {
			jQuery('#post_type').trigger('change');
		}
	});

	//Blog Filter short code []
	function BfGetShortcode() {
		var shortcode = '[AWL-BlogFilter';

		var post_type = jQuery("#post_type").val();
		if (post_type) {
			shortcode = shortcode + ' post_type="' + post_type + '"';
		}

		var blog_direction = jQuery("#blog_direction").val();
		if (jQuery("#blog_direction").prop('checked') == true) {
			shortcode = shortcode + ' blog_direction="' + blog_direction + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_col_large_desktops = jQuery("#blog_col_large_desktops").val();
		if (blog_col_large_desktops) {
			shortcode = shortcode + ' blog_col_large_desktops="' + blog_col_large_desktops + '"';
		}

		var blog_col_desktops = jQuery("#blog_col_desktops").val();
		if (blog_col_desktops) {
			shortcode = shortcode + ' blog_col_desktops="' + blog_col_desktops + '"';
		}

		var blog_col_tablets = jQuery("#blog_col_tablets").val();
		if (blog_col_tablets) {
			shortcode = shortcode + ' blog_col_tablets="' + blog_col_tablets + '"';
		}

		var blog_col_phones = jQuery("#blog_col_phones").val();
		if (blog_col_phones) {
			shortcode = shortcode + ' blog_col_phones="' + blog_col_phones + '"';
		}

		var blog_fixed_grid = jQuery("#blog_fixed_grid").val();
		if (jQuery("#blog_fixed_grid").prop('checked') == true) {
			shortcode = shortcode + ' blog_fixed_grid="' + blog_fixed_grid + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_image = jQuery("#blog_image").val();
		if (jQuery("#blog_image").prop('checked') == true) {
			shortcode = shortcode + ' blog_image="' + blog_image + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_image_hover_effect = jQuery("#blog_image_hover_effect").val();
		if (blog_image_hover_effect) {
			shortcode = shortcode + ' blog_image_hover_effect="' + blog_image_hover_effect + '"';
		}

		var blog_image_quality = jQuery("#blog_image_quality").val();
		if (blog_image_quality) {
			shortcode = shortcode + ' blog_image_quality="' + blog_image_quality + '"';
		}

		var blog_title = jQuery("#blog_title").val();
		if (jQuery("#blog_title").prop('checked') == true) {
			shortcode = shortcode + ' blog_title="' + blog_title + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_title_font_size = jQuery("#blog_title_font_size").val();
		if (blog_title_font_size) {
			shortcode = shortcode + ' blog_title_font_size="' + blog_title_font_size + '"';
		}

		var blog_title_color = jQuery("#blog_title_color").val();
		if (blog_title_color) {
			shortcode = shortcode + ' blog_title_color="' + blog_title_color + '"';
		}

		var blog_title_below_image = jQuery("#blog_title_below_image").val();
		if (jQuery("#blog_title_below_image").prop('checked') == true) {
			shortcode = shortcode + ' blog_title_below_image="' + blog_title_below_image + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_desc = jQuery("#blog_desc").val();
		if (jQuery("#blog_desc").prop('checked') == true) {
			shortcode = shortcode + ' blog_desc="' + blog_desc + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_desc_characters = jQuery("#blog_desc_characters").val();
		if (blog_desc_characters) {
			shortcode = shortcode + ' blog_desc_characters="' + blog_desc_characters + '"';
		}

		var blog_desc_font_size = jQuery("#blog_desc_font_size").val();
		if (blog_desc_font_size) {
			shortcode = shortcode + ' blog_desc_font_size="' + blog_desc_font_size + '"';
		}

		var blog_desc_color = jQuery("#blog_desc_color").val();
		if (blog_desc_color) {
			shortcode = shortcode + ' blog_desc_color="' + blog_desc_color + '"';
		}

		var blog_desc_box_color = jQuery("#blog_desc_box_color").val();
		if (blog_desc_box_color) {
			shortcode = shortcode + ' blog_desc_box_color="' + blog_desc_box_color + '"';
		}

		var three_dots = jQuery("#three_dots").val();
		if (jQuery("#three_dots").prop('checked') == true) {
			shortcode = shortcode + ' three_dots="' + three_dots + '"';
		} else {
			shortcode = shortcode + '';
		}

		var link_on_date = jQuery("#link_on_date").val();
		if (jQuery("#link_on_date").prop('checked') == true) {
			shortcode = shortcode + ' link_on_date="' + link_on_date + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_read_more = jQuery("#blog_read_more").val();
		if (jQuery("#blog_read_more").prop('checked') == true) {
			shortcode = shortcode + ' blog_read_more="' + blog_read_more + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_read_more_text = jQuery("#blog_read_more_text").val();
		if (blog_read_more_text) {
			shortcode = shortcode + ' blog_read_more_text="' + blog_read_more_text + '"';
		}

		var blog_date = jQuery("#blog_date").val();
		if (jQuery("#blog_date").prop('checked') == true) {
			shortcode = shortcode + ' blog_date="' + blog_date + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_date_below_image = jQuery("#blog_date_below_image").val();
		if (jQuery("#blog_date_below_image").prop('checked') == true) {
			shortcode = shortcode + ' blog_date_below_image="' + blog_date_below_image + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_author = jQuery("#blog_author").val();
		if (jQuery("#blog_author").prop('checked') == true) {
			shortcode = shortcode + ' blog_author="' + blog_author + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_author_below_image = jQuery("#blog_author_below_image").val();
		if (jQuery("#blog_author_below_image").prop('checked') == true) {
			shortcode = shortcode + ' blog_author_below_image="' + blog_author_below_image + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_categories = jQuery("#blog_categories").val();
		if (jQuery("#blog_categories").prop('checked') == true) {
			shortcode = shortcode + ' blog_categories="' + blog_categories + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_tags = jQuery("#blog_tags").val();
		if (jQuery("#blog_tags").prop('checked') == true) {
			shortcode = shortcode + ' blog_tags="' + blog_tags + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_pagination = jQuery("#blog_pagination").val();
		if (jQuery("#blog_pagination").prop('checked') == true) {
			shortcode = shortcode + ' blog_pagination="' + blog_pagination + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_load_more = jQuery("#blog_load_more").val();
		if (jQuery("#blog_load_more").prop('checked') == true) {

			shortcode = shortcode + ' blog_load_more="' + blog_load_more + '"';
		} else {
			shortcode = shortcode + '';
		}
		
		var blog_pagination_LoadMore_color = jQuery("#blog_pagination_color").val();
		if (blog_pagination_LoadMore_color) {
			//console.log(blog_pagination);
			shortcode = shortcode + ' blog_pagination_LoadMore_color="' + blog_pagination_LoadMore_color + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_per_page_and_init_load = jQuery("#blog_per_page").val();
		if (blog_per_page) {
			shortcode = shortcode + ' blog_per_page_and_init_load="' + blog_per_page_and_init_load + '"';
		}

		var blog_on_load_scroll = jQuery("#blog_on_load_scroll").val();
		if (blog_on_load_scroll) {
			shortcode = shortcode + ' blog_on_load_scroll="' + blog_on_load_scroll + '"';
		}

		var load_more_text = jQuery("#load_more_text").val();
		if (load_more_text) {
			shortcode = shortcode + ' load_more_text="' + load_more_text + '"';
		}

		var no_more_text = jQuery("#no_more_text").val();
		if (no_more_text) {
			shortcode = shortcode + ' no_more_text="' + no_more_text + '"';
		}

		var blog_filters = jQuery("#blog_filters").val();
		if (jQuery("#blog_filters").prop('checked') == true) {
			shortcode = shortcode + ' blog_filters="' + blog_filters + '"';
		} else {
			shortcode = shortcode + '';
		}

		var filter_post_count = jQuery("#filter_post_count").val();
		if (jQuery("#filter_post_count").prop('checked') == true) {
			shortcode = shortcode + ' filter_post_count="' + filter_post_count + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_filter_all = jQuery("#blog_filter_all").val();
		var blog_all_text = jQuery("#blog_all_text").val();
		if (jQuery("#blog_filter_all").prop('checked') == true) {
			shortcode = shortcode + ' blog_filter_all="' + blog_filter_all + '"' + ' blog_all_text="' + blog_all_text + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_search = jQuery("#blog_search").val();
		var blog_search_text = jQuery("#blog_search_text").val();
		if (jQuery("#blog_search").prop('checked') == true) {
			shortcode = shortcode + ' blog_search="' + blog_search + '"' + ' blog_search_text="' + blog_search_text + '"';
		} else {
			shortcode = shortcode + '';
		}

		var blog_buttons_color = jQuery("#blog_buttons_color").val();
		if (blog_buttons_color) {
			shortcode = shortcode + ' blog_buttons_color="' + blog_buttons_color + '"';
		}

		// --- NEW: Dynamic Shortcode Generation Logic ---

		// Get the selected taxonomy name (e.g., 'category', 'genre')
		var blog_filtering = jQuery("#bfg_taxonomy_select").val();
		if (blog_filtering) {
			shortcode = shortcode + ' blog_filtering="' + blog_filtering + '"';
		}

		// Get all checked term IDs from the dynamic table
		var selected_terms = [];
		jQuery('.bfg-term-checkbox:checked').map(function () {
			selected_terms.push(this.value);
		});

		// Add the selected terms to the shortcode.
		// We use a generic 'selected_terms' attribute now.
		if (selected_terms.length > 0) {
			shortcode = shortcode + ' selected_terms="' + selected_terms.join(',') + '"';
		}

		shortcode = shortcode + ' custom-css="' + ' "';

		shortcode = shortcode + ' ]';

		jQuery('#awl-shortcode').text(shortcode);
		jQuery('#modal-show-shortcode').modal('show');

	}

	function CopyShortcode() {
		var copyText = document.getElementById("awl-shortcode");
		copyText.select();
		document.execCommand("copy");

	}

	function closeModal() {
		jQuery('#modal-show-shortcode').modal('hide');

	}

	jQuery(document).ready(function () {
		// isotope effect function

		//range slider
		var rangeSlider = function () {
			var slider = jQuery('.range-slider'),
				range = jQuery('.range-slider__range'),
				value = jQuery('.range-slider__value');

			slider.each(function () {
				value.each(function () {
					var value = jQuery(this).prev().attr('value');
					jQuery(this).html(value);
				});

				range.on('input', function () {
					jQuery(this).next(value).html(this.value);
				});
			});
		};
		rangeSlider();
		jQuery('.checkbox_cat:not(:checked)').attr('checked', true);
		//checkbox
		jQuery('#all_checked_category').click(function () {

			if (this.checked == false) {
				jQuery('.checkbox_cat:checked').attr('checked', false);
			} else {
				jQuery('.checkbox_cat:not(:checked)').attr('checked', true);
			}
		});
		jQuery('.checkbox_tag:not(:checked)').attr('checked', true);
		jQuery('#all_checked_tag').click(function () {
			if (this.checked == false) {
				jQuery('.checkbox_tag:checked').attr('checked', false);
			} else {
				jQuery('.checkbox_tag:not(:checked)').attr('checked', true);
			}
		});

		//color-picker
		(function (jQuery) {
			jQuery(function () {
				// Add Color Picker to all inputs that have 'color-field' class
				jQuery('#blog_title_color, #blog_desc_color, #blog_desc_box_color, #blog_pagination_color, #blog_buttons_color').wpColorPicker();

			});
		})(jQuery);
		jQuery(document).ajaxComplete(function () {
			jQuery('#blog_title_color, #blog_desc_color, #blog_desc_box_color, #blog_pagination_color, #blog_buttons_color').wpColorPicker();
		});

		
		jQuery('#blog_pagination').change(function () {
			var blog_pagination = jQuery('#blog_pagination').prop('checked');
			//console.log(blog_pagination);
			if (blog_pagination == true) {
				jQuery("#blog_load_more").prop('checked', false);
				jQuery('.pls').removeClass('not-allowed');
			} else {
				jQuery('.pls').addClass('not-allowed');
			}
		});

		jQuery('#blog_load_more').change(function () {
			var blog_load_more = jQuery('#blog_load_more').prop('checked');
			if (blog_load_more == true) {
				jQuery("#blog_pagination").prop('checked', false);
				jQuery('.pls').removeClass('not-allowed');
			} else {
				jQuery('.pls').addClass('not-allowed');
			}
		});
		
	});
</script>