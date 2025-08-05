<?php
/**
 * ACF Options page
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page('Theme Settings');
}


/**
 * Convert file url to path
 *
 * @param string $url Link to file
 *
 * @return bool|mixed|string
 */

function convert_url_to_path($url)
{
	if (!$url) {
		return false;
	}
	$url = str_replace(array('https://', 'http://'), '', $url);
	$home_url = str_replace(array('https://', 'http://'), '', site_url());
	$file_part = ABSPATH . str_replace($home_url, '', $url);
	$file_part = str_replace('//', '/', $file_part);
	if (file_exists($file_part)) {
		return $file_part;
	}

	return false;
}

/**
 * Return/Output SVG as html
 *
 * @param array|string $img Image link or array
 * @param string $class Additional class attribute for img tag
 * @param string $size Image size if $img is array
 *
 * @return void
 */
function display_svg($img, $class = '', $size = 'medium')
{
	echo return_svg($img, $class, $size);
}

function return_svg($img, $class = '', $size = 'medium')
{
	if (!$img) {
		return '';
	}

	$file_url = is_array($img) ? $img['url'] : $img;

	$file_info = pathinfo($file_url);
	if ($file_info['extension'] == 'svg') {
		$file_path = convert_url_to_path($file_url);
		if (!$file_path) {
			return '';
		}

		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
			),
		);
		$image = file_get_contents($file_path, false, stream_context_create($arrContextOptions));
		if ($class) {
			$image = str_replace('<svg ', '<svg class="' . esc_attr($class) . '" ', $image);
		}
		$image = preg_replace('/^(.*)?(<svg.*<\/svg>)(.*)?$/is', '$2', $image);

	} elseif (is_array($img)) {
		$image = wp_get_attachment_image($img['id'], $size, false, array('class' => $class));
	} else {
		$image = '<img class="' . esc_attr($class) . '" src="' . esc_url($img) . '" alt="' . esc_attr($file_info['filename']) . '"/>';
	};

	return $image;
}

/**
 * Copyright @year ACF field functionality.
 */
add_action('acf/load_field/name=copyright', function ($field) {
	// Add instruction about @year.
	$field['instructions'] = !empty($field['instructions']) ? $field['instructions'] . '<br>' : '';
	$massage = sprintf(__('Input %s to replace static year with dynamic, so it will always shows current year.', 'website'), '<code>@year</code>');
	$field['instructions'] .= strpos($field['instructions'], $massage) === false ? $massage : '';

	return $field;
});

if (!is_admin()) {
	// Replace @year with current year.
	add_filter('acf/load_value/name=copyright', function ($value) {
		return str_replace('@year', date('Y'), $value);
	});
}


/**
 * Output background image style
 *
 * @param array|string $img Image array or url
 * @param string $size Image size to retrieve
 * @param bool $echo Whether to output the the style tag or return it.
 *
 * @return string|void String when retrieving.
 */
function bg($img = '', $size = '', $echo = true)
{
	if (empty($img)) {
		return false;
	}

	if (is_array($img)) {
		$url = $size ? $img['sizes'][$size] : $img['url'];
	} else {
		$url = $img;
	}

	$string = 'style="background-image: url(' . $url . ')"';

	if ($echo) {
		echo $string;
	} else {
		return $string;
	}
}

/**
 * Phone number cleaner
 */
function it_phone_cleaner($tel)
{
	return preg_replace('/[^+\d]+/', '', $tel);
}

function klf_acf_input_admin_footer()
{ ?>
	<script type="text/javascript">
		(function ($) {
			acf.add_filter('color_picker_args', function (args, $field) {
// add the hexadecimal codes here for the colors you want to appear as swatches
				args.palettes = ['#2facbf', '#474747', '#0a061a', '#141414']
// return colors
				return args;
			});
		})(jQuery);
	</script>
<?php }

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');


add_filter('wp_get_attachment_image_attributes', 'fp_no_lazy_featured_image', 10, 3);
function fp_no_lazy_featured_image($attr)
{
	if (false !== strpos($attr['class'], 'skip-lazy')) {
		$attr['loading'] = "eager";
	}
	return $attr;
}

add_filter('wpcf7_form_autocomplete', function ($autocomplete) {
	$autocomplete = 'off';
	return $autocomplete;
}, 10, 1);

/**
 * Add custom link to author meta field.
 * Telegram link.
 */
function add_telegram_contact_field($user_contact)
{
	$user_contact['display_telegram'] = 'Telegram profile URL';
	return $user_contact;
}

add_filter('user_contactmethods', 'add_telegram_contact_field');

/**
 * Add custom link to author meta field.
 * LinkedIn link.
 */
function add_linkedin_contact_field($user_contact)
{
	$user_contact['display_linkedin'] = 'LinkedIn profile URL';
	return $user_contact;
}

add_filter('user_contactmethods', 'add_linkedin_contact_field');

/**
 * Add user photo.
 */
function custom_user_avatar($avatar, $id_or_email, $size, $default, $alt)
{
	$user = false;

	if (is_numeric($id_or_email)) {
		$user = get_user_by('id', $id_or_email);
	}

	if ($user && $user->ID == 5) {
		$avatar = '<img alt="' . esc_attr($alt) . '" src="' . esc_url(get_template_directory_uri() . '/assets/images/avatars/jack.png') . '" class="avatar avatar-' . esc_attr($size) . ' photo" width="' . esc_attr($size) . '" height="' . esc_attr($size) . '"/>';
	}

	if ($user && $user->ID == 3) {
		$avatar = '<img alt="' . esc_attr($alt) . '" src="' . esc_url(get_template_directory_uri() . '/assets/images/avatars/vladimir.png') . '" class="avatar avatar-' . esc_attr($size) . ' photo" width="' . esc_attr($size) . '" height="' . esc_attr($size) . '"/>';
	}

	return $avatar;
}

add_filter('get_avatar', 'custom_user_avatar', 10, 5);


/**
 *
 * Change css class body  on single post author page.
 * @param $classes
 * @return mixed
 */
function author_body_class($classes)
{

	if (($key = array_search('author', $classes)) !== false) {
		unset($classes[$key]);
	}

	$classes[] = 'single-author';

	return $classes;
}

add_filter('body_class', 'author_body_class');



