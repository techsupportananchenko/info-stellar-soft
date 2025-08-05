<?php
/**
 * Ajax rating Controller.
 */


function ajax_rating()
{
    //@TODO When we add CloudeFlare,need use method  setTrustedProxies(['proxies allowed']) and setUseProxy(bool).
    $ip_user = (new RemoteAddress())->getIpAddress();

    //Token CSRF ( wp nonce )
    check_ajax_referer('stellarsoft', 'nonce');

    $data_grade = intval(sanitize_text_field($_POST['grade']));
    $post_id = intval(sanitize_text_field($_POST['post_id']));
    $post = get_post($post_id);
    $rating = new Rating();

    if (!$ip_user) wp_send_json_error('Error not valid user ip.');;

    if (!$rating->validateRequestVoice($data_grade)) wp_send_json_error('Error not valid grade.');

    if (!$post || $post->post_type !== 'post') wp_send_json_error('Error not valid post id or post type.');;


    if ($rating->isExistVoice($post_id)) wp_send_json_error(
        ['msg' => 'You have already rated this post.', 'rate' => $rating->isExistVoice($post_id)],
    );


    $add_rating = $rating->addRating($post_id, $data_grade);

    if (!$add_rating) wp_send_json_error('Error not add rating.');

    $average = $rating->getAverageRating($post_id);;

    $count_rate = $rating->getCountRating($post_id);

    $dataRating = [
        'count_post_rating' => $count_rate,
        'average_post_rating' => $average,
    ];


    wp_send_json_success(
        $dataRating
    );

}


add_action('wp_ajax_ajax_rating', 'ajax_rating');
add_action('wp_ajax_nopriv_ajax_rating', 'ajax_rating');
