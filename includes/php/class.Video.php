<?php
/**
 *
 */
class VrVideo
{
  public $vrVideoUrl;
  public $vrPreviewImageUrl;
  public $vrVideoWidth;
  public $vrVideoHeight;
  public $vrVideoIsStereo;


  function __construct($arguments)
  {

  //  echo var_dump($arguments);
     $this->vrVideoUrl=$arguments['video'];
     $this->vrPreviewImageUrl=$arguments['pimg'];
     $this->vrVideoWidth=$arguments['width'];
     $this->vrVideoHeight=$arguments['height'];
     $this->vrVideoIsStereo=$arguments['stereo'];

  }

  function generateHtmlCode(){

    // get html code from views
    $htmlCode = wpVrSingleVideoHtmlView::render( $this->vrVideoUrl,
                                                 $this->vrPreviewImageUrl,
                                                 $this->vrVideoWidth,
                                                 $this->vrVideoHeight,
                                                 $this->vrVideoIsStereo
                                                 );



    return $htmlCode;
  }

}

?>
