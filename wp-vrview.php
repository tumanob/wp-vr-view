<?php
/*
* Plugin Name: WP-VR-view - 360 photo/video
* Description: Add 360 photos and  360 videos to wordpress pages, post, widgets etc. Google cardboard compatible. For additional information and usecases please visit demo website.
* Version: 2.1
* Author: Tumanov Alexander
* Author URI: https://alexander-tumanov.name
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'WP_NR_VERSION', '2.3' );
define( 'WP_NR_URL', esc_url( plugin_dir_url( __FILE__ ), array( 'http', 'https' ) ) );

require_once __DIR__ . '/includes/php/autoload.php';

/**
 * Register stylesheet to be used later
 * @return void
 */
function vr_register_style() {
	wp_register_style(
		'wp_nr_vr_style',
		WP_NR_URL . 'includes/css/style.css',
		array(),
		WP_NR_VERSION
	);
}

add_action( 'init', 'vr_register_style' );

/**
 * Shortcode to display on any page, post or widget.
 *
 * @param $atts
 *
 * @return string
 */
function vr_creation( $atts ) {
	wp_enqueue_style( 'wp_nr_vr_style' );

	/**  NEW fields
	 * is_vr_off
	 * is_autopan_off
	 * loop
	 * hide_fullscreen_button
	 * muted
	 */
	$shortcodeAtts = shortcode_atts( array(
		'img'         => '',
		'video'       => '',
		'pimg'        => '',
		'width'       => '640',
		'height'      => '360',
		'stereo'      => 'false',
		'yaw'         => 0,
		'hascontrols' => true,
		'is_vr_off' => '',
		'is_autopan_off' => '',
		'loop' => true,
		'hide_fullscreen_button' => '',
		'muted' => false
	), $atts );

	if ( $shortcodeAtts['video'] ) {
		$vrVideo = new VrVideo($shortcodeAtts);

		return $vrVideo->generateHtmlCode();
	}

	$vrImage = new VrImage( $shortcodeAtts );

	return $vrImage->generateHtmlCode();
}

add_shortcode( 'vrview', 'vr_creation' );
