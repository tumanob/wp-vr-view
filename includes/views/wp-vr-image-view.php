<?php

/**
 * class to render the html for single VR image
 *
 * @package MVC - View of the page
 * @subpackage Single Image View
 * @since 1.8
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
            <div id="vrimageview"></div>

            <script src="<?php echo esc_url( WP_NR_URL ) ;?>asset/build/vrview.js"></script>

            <script type="text/javascript">
            var vrImageView;
            var scenes = {
              wpvr: {
                image: '<?php echo esc_js( $imageUrl );  ?>',
                preview: '<?php echo esc_js( $previewImageUrl );  ?>'
              }
            };

            function onVrImageLoad() {
            //  console.log('On load');
              vrImageView = new VRView.Player('#vrimageview', {
                width: '<?php echo esc_js( $width );  ?>',
                height: '<?php echo esc_js( $height ); ?>',
                image: '<?php echo esc_js( WP_NR_URL ); ?>asset/images/blank.png',
                is_stereo: <?php echo esc_js( $stereo ) ?>,
                is_autopan_off: true
              });

              vrImageView.on('ready', function(){
                  //console.log('On ready');
                vrImageView.setContent({
                  image: scenes['wpvr'].image,
                  preview: scenes['wpvr'].preview,
                  is_autopan_off: true
                });
              });

                vrImageView.on('error', onVRImageViewError);
            }

            function onVRImageViewError(e) {
              console.log('Error! %s', e.message);
            }
            window.addEventListener('load', onVrImageLoad);
            </script>
          </div>

    <?php
        }
    }
