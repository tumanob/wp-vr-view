<?php
/*
* Plugin Name: WP-VR-view - 360 photo/video
* Description: Add 360 photos and  360 videos to wordpress pages, post, widgets etc. Google cardboard compatible. For additional information and usecases please visit demo website.
* Version: 2.1
* Author: Tumanov Alexander
* Author URI: https://alexander-tumanov.name
*/
require_once( __DIR__ . '/includes/php/autoload.php' );


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
       'width' => '640',
       'height' => '360',
       'stereo' => 'false',
       'yaw'=>0,
       'hascontrols'=>'true'
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
