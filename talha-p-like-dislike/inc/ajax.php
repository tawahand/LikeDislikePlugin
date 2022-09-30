<?php
// talha plugin  AJAX function
function talha_like_btn_ajax_action(){

    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $table_name = $wpdb->prefix. "talha_like_system";
    if(isset($_POST['pid']) && isset($_POST['uid'])){
        $user_id = $_POST['uid'];
        $post_id = $_POST['pid'];

        $check_like = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id = '$user_id' AND post_id = '$post_id' AND like_count=1");
        if($check_like > 0){
            echo 'Sorry You Have Liked This Post';
        }else{
            $wpdb->insert(
                ''.$table_name.'',
                array(
                    'post_id' => $_POST['pid'],
                    'user_id' => $_POST['uid'],
                    'like_count' => 1
                ),
                array(
                    '%d',
                    '%d',
                    '%d'
                )
                );
                if($wpdb->insert_id){
                    echo "Thank you for loving this post";
                }

        }
      
    }

    
    wp_die();

}
add_action('wp_ajax_talha_like_btn_ajax_action','talha_like_btn_ajax_action');
add_action('wp_ajax_nopriv_talha_like_btn_ajax_action', 'talha_like_btn_ajax_action');

function talha_show_like_count($content){
    global $wpdb;
    $table_name = $wpdb->prefix . 'talha_like_system';
    $post_id = get_the_ID();
    $like_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE post_id = '$post_id'  AND like_count=1");
    $like_count_result = "<center>This post has been liked <strong>".$like_count."</strong>, times(s)</center>";
    $content .= $like_count_result;
    return $content;
}


add_filter('the_content', 'talha_show_like_count');

// Talha Plugin No 2 Ajax Function

function talha_dislike_btn_ajax_action(){
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $table_name = $wpdb->prefix . "talha_like_system";
    if(isset($_POST['pid']) && isset($_POST['uid'])){
        $user_id = $_POST['uid'];
        $post_id = $_POST['pid'];

         $query_delete = $wpdb->get_var("DELETE FROM $table_name WHERE post_id = '$post_id'"); 

        $check_dislike = $wpdb->get_var("SELECT COUNT(*) FROM $table_name  WHERE user_id = '$user_id' AND post_id = '$post_id' AND dislike_count= 1"); 

        if($check_dislike > 0){
            
            echo "<p class='dislike-mess'style='text-align:end;'><strong>Sorry You Have Disliked</strong></p>";
          
        
        }
        else{
            $wpdb->insert(
                ''.$table_name.'',
                array(
                
                    'post_id' => $_POST['pid'],
                    'user_id' => $_POST['uid'],
                    'dislike_count' => 1
                ),
                array(
                    '%d',
                    '%d',
                    '%d'
                )
                );
                if($wpdb->insert_id){
                    echo "<p class='dislike-mess' style='text-align:end; margin-right:12px;'><strong> Sorry Dear</strong></p>";;
                }

        }

     
    }
    wp_die();

}
add_action('wp_ajax_talha_dislike_btn_ajax_action', 'talha_dislike_btn_ajax_action');
add_action('wp_ajax_nopriv_talha_dislike_btn_ajax_action' , 'talha_dislike_btn_ajax_action');
