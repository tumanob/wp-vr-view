<?php
/**
 * class to render the html for single VR Video
 *
 * @package MVC Example
 * @subpackage Single Post View
 * @since 0.1
 */
    class wpVrSingleVideoHtmlView
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
        public static function render($videoUrl,$previewImageUrl, $width, $height,$stereo)
        {
        ?>

          <div style="width:<?php if (strpos($width, '%') !== false){ echo $width;}else{echo $width."px";}?>">
            <div id="vrview"></div>
            <div id="controls">
                <div id="toggleplay" class="paused"></div>
                <div id="togglemute"></div>
            </div>

            <script src="<?php echo plugins_url();?>/wp-vr-view/asset/build/vrview.js"></script>

            <script type="text/javascript">
            var vrView;
            var playButton;
            var muteButton;

            function onLoad() {
              // Load VR View.
              vrView = new VRView.Player('#vrview', {
                width: '<?php echo $width ?>',
                height: '<?php echo $height ?>',
                video: '<?php echo $videoUrl ?>',
                is_stereo: '<?php echo $stereo ?>',
              });
              vrView.on('ready', onVRViewReady);

              playButton = document.querySelector('#toggleplay');
              muteButton = document.querySelector('#togglemute');

              playButton.addEventListener('click', onTogglePlay);
              muteButton.addEventListener('click', onToggleMute);
            }


            function onVRViewReady() {
                //console.log('vrView.isPaused', vrView.isPaused);
                // Set the initial state of the buttons.
                if (vrView.isPaused) {
                  playButton.classList.add('paused');
                } else {
                  playButton.classList.remove('paused');
                }
              }

              function onTogglePlay() {
                if (vrView.isPaused) {
                  vrView.play();
                  playButton.classList.remove('paused');
                } else {
                  vrView.pause();
                  playButton.classList.add('paused');
                }
              }

              function onToggleMute() {
                var isMuted = muteButton.classList.contains('muted');
                if (isMuted) {
                  vrView.setVolume(1);
                } else {
                  vrView.setVolume(0);
                }
                muteButton.classList.toggle('muted');
              }
              window.addEventListener('load', onLoad);

            </script>
          </div>

    <?php
        }
    }
    ?>
