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
                $parameters.='&preview='.$previewImageUrl;
            }

            if ($stereo=='true'){
                $parameters.="&is_stereo=true";
            }

            if (is_string($yawAngle)){
                $parameters.="&default_yaw=".$yawAngle;
            }


            $vrVideoHtmlCode = ' <iframe width ="'.$width.'" height="'.$height.'" src="'.plugins_url().'/wp-vr-view/asset/index.html?video='.$videoUrl.$parameters.'"></iframe>';

            return $vrVideoHtmlCode;
        }
    }
