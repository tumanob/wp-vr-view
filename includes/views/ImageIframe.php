<?php

/**
 * Render html for single VR image in i-frame
 */
class ImageIframe {

	/**
	 * @param $imageUrl
	 * @param $previewImageUrl
	 * @param $width
	 * @param $height
	 * @param $stereo
	 * @param $yawAngle
	 * @return string $html the html for the view
	 */
	public static function render( $imageUrl, $previewImageUrl, $width, $height, $stereo, $yawAngle ) {
		$parameters = '';
		if ( $previewImageUrl ) {
			$parameters .= '&preview=' . esc_url( $previewImageUrl );
		}

		if ( 'true' === $stereo) {
			$parameters .= '&is_stereo=true';
		}

		if ( is_string( $yawAngle ) ) {
			$parameters .= '&default_yaw=' . esc_attr( $yawAngle );
		}

		$vrImageHtmlCode = sprintf(
			'<div class="wp-vr-view"><iframe width="%s" height="%s" src="%s"></iframe></div>',
			esc_attr( $width ),
			esc_attr( $height ),
			esc_url( WP_NR_URL . 'asset/index.html?image=' . $imageUrl . $parameters )
		);

		return $vrImageHtmlCode;
	}
}
