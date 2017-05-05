<?php
/**
 * class to render the html for single VR Video
 *
 * @package MVC - View
 * @subpackage Single Video View
 * @since 1.8
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
        public static function render($videoUrl,$previewImageUrl, $width, $height,$stereo,$yawAngle)
        {
        ?>

          <div style="width:<?php if (strpos($width, '%') !== false){ echo $width;}else{echo $width."px";}?>">
            <div id="vrvideoview"></div>
            <div id="controls">
                <div id="toggleplay" class="paused"></div>
                <div id="togglemute"></div>
            </div>

            <script src="<?php echo plugins_url();?>/wp-vr-view/asset/build/vrview.js"></script>

            <script type="text/javascript">
            var vrVideoView;
            var playButton;
            var muteButton;

            function onVrVideoLoad() {
              // Load VR View.
              vrVideoView = new VRView.Player('#vrvideoview', {
                width: '<?php echo $width ?>',
                height: '<?php echo $height ?>',
                video: '<?php echo $videoUrl ?>',
                is_stereo: '<?php echo $stereo ?>',
                default_yaw: '<?php echo $yawAngle ?>'
              });
              vrVideoView.on('ready', onVrVideoViewReady);

              playButton = document.querySelector('#toggleplay');
              muteButton = document.querySelector('#togglemute');

              playButton.addEventListener('click', onVrVideoTogglePlay);
              muteButton.addEventListener('click', onVrVideoToggleMute);
            }


            function onVrVideoViewReady() {
                //console.log('vrView.isPaused', vrView.isPaused);
                // Set the initial state of the buttons.
                if (vrVideoView.isPaused) {
                  playButton.classList.add('paused');
                } else {
                  playButton.classList.remove('paused');
                }
              }

              function onVrVideoTogglePlay() {
                if (vrVideoView.isPaused) {
                  vrVideoView.play();
                  playButton.classList.remove('paused');
                } else {
                  vrVideoView.pause();
                  playButton.classList.add('paused');
                }
              }

              function onVrVideoToggleMute() {
                var isMuted = muteButton.classList.contains('muted');
                if (isMuted) {
                  vrVideoView.setVolume(1);
                } else {
                  vrVideoView.setVolume(0);
                }
                muteButton.classList.toggle('muted');
              }
              window.addEventListener('load', onVrVideoLoad);

            </script>
          </div>

    <?php
        }
    }
