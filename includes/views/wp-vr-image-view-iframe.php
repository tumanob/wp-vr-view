<?php

/**
 * class to render the html for single VR image
 *
 * @package MVC - View of the page with iframe generation
 * @subpackage Single Image View
 * @since 1.8
 */
    class wpVrSingleImageHtmlViewIframe
    {
        /**
         *
         *
         * @package MVC Example
         * @subpackage Single Post View
         *
         * @return string $html the html for the view
         * @since 0.1
         */
        public static function render($imageUrl,$previewImageUrl, $width, $height,$stereo,$yawAngle)
        {
            $parameters='';
            if ($previewImageUrl){
                $parameters.='&preview='. esc_url( $previewImageUrl );
            }

            if ($stereo=='true'){
                $parameters.="&is_stereo=true";
            }

            if (is_string($yawAngle)){
                $parameters.="&default_yaw=". esc_attr( $yawAngle );
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
