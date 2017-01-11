<?php


/**
 *
 */
class VrImage
{
  public $vrImageUrl;
  public $vrPreviewImageUrl;
  public $vrImageWidth;
  public $vrImageHeight;
  public $vrImageIsStereo;
  public $vrImageDefaultYaw;


  function __construct($arguments)
  {
     $this->vrImageUrl=$arguments['img'];
     $this->vrPreviewImageUrl=$arguments['pimg'];
     $this->vrImageWidth=$arguments['width'];
     $this->vrImageHeight=$arguments['height'];
     $this->vrImageIsStereo=$arguments['stereo'];
     $this->vrImageDefaultYaw=$arguments['defaultyaw'];

  }

  function generateHtmlCode(){

    // get html code from views
  /*  $htmlCode = wpVrSingleImageHtmlView::render( $this->vrImageUrl,
                                                 $this->vrPreviewImageUrl,
                                                 $this->vrImageWidth,
                                                 $this->vrImageHeight,
                                                 $this->vrImageIsStereo
                                                 );
*/

   $htmlCode = ' <iframe width ="100%" height="450" src="'.plugins_url().'/wp-vr-view/asset/index.html?image='.$this->vrImageUrl.'&is_stereo=false&default_yaw=180">
                                             </iframe>';

    return $htmlCode;
  }

}


 ?>
