<?php
/*
* Plugin Name: WP-VR-view - Photo Sphere and 360 video
* Description: Add photosphere and 360 video to wordpress pages, post etc. Google cardboard compatible.
* Version: 1.6
* Author: Tumanov Alexander
* Author URI: https://alexander-tumanov.name
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Shortcode to display form on any page or post.
function vr_creation($atts){

    $a = shortcode_atts( array(
       'img' => '',
       'video' => '',
       'pimg' => '',
       'stereo' => 'false',
       'width' => '640',
       'height' => '360',
   ), $atts );

   $img_url ="image=".$a['img'];
   $stereo = "&is_stereo=".$a['stereo']; // generate s_stereo parameter -  defaul is FALSE

   /* if has video then add it to URL */
   $video_url ="";
   if ($a['video']) {
     $video_url = "video=".$a['video'];
     if ($a['img']){
      $img_url ="&image=".$a['img'];
      }
      else {$img_url="";}
   }
  /* if has preview then add it to URL */
  $pimg_url ="";
  if ($a['pimg']) {
    $pimg_url = "&preview=".$a['pimg'];
  }
  // Generate iframe HTML code
  $iframe_url = plugin_dir_url( __FILE__ )."asset/index.html?".$video_url.$img_url.$stereo.$pimg_url;

  ob_start();
?>

    <iframe width="<?php echo $a['width']; ?>" height="<?php echo $a['height']; ?>" scrolling="no" allowfullscreen src="<?php echo $iframe_url; ?>"></iframe>

  <?php
    return ob_get_clean();
  }

add_shortcode('vrview', 'vr_creation');


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
    $plugin_array['vr_tc_button'] = plugins_url( 'includes/scripts/vr_button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function vr_register_my_tc_button($buttons) {
   array_push($buttons, "vr_tc_button");
   return $buttons;
}

function video_add_tinymce_plugin($plugin_array) {
    $plugin_array['video_tc_button'] = plugins_url( 'includes/scripts/video_button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function video_register_my_tc_button($buttons) {
   array_push($buttons, "video_tc_button");
   return $buttons;
}

function vr_tc_css() {
    wp_enqueue_style('vr-tc', plugins_url('/includes/css/style.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'vr_tc_css');


add_action('admin_enqueue_scripts', 'enqueue_scripts_styles_admin');

function enqueue_scripts_styles_admin(){
    wp_enqueue_media();
}

?>
