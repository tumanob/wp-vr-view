<?php

/**
 * class to render the html for single VR Video with controls using JS API
 *
 * @package MVC - View of the page with iframe generation
 * @subpackage Single Video View with controls
 * @since 1.8
 */
    class wpVrSingleVideoHtmlViewIframe
    {
        /**
         * @package MVC Example
         *
         * @return string $html the html for the view
         */

        public static function render($videoUrl,$previewImageUrl, $width, $height,$stereo,$yawAngle)
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

            $vrVideoHtmlCode = sprintf(
            	'<div class="wp-vr-view"><iframe width="%s" height="%s" src="%s"></iframe></div>',
	            esc_attr( $width ),
	            esc_attr( $height ),
	            esc_url( WP_NR_URL . 'asset/index.html?video=' . $videoUrl . $parameters )
	        );

            return $vrVideoHtmlCode;
        }
    }
