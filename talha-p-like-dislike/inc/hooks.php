<?php

// send email to the admin about post publishing
function talha_publish_send_mail(){
    global $post;
    $author = $post->post_author; /* Post author ID. */
    $name = get_the_author_meta( 'display_name', $author );
    $email = get_the_author_meta( 'user_email', $author );
    $title = $post->post_title;
    $permalink = get_permalink( $ID );
    $edit = get_edit_post_link( $ID, '' );
    $to[] = sprintf( '%s <%s>', $name, $email );
    $subject = sprintf( 'Published: %s', $title );
    $message = sprintf ('Congratulations, %s! Your article “%s” has been published.' . "\n\n", $name, $title );
    $message .= sprintf( 'View: %s', $permalink );
    $headers[] = '';
    wp_mail( $to, $subject, $message, $headers );
}
add_action('publish_post','talha_publish_send_mail');
// hook to limit the post description
function talha_filter_example($words){
    return 10;
}
add_filter('excerpt_length','talha_filter_example' );
// hook to set "more" option at the end of limited post description
function talha_filter_example_2($more){
    $more = '<a href=" '.get_the_permalink().'">More</a>';
    return $more;
}
add_filter('excerpt_more','talha_filter_example_2');