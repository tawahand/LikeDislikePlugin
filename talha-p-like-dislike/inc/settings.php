<?php
// below two functions and filter according to showing menu of plugin in wordpress dashboard

function talha_settings_page_html(){
    if(!current_user_can('manage_options')){
        return;
    }
    ?>
    <div class="wrap">
    <h1 style="padding: 10px; background: #333; color:#fff;"><?= esc_html(get_admin_page_title());  ?></h1>
    <form action="options.php" method="post">
    <?php
     // output security fields for the registered setting "wporg_options"
     settings_fields('talha-settings');
      // output setting sections and their fields

      do_settings_sections('talha-settings');
      submit_button('Save Settings');
      ?>

    </form>
</div>
<?php

}
function talha_register_menu_page(){
    add_menu_page('Talha Like System','Talha Plugin','manage_options','talha-settings','talha_settings_page_html','dashicons-thumbs-up', 30 );

}
add_action('admin_menu','talha_register_menu_page');

// register settings and diffrent fields sections
function talha_plugin_settings(){
    register_setting('talha-settings', 'talha_like_btn_label');
    register_setting('talha-settings', 'talha_dislike_btn_label');

    add_settings_section('talha_label_settings_section','Talha Button Label','talha_plugin_settings_section_cb', 'talha-settings');

    add_settings_field('talha_like_label_feild','Like Button Label','talha_like_label_field_cb','talha-settings','talha_label_settings_section');
    add_settings_field('talha_dislike_label_feild', 'Dislike Button Label' ,'talha_dislike_label_field_cb', 'talha-settings', 'talha_label_settings_section');
}
add_action('admin_init','talha_plugin_settings');

// call back function for section
function talha_plugin_settings_section_cb(){

    echo "<p>Define Button Label</p>";
}
// call back function for field
  function  talha_like_label_field_cb(){
    // get the value of the settings we have registerd with register settings
    $setting = get_option('talha_like_btn_label');

    ?>
    <input type= "text" name= "talha_like_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : '' ; ?>">
    <?Php

  }
  function talha_dislike_label_field_cb(){
    $setting = get_option('talha_dislike_btn_label');
    ?>
    <input type="text" name="talha_dislike_btn_label" value="<?php echo isset($setting) ? esc_attr($setting) : '' ; ?>">
    <?php

  }