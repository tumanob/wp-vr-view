<?php

/**
 * class to render the html for single VR image
 *
 * @package MVC Example
 * @subpackage Single Post View
 * @since 0.1
 */
    class wpVrSingleImageHtmlView
    {
        /**
         * print the message
         *
         * @package MVC Example
         * @subpackage Single Post View
         *
         * @return string $html the html for the view
         * @since 0.1
         */
        public static function render($imageUrl,$previewImageUrl, $width, $height,$stereo)
        {
        ?>

          <div>
            <div id="vrview"></div>

            <script src="<?php echo plugins_url();?>/wp-vr-view/asset/build/vrview.js"></script>

            <script type="text/javascript">
            var vrView;
            var scenes = {
              wpvr: {
                image: '<?php echo $imageUrl ?>',
                preview: '<?php echo $previewImageUrl?>'
              }
            };

            function onLoad() {
            //  console.log('On load');
              vrView = new VRView.Player('#vrview', {
                width: '<?php echo $width ?>',
                height: '<?php echo $height ?>',
                image: '<?php echo plugins_url();?>/wp-vr-view/asset/images/blank.png',
                is_stereo: <?php echo $stereo ?>,
                is_autopan_off: true
              });

              vrView.on('ready', function(){
                  //console.log('On ready');
                vrView.setContent({
                  image: scenes['wpvr'].image,
                  preview: scenes['wpvr'].preview,
                  is_autopan_off: true
                });
              });

                vrView.on('error', onVRViewError);
            }

            function onVRViewError(e) {
              console.log('Error! %s', e.message);
            }
            window.addEventListener('load', onLoad);
            </script>
          </div>

    <?php
        }
    } ?>
