<?php

/**
 *
 */
class VrImage {
	public $vrImageUrl;
	public $vrPreviewImageUrl;
	public $vrImageWidth;
	public $vrImageHeight;
	public $vrImageIsStereo;
	public $vrImageDefaultYaw;


	public function __construct( $arguments ) {
		$this->vrImageUrl        = $arguments['img'];
		$this->vrPreviewImageUrl = $arguments['pimg'];
		$this->vrImageWidth      = $arguments['width'];
		$this->vrImageHeight     = $arguments['height'];
		$this->vrImageIsStereo   = $arguments['stereo'];
		$this->vrImageDefaultYaw = $arguments['yaw'];

	}

	public function generateHtmlCode() {

		// HTML template for iframe
		$htmlCode = ImageIframe::render( $this->vrImageUrl,
			$this->vrPreviewImageUrl,
			$this->vrImageWidth,
			$this->vrImageHeight,
			$this->vrImageIsStereo,
			$this->vrImageDefaultYaw
		);

		return $htmlCode;
	}
}
