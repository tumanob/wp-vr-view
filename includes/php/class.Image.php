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


  function __construct($arguments)
  {
     $this->vrImageUrl=$arguments['img'];
     $this->vrPreviewImageUrl=$arguments['pimg'];
     $this->vrImageWidth=$arguments['width'];
     $this->vrImageHeight=$arguments['height'];
     $this->vrImageIsStereo=$arguments['stereo'];

  }

  function generateHtmlCode(){
    
    // get html code from views
    $htmlCode = wpVrSingleImageHtmlView::render( $this->vrImageUrl,
                                                 $this->vrPreviewImageUrl,
                                                 $this->vrImageWidth,
                                                 $this->vrImageHeight,
                                                 $this->vrImageIsStereo
                                                 );

    return $htmlCode;
  }

}


 ?>
