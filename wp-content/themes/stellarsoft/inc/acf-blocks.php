<?php


function stellarsoft_init_acf_custom_blocks()
{
	$icon = '<svg width="24" height="24" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="64" height="64" rx="6" fill="#008BE4"/>
			<g clip-path="url(#clip0_1088_10913)">
				<path d="M37.9774 48.5244C32.2216 48.5244 27.2799 44.4239 26.2274 38.7743C26.151 38.3643 26.4468 37.9772 26.8635 37.9445C33.0445 37.4584 37.5453 31.645 36.392 25.4858C36.3151 25.0756 36.6112 24.6882 37.028 24.6554C44.0379 24.1055 49.9306 29.6638 49.9306 36.5712C49.9305 43.1622 44.5683 48.5244 37.9774 48.5244ZM27.7752 39.2563C28.9778 43.8546 33.1534 47.1182 37.9774 47.1182C43.7929 47.1182 48.5242 42.3869 48.5242 36.5713C48.5242 30.7442 43.7649 25.9806 37.8953 26.0248C38.6538 32.4924 34.1216 38.3245 27.7752 39.2563Z" fill="white"/>
				<path d="M26.0356 39.3831C22.1041 39.3831 17.6704 37.45 15.7057 33.7366C13.4959 29.5598 13.522 25.0166 15.7774 21.2717C18.4087 16.9025 23.496 14.6907 28.4734 15.7292C29.1255 15.8652 29.5752 16.4464 29.5425 17.1113C29.51 17.7712 29.7408 18.445 30.2103 19.0601C30.965 19.6146 31.808 19.816 32.5851 19.6264C33.1837 19.4807 33.759 19.9319 33.7583 20.546L33.7581 20.7516C33.7581 22.1021 34.8555 23.2118 36.2213 23.2118C36.8328 23.2118 37.3704 23.6155 37.5329 24.1942C38.6261 28.0877 37.7025 32.4205 34.7843 35.5628C32.5123 38.0094 29.3569 39.3831 26.0356 39.3831ZM16.9821 21.9972C14.9872 25.3094 14.9751 29.3487 16.9487 33.079C18.8179 36.6123 23.3152 38.2229 26.8631 37.9444C33.371 37.4327 37.9631 31.037 36.1912 24.6179C34.1813 24.6006 32.5357 23.0509 32.3663 21.0858C31.3439 21.1832 30.2964 20.8722 29.3663 20.1849C29.2657 20.1106 29.1765 20.0229 29.1007 19.9241C28.4336 19.0546 28.1006 18.0777 28.1357 17.0955C23.8597 16.2251 19.3701 18.0321 16.9821 21.9972Z" fill="white"/>
				<path d="M41.8447 34.4618C40.4878 34.4618 39.3838 33.3578 39.3838 32.0009C39.3838 30.6439 40.4878 29.5399 41.8447 29.5399C43.2017 29.5399 44.3057 30.6439 44.3057 32.0009C44.3057 33.3578 43.2017 34.4618 41.8447 34.4618ZM41.8447 30.9462C41.2631 30.9462 40.79 31.4193 40.79 32.0009C40.79 32.5824 41.2631 33.0555 41.8447 33.0555C42.4263 33.0555 42.8994 32.5824 42.8994 32.0009C42.8994 31.4193 42.4263 30.9462 41.8447 30.9462Z" fill="white"/>
				<path d="M41.8447 43.6024C40.4878 43.6024 39.3838 42.4984 39.3838 41.1415C39.3838 39.7845 40.4878 38.6805 41.8447 38.6805C43.2017 38.6805 44.3057 39.7845 44.3057 41.1415C44.3057 42.4984 43.2017 43.6024 41.8447 43.6024ZM41.8447 40.0868C41.2631 40.0868 40.79 40.5599 40.79 41.1415C40.79 41.723 41.2631 42.1962 41.8447 42.1962C42.4263 42.1962 42.8994 41.723 42.8994 41.1415C42.8994 40.5599 42.4263 40.0868 41.8447 40.0868Z" fill="white"/>
				<path d="M34.1104 43.6024C32.7534 43.6024 31.6494 42.4984 31.6494 41.1415C31.6494 39.7845 32.7534 38.6805 34.1104 38.6805C35.4673 38.6805 36.5713 39.7845 36.5713 41.1415C36.5713 42.4984 35.4673 43.6024 34.1104 43.6024ZM34.1104 40.0868C33.5287 40.0868 33.0557 40.5599 33.0557 41.1415C33.0557 41.723 33.5287 42.1962 34.1104 42.1962C34.6919 42.1962 35.165 41.723 35.165 41.1415C35.165 40.5599 34.6919 40.0868 34.1104 40.0868Z" fill="white"/>
				<path d="M37.2744 37.2743C37.6627 37.2743 37.9775 36.9595 37.9775 36.5712C37.9775 36.1828 37.6627 35.868 37.2744 35.868C36.8861 35.868 36.5713 36.1828 36.5713 36.5712C36.5713 36.9595 36.8861 37.2743 37.2744 37.2743Z" fill="white"/>
				<path d="M37.9775 45.7118C38.3659 45.7118 38.6807 45.397 38.6807 45.0087C38.6807 44.6203 38.3659 44.3055 37.9775 44.3055C37.5892 44.3055 37.2744 44.6203 37.2744 45.0087C37.2744 45.397 37.5892 45.7118 37.9775 45.7118Z" fill="white"/>
				<path d="M45.0088 37.2743C45.3971 37.2743 45.7119 36.9595 45.7119 36.5712C45.7119 36.1828 45.3971 35.868 45.0088 35.868C44.6205 35.868 44.3057 36.1828 44.3057 36.5712C44.3057 36.9595 44.6205 37.2743 45.0088 37.2743Z" fill="white"/>
				<path d="M24.2666 23.2118C22.9096 23.2118 21.8057 22.1078 21.8057 20.7509C21.8057 19.3939 22.9096 18.2899 24.2666 18.2899C25.6236 18.2899 26.7275 19.3939 26.7275 20.7509C26.7275 22.1078 25.6236 23.2118 24.2666 23.2118ZM24.2666 19.6962C23.685 19.6962 23.2119 20.1693 23.2119 20.7509C23.2119 21.3324 23.685 21.8055 24.2666 21.8055C24.8482 21.8055 25.3213 21.3324 25.3213 20.7509C25.3213 20.1693 24.8482 19.6962 24.2666 19.6962Z" fill="white"/>
				<path d="M19.3447 29.5399C17.9878 29.5399 16.8838 28.4359 16.8838 27.079C16.8838 25.722 17.9878 24.618 19.3447 24.618C20.7017 24.618 21.8057 25.722 21.8057 27.079C21.8057 28.4359 20.7017 29.5399 19.3447 29.5399ZM19.3447 26.0243C18.7632 26.0243 18.29 26.4974 18.29 27.079C18.29 27.6605 18.7632 28.1337 19.3447 28.1337C19.9263 28.1337 20.3994 27.6605 20.3994 27.079C20.3994 26.4974 19.9263 26.0243 19.3447 26.0243Z" fill="white"/>
				<path d="M24.9697 36.5712C23.6128 36.5712 22.5088 35.4672 22.5088 34.1102C22.5088 32.7533 23.6128 31.6493 24.9697 31.6493C26.3267 31.6493 27.4307 32.7533 27.4307 34.1102C27.4307 35.4672 26.3267 36.5712 24.9697 36.5712ZM24.9697 33.0555C24.3882 33.0555 23.915 33.5286 23.915 34.1102C23.915 34.6918 24.3882 35.1649 24.9697 35.1649C25.5513 35.1649 26.0244 34.6918 26.0244 34.1102C26.0244 33.5287 25.5513 33.0555 24.9697 33.0555Z" fill="white"/>
				<path d="M32.001 32.3524C30.644 32.3524 29.54 31.2484 29.54 29.8915C29.54 28.5345 30.644 27.4305 32.001 27.4305C33.3579 27.4305 34.4619 28.5345 34.4619 29.8915C34.4619 31.2484 33.3579 32.3524 32.001 32.3524ZM32.001 28.8368C31.4194 28.8368 30.9463 29.3099 30.9463 29.8915C30.9463 30.473 31.4194 30.9462 32.001 30.9462C32.5825 30.9462 33.0557 30.473 33.0557 29.8915C33.0557 29.3099 32.5825 28.8368 32.001 28.8368Z" fill="white"/>
				<path d="M28.1338 27.4305C28.5221 27.4305 28.8369 27.1157 28.8369 26.7274C28.8369 26.3391 28.5221 26.0243 28.1338 26.0243C27.7455 26.0243 27.4307 26.3391 27.4307 26.7274C27.4307 27.1157 27.7455 27.4305 28.1338 27.4305Z" fill="white"/>
				<path d="M24.6182 29.5399C25.0065 29.5399 25.3213 29.2251 25.3213 28.8368C25.3213 28.4485 25.0065 28.1337 24.6182 28.1337C24.2298 28.1337 23.915 28.4485 23.915 28.8368C23.915 29.2251 24.2298 29.5399 24.6182 29.5399Z" fill="white"/>
				<path d="M24.6182 26.0243C25.0065 26.0243 25.3213 25.7095 25.3213 25.3212C25.3213 24.9328 25.0065 24.618 24.6182 24.618C24.2298 24.618 23.915 24.9328 23.915 25.3212C23.915 25.7095 24.2298 26.0243 24.6182 26.0243Z" fill="white"/>
			</g>
			<defs>
				<clipPath id="clip0_1088_10913">
				<rect width="36" height="36" fill="white" transform="translate(13.999 14)"/>
				</clipPath>
			</defs>
			</svg>';

	if (function_exists('acf_register_block')) {
		acf_register_block([
			'name' => 'simple-text',
			'title' => __('Simple text'),
			'description' => __('Simple text block'),
			'render_template' => '/blocks/simple-text.php',
			'keywords' => ['simple text', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/preview-simple-text.png',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'intro-block',
			'title' => __('Intro'),
			'description' => __('Intro block'),
			'render_template' => '/blocks/intro.php',
			'keywords' => ['intro', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/intro.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'intro-block-with-form',
			'title' => __('Intro With Form'),
			'description' => __('Intro block with form on right side'),
			'render_template' => '/blocks/intro-with-form.php',
			'keywords' => ['intro-with-form', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/intro-form.png',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'what-we-do',
			'title' => __('What We Do'),
			'description' => __('What We Do block'),
			'render_template' => '/blocks/what-we-do.php',
			'keywords' => ['what we do', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/what-we-do.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'indent',
			'title' => __('Indent'),
			'description' => __('Indent Section'),
			'render_template' => '/blocks/indent.php',
			'keywords' => ['indent', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/indent.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'services',
			'title' => __('Services'),
			'description' => __('Services Section'),
			'render_template' => '/blocks/services.php',
			'keywords' => ['services service', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/services.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'cycle',
			'title' => __('Cycle'),
			'description' => __('Cycle Section'),
			'render_template' => '/blocks/cycle.php',
			'keywords' => ['cycle', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/cycle.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'company',
			'title' => __('Company'),
			'description' => __('Company Section'),
			'render_template' => '/blocks/company.php',
			'keywords' => ['company', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/company.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'soft',
			'title' => __('Soft'),
			'description' => __('Soft Section'),
			'render_template' => '/blocks/soft.php',
			'keywords' => ['soft', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/soft.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'clients',
			'title' => __('Clients'),
			'description' => __('Clients Section'),
			'render_template' => '/blocks/clients.php',
			'keywords' => ['clients', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/clients.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'technologies',
			'title' => __('Technologies'),
			'description' => __('Technologies Section'),
			'render_template' => '/blocks/technologies.php',
			'keywords' => ['technologies', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/technologies.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'build',
			'title' => __('Build'),
			'description' => __('Build Section'),
			'render_template' => '/blocks/build.php',
			'keywords' => ['build', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/build.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'reviews',
			'title' => __('Reviews'),
			'description' => __('Reviews Section'),
			'render_template' => '/blocks/reviews.php',
			'keywords' => ['reviews', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/reviews.jpg',
					]
				]
			],
		]);

		//Cases block, with Cases our company.
		acf_register_block([
			'name' => 'cases',
			'title' => __('Cases'),
			'description' => __('Cases Section'),
			'render_template' => '/blocks/cases.php',
			'keywords' => ['cases', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/cases.jpg',
					]
				]
			],
		]);

		//Blocks render all Cases post type posts.
		acf_register_block([
			'name' => 'cases-posts',
			'title' => __('Cases Posts'),
			'description' => __('Cases Section with all posts,filters,pagination'),
			'render_template' => '/blocks/cases-posts.php',
			'keywords' => ['cases-posts', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/cases-posts.png',
					]
				]
			],
		]);

		acf_register_block([
			'name' => 'industry',
			'title' => __('Industries'),
			'description' => __('Industries Section'),
			'render_template' => '/blocks/industry.php',
			'keywords' => ['industry', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/industry.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'faq',
			'title' => __('FAQ'),
			'description' => __('FAQ Section'),
			'render_template' => '/blocks/faq.php',
			'keywords' => ['faq', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/faq.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'blog',
			'title' => __('Blog'),
			'description' => __('Blog Section'),
			'render_template' => '/blocks/blog.php',
			'keywords' => ['blog', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/blog.jpg',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'consultation',
			'title' => __('Consultation'),
			'description' => __('Consultation Section'),
			'render_template' => '/blocks/consultation.php',
			'keywords' => ['consultation', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/consultation.jpg',
					]
				]
			],
		]);

		acf_register_block([
			'name' => 'vacancies consultation',
			'title' => __('Vacancies Consultation'),
			'description' => __('Leads from form on Vacancy page.'),
			'render_template' => '/blocks/vacancies-consultation.php',
			'keywords' => ['vacancies-consultation', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/vacancy-form.png',
					]
				]
			],
		]);
		acf_register_block([
			'name' => 'service-intro',
			'title' => __('Service Intro'),
			'description' => __('Service Intro Section'),
			'render_template' => '/blocks/service-intro.php',
			'keywords' => ['service-intro', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/service-intro.jpg',
					]
				]
			],
		]);

		//Technologies Stack.
		acf_register_block([
			'name' => 'technologies-stack-technologies',
			'title' => __('Technologies stack'),
			'description' => __('Technologies stack Section'),
			'render_template' => '/blocks/technologies-blocks/technologies-stack.php',
			'keywords' => ['technologies-stack', ''],
			'category' => 'technologies',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/technologies-stack.jpg',
					]
				]
			],
		]);
		//Industries block tabs
		acf_register_block([
			'name' => 'industries tabs',
			'title' => __('Industries tabs'),
			'description' => __('Industries tabs'),
			'render_template' => '/blocks/industries-blocks/industries-tabs.php',
			'keywords' => ['industries-tab', ''],
			'category' => 'industries-block',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/industries.jpg',
					]
				]
			],
		]);
		//Industries block awards
		acf_register_block([
			'name' => 'industries Awards',
			'title' => __('Industries Awards'),
			'description' => __('Industries awards'),
			'render_template' => '/blocks/industries-blocks/industries-awards.php',
			'keywords' => ['industries-awards', ''],
			'category' => 'industries-block',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/industries-awards.jpg',
					]
				]
			],
		]);
		//Single Blog page. Blog banner Intro.
		acf_register_block([
			'name' => 'Blog Intro',
			'title' => __('Blog Intro'),
			'description' => __('Blog intro'),
			'render_template' => '/blocks/blog-blocks/blog-intro.php',
			'keywords' => ['blog-intro', ''],
			'category' => 'Single Blog',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/blog-intro.png',
					]
				]
			],
		]);
		//Single Blog page. Blog information.
		acf_register_block([
			'name' => 'Blog Information',
			'title' => __('Blog information'),
			'description' => __('Blog Information'),
			'render_template' => '/blocks/blog-blocks/blog-information.php',
			'keywords' => ['blog-information', ''],
			'category' => 'Single Blog',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/information.png',
					]
				]
			],
		]);

		//Start with Stellar Soft block with form. Contact Us page.
		acf_register_block([
			'name' => 'Start with Stellar Soft',
			'title' => __('Start with Stellar Soft'),
			'description' => __('Start with Stellar Soft block with form.'),
			'render_template' => '/blocks/contact-us-blocks/start-with-stellarsoft.php',
			'keywords' => ['start-with-stellarsoft', ''],
			'category' => 'Contact Us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/start-with-stellarsoft.png',
					]
				]
			],
		]);
		//Find us. Contact Us page.
		acf_register_block([
			'name' => 'Find Us',
			'title' => __('Find Us'),
			'description' => __('Find Us blocks with places were clients can find us.'),
			'render_template' => '/blocks/contact-us-blocks/find-us.php',
			'keywords' => ['find-us', ''],
			'category' => 'Contact Us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/find-us.png',
					]
				]
			],
		]);
		//About company block. About us page.
		acf_register_block([
			'name' => 'About company',
			'title' => __('About company'),
			'description' => __('About company block with CTO and history company'),
			'render_template' => '/blocks/about-us/about-company.php',
			'keywords' => ['about-company', ''],
			'category' => 'about-us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/about-company.png',
					]
				]
			],
		]);
		//Our Values block. About us page.
		acf_register_block([
			'name' => 'Our Values',
			'title' => __('Our Values'),
			'description' => __('Our Values block with tab content.'),
			'render_template' => '/blocks/about-us/our-values.php',
			'keywords' => ['our-values', ''],
			'category' => 'about-us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/our-values.png',
					]
				]
			],
		]);
		//Our Mission block. About us page.
		acf_register_block([
			'name' => 'Our Mission',
			'title' => __('Our Mission'),
			'description' => __('Our Mission block with text about Stellar Soft.'),
			'render_template' => '/blocks/about-us/our-mission.php',
			'keywords' => ['our-mission', ''],
			'category' => 'about-us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/our-mission.png',
					]
				]
			],
		]);
		//Team and office block. About us page.
		acf_register_block([
			'name' => 'Team and office',
			'title' => __('Team and office'),
			'description' => __('Team and office block with text description and image.'),
			'render_template' => '/blocks/about-us/team-and-office.php',
			'keywords' => ['team-and-office', ''],
			'category' => 'about-us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/team-and-office.png',
					]
				]
			],
		]);
		//Team experts block. About us page.
		acf_register_block([
			'name' => 'Team experts',
			'title' => __('Team experts'),
			'description' => __('Team experts block with our team and their position.'),
			'render_template' => '/blocks/about-us/team-experts.php',
			'keywords' => ['team-experts', ''],
			'category' => 'about-us',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/team-experts.png',
					]
				]
			],
		]);
		//Vacancies our company. Careers page.
		acf_register_block([
			'name' => 'Vacancies',
			'title' => __('Vacancies'),
			'description' => __('Vacancies block with our vacancies in company.'),
			'render_template' => '/blocks/careers/vacancies.php',
			'keywords' => ['vacancies', ''],
			'category' => 'careers',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/vacancies.png',
					]
				]
			],
		]);
		//Team Co-Founder. Careers page.
		acf_register_block([
			'name' => 'Team Co-Founder',
			'title' => __('Team Co-Founder'),
			'description' => __('Team Co-Founder block with our team co founder.'),
			'render_template' => '/blocks/careers/team-founder.php',
			'keywords' => ['team-co-founder', ''],
			'category' => 'careers',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/team-co-founders.png',
					]
				]
			],
		]);
		//Mega menu blocks.
		//Menu view 1.
		acf_register_block([
			'name' => 'Mega menu view 1',
			'title' => __('Mega menu view 1'),
			'description' => __('Mega menu view 1'),
			'render_template' => '/blocks/mega-menu-blocks/mega-menu-view-1.php',
			'keywords' => ['mega-menu-view-1', ''],
			'category' => 'mega-menu',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/mega-menu-view-1.jpg',
					]
				]
			],
		]);
		//Menu view 2
		acf_register_block([
			'name' => 'Mega menu view 2',
			'title' => __('Mega menu view 2'),
			'description' => __('Mega menu view 2'),
			'render_template' => '/blocks/mega-menu-blocks/mega-menu-view-2.php',
			'keywords' => ['mega-menu-view-2', ''],
			'category' => 'mega-menu',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/mega-menu-view-2.jpg',
					]
				]
			],
		]);
		//Menu view 3
		acf_register_block([
			'name' => 'Mega menu view 3',
			'title' => __('Mega menu view 3'),
			'description' => __('Mega menu view 3'),
			'render_template' => '/blocks/mega-menu-blocks/mega-menu-view-3.php',
			'keywords' => ['mega-menu-view-3', ''],
			'category' => 'mega-menu',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/mega-menu-view-3.jpg',
					]
				]
			],
		]);
		//Menu view 4
		acf_register_block([
			'name' => 'Mega menu view 4',
			'title' => __('Mega menu view 4'),
			'description' => __('Mega menu view 4'),
			'render_template' => '/blocks/mega-menu-blocks/mega-menu-view-4.php',
			'keywords' => ['mega-menu-view-4', ''],
			'category' => 'mega-menu',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/mega-menu-view-4.jpg',
					]
				]
			],
		]);


		//Case Single Review
		acf_register_block([
			'name' => 'Case Single Review',
			'title' => __('Case Single Review'),
			'description' => __('Case Single Review block,with feedback client.'),
			'render_template' => '/blocks/case-review.php',
			'keywords' => ['case-review', ''],
			'category' => 'cases',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/single-case-review.png',
					]
				]
			],
		]);
		//Claim your free CRO plan
		acf_register_block([
			'name' => 'Claim your free CRO plan',
			'title' => __('Claim your free CRO plan'),
			'description' => __('Claim your free CRO plan, block with action button,white bg.'),
			'render_template' => '/blocks/claim-your-free-cro-plan.php',
			'keywords' => ['claim-your-free-cro-plan', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/Claim-your-free-CRO-plan.png',
					]
				]
			],
		]);
		//Claim your free CRO plan
		acf_register_block([
			'name' => 'Join our newsletter',
			'title' => __('Join our newsletter'),
			'description' => __('Join our newsletter, block with news-latter form.'),
			'render_template' => '/blocks/join-our-newsletter.php',
			'keywords' => ['join-our-newsletter', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/join-our-newsletter.png',
					]
				]
			],
		]);
		//Importance of Tailored Solutions for Business Success
		acf_register_block([
			'name' => 'Tailored Solutions',
			'title' => __('Tailored Solutions'),
			'description' => __('Tailored Solutions block slider with text on right side and image on left side.'),
			'render_template' => '/blocks/tailored-solutions.php',
			'keywords' => ['tailored-solutions', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/tailored-solutions.png',
					]
				]
			],
		]);

		//Custom Software Development
		acf_register_block([
			'name' => 'Custom Software Development',
			'title' => __('Custom Software Development'),
			'description' => __('Custom Software Development blocks with slider like Cases,look image.'),
			'render_template' => '/blocks/custom-software-development.php',
			'keywords' => ['custom-software-development', ''],
			'category' => 'base-template-blocks',
			'multiple' => true,
			'mode' => 'preview',
			'icon' => $icon,
			'example' => [
				'attributes' => [
					'mode' => 'preview',
					'data' => [
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/images/acf-block/custom-software-development.png',
					]
				]
			],
		]);


	}
}

add_action('init', 'stellarsoft_init_acf_custom_blocks');

/**
 * Define Stellarsoft category module Gutenberg
 */
function stellarsoft_custom_block_category($categories, $post)
{
	$custom_block = [
		'slug' => 'base-template-blocks',
		'title' => __('Stellarsoft Modules'),
	];
	$mega_menu_blocks = [
		'slug' => 'mega-menu',
		'title' => __('Mega Menu Modules'),
	];
	$about_us_blocks = [
		'slug' => 'about-us',
		'title' => __('About us Modules'),
	];
	$careers = [
		'slug' => 'careers',
		'title' => __('Careers Modules'),
	];
	$cases = [
		'slug' => 'cases',
		'title' => __('Cases Modules'),
	];

	$categories_sorted = [];
	$categories_sorted[0] = $custom_block;
	$categories_sorted[1] = $mega_menu_blocks;
	$categories_sorted[2] = $about_us_blocks;
	$categories_sorted[3] = $careers;
	$categories_sorted[4] = $cases;

	foreach ($categories as $category) {
		$categories_sorted[] = $category;
	}

	return $categories_sorted;
}

add_filter('block_categories_all', 'stellarsoft_custom_block_category', 10, 2);



