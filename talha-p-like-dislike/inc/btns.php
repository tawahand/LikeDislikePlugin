<?php
// showing like dislike buttons

function talha_like_dislike_buttons($content){

    $like_btn_label = get_option('talha_like_btn_label','Like');
    $dislike_btn_label = get_option('talha_dislike_btn_label', 'Dislike');

    $user_id = get_current_user_id( );
    $post_id = get_the_ID();
    $like_btn_wrap = '<div class="talha_buttons_container">' ;

    $like_btn = '<a href="javascript:;" onclick="talha_like_btn_ajax('.$post_id.', '.$user_id.')"class="talha-btn talha-like-btn"><i class="fa-sharp fa-solid fa-thumbs-up"></i>'.$like_btn_label.'</a>';
    $dislike_btn = '<a href="javascript:;" onclick="talha_dislike_btn_ajax('.$post_id.', '.$user_id.')" class="talha-btn talha-dislike-btn"><i class="fa-solid fa-thumbs-down"></i>'.$dislike_btn_label.'</a>';

    $like_btn_wrap_end = '</div>';

    $talha_ajax_response = '<div id="talhaAjaxResponse" class="talha_ajax_response"><span></span></div>';
    $talha_ajax_response2 = '<div id="talhaAjaxResponse2" class="talha_ajax_response2"><span></span></div>';

    $content .=$like_btn_wrap;
    $content .=$like_btn;
    $content .=$dislike_btn;
    $content .=$like_btn_wrap_end;
    $content .=$talha_ajax_response;
    $content .=$talha_ajax_response2;
    return $content;

}

add_filter('the_content', 'talha_like_dislike_buttons');