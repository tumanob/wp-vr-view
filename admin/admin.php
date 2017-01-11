<?php

add_action('admin_head', 'add_vr_media_button');

function add_vr_media_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "vr_add_tinymce_plugin");
        add_filter('mce_buttons', 'vr_register_my_tc_button');
        add_filter("mce_external_plugins", "video_add_tinymce_plugin");
        add_filter('mce_buttons', 'video_register_my_tc_button');
    }
}

function vr_add_tinymce_plugin($plugin_array) {
    $plugin_array['vr_tc_button'] = plugins_url( './scripts/vr_button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function vr_register_my_tc_button($buttons) {
   array_push($buttons, "vr_tc_button");
   return $buttons;
}

function video_add_tinymce_plugin($plugin_array) {
    $plugin_array['video_tc_button'] = plugins_url( './scripts/video_button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function video_register_my_tc_button($buttons) {
   array_push($buttons, "video_tc_button");
   return $buttons;
}

function vr_tc_css() {
    wp_enqueue_style('vr-tc', plugins_url('./../admin/css/style.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'vr_tc_css');


add_action('admin_enqueue_scripts', 'enqueue_scripts_styles_admin');

function enqueue_scripts_styles_admin(){
    wp_enqueue_media();
}

?>
