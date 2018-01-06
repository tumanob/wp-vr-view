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
                $parameters.='&preview='.$previewImageUrl;
            }

            if ($stereo=='true'){
                $parameters.="&is_stereo=true";
            }

            if (is_string($yawAngle)){
                $parameters.="&default_yaw=".$yawAngle;
            }


            $vrImageHtmlCode = '<div class="wp-vr-view"><iframe width ="'.$width.'" height="'.$height.'" src="'.plugins_url().'/wp-vr-view/asset/index.html?image='.$imageUrl.$parameters.'"></iframe></div>';

            return $vrImageHtmlCode;
        }
    }
