<?php

/**
 * Render html code for VR Video i-frame player
 */
class VideoIframe {

	/**
	 * @param $videoUrl
	 * @param $previewImageUrl
	 * @param $width
	 * @param $height
	 * @param $stereo
	 * @param $yawAngle
	 * @return mixed
	 */
	public static function render( $videoUrl, $previewImageUrl, $width, $height, $stereo, $yawAngle ) {
		$parameters = '';
		if ( $previewImageUrl ) {
			$parameters .= '&preview=' . esc_url( $previewImageUrl );
		}

		if ( 'true' === $stereo ) {
			$parameters .= '&is_stereo=true';
		}

		if ( is_string( $yawAngle ) ) {
			$parameters .= '&default_yaw=' . esc_attr( $yawAngle );
		}

		$vrVideoHtmlCode = sprintf(
			'<div class="wp-vr-view"><iframe width="%s" height="%s" src="%s"></iframe></div>',
			esc_attr( $width ),
			esc_attr( $height ),
			esc_url( WP_NR_URL . 'asset/index.html?video=' . $videoUrl . $parameters )
		);

		return $vrVideoHtmlCode;
	}
}
