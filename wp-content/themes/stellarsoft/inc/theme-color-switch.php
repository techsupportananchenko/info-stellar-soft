<?php

/**
 * Theme color switch logic.
 */


//Ajax response and save current theme to Session.
function get_ajax_switch_color_theme()
{


    if (!session_id()) session_start();
    //Token CSRF ( wp nonce )
    check_ajax_referer('stellarsoft', 'nonce');

    //Theme form front end.
    $theme = sanitize_text_field($_POST['theme']);


    $themes = ['theme-dark', 'theme-light'];

    if (in_array($_POST['theme'], $themes)) {
        //If ok,write on session.
        $_SESSION['theme'] = $theme;
        wp_send_json_success(['theme-switch' => $_SESSION['theme']]);
    }

}

add_action('wp_ajax_theme_switch', 'get_ajax_switch_color_theme');
add_action('wp_ajax_nopriv_theme_switch', 'get_ajax_switch_color_theme');
