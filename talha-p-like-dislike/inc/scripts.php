<?php
// for checking same name function creation 
if(!function_exists('talha_plugin_scripts2')){
    function talha_plugin_scripts2(){
        // include style.css
        wp_enqueue_style('talha2-css', TALHA_PLUGIN_DIR. 'assets/css/style.css' );
        // include fontawesome
        wp_enqueue_style('talha-font-awesome', TALHA_PLUGIN_DIR. 'assets/fontawesome/css/all.css');

        // include js
       wp_enqueue_script('talha2-js', TALHA_PLUGIN_DIR. 'assets/js/main.js', 'jQuery' , '1.0.0' , true );
       // include ajax
       wp_enqueue_script('talha-ajax', TALHA_PLUGIN_DIR. 'assets/js/ajax.js', 'jQuery', '1.0.0', true);
       wp_localize_script('talha-ajax','talha_ajax_url', array(
        'ajax_url' => admin_url('admin-ajax.php')
       ));

    }
    add_action('wp_enqueue_scripts' , 'talha_plugin_scripts2');

}