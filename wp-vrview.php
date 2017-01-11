<?php
/*
* Plugin Name: WP-VR-view - Photo Sphere and 360 video
* Description: Add photosphere and 360 video to wordpress pages, post etc. Google cardboard compatible.
* Version: 1.8
* Author: Tumanov Alexander
* Author URI: https://alexander-tumanov.name
*/
include ('admin/admin.php');
include ('includes/php/class.Image.php');
include ('includes/php/class.Video.php');
include ('includes/views/wp-vr-image-view.php');
include ('includes/views/wp-vr-video-view.php');

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_shortcode('vrview', 'vr_creation');

add_action( 'wp_head', 'build_stylesheet_url' );
function build_stylesheet_url() {
    echo '<link rel="stylesheet" href="'. plugins_url().'/wp-vr-view/includes/css/style.css" type="text/css" media="all" />';
}

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



   if ($a['video']) {
     $vrVideo1= new VrVideo($a);
     echo $vrVideo1->generateHtmlCode();
   }
   else{
     $vrImage1= new VrImage($a);
     echo $vrImage1->generateHtmlCode();
   }
  } ?>
