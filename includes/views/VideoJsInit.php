<?php

/**
 * Render the html for single VR Video using JS API
 */
class VideoJsInit {

	/**
	 * @param $videoUrl
	 * @param $width
	 * @param $height
	 * @param $stereo
	 * @param $yawAngle
	 * @return mixed
	 * @throws Exception
	 */
	public static function render( $videoUrl, $width, $height, $stereo, $yawAngle ) {

        $randomClassAddon = random_int(10,100);
		ob_start();

		?>
        <div class="wp-vr-view" style="width:<?php if ( strpos( $width, '%' ) !== false ) {
			echo $width;
		} else {
			echo $width . 'px';
		} ?>">
            <div id="vrview<?= $randomClassAddon; ?>"></div>

            <div id="controls">
                <div id="toggleplay" class="paused"></div>
                <div id="time">00:00 | 00:00</div>
                <input id="volumerange" type="range" min="0" max="100" value="100"/>
                <div id="togglemute"></div>
                <div id="togglefullscreen"></div>
            </div>

            <script src="<?php echo esc_url( WP_NR_URL ); ?>asset/build/vrview.min.js"></script>
            <script type="text/javascript">
                var vrView;
                var playButton;
                var muteButton;

                function onLoad() {
                    // Load VR View.
                    vrView = new VRView.Player('#vrview<?= $randomClassAddon;?>', {
                        width: '<?php echo esc_js( $width ); ?>',
                        height: '<?php echo esc_js( $height ); ?>',
                        video: '<?php echo esc_js( $videoUrl ); ?>',
                        is_stereo: <?php echo esc_js( $stereo );  ?>,
                        loop: true,
                        default_yaw: <?php echo esc_js( $yawAngle); ?>,
                        //hide_fullscreen_button: true,
                        //volume: 0.4,
                        //muted: true,
                        is_debug: false
                        //default_heading: 190
                       // is_yaw_only: true,
                        //is_vr_off: true,
                    });

                    playButton = document.querySelector('#toggleplay');
                    muteButton = document.querySelector('#togglemute');
                    volumeRange = document.querySelector('#volumerange');
                    timeContainer = document.querySelector('#time');

                    playButton.addEventListener('click', onTogglePlay);
                    muteButton.addEventListener('click', onToggleMute);
                    volumeRange.addEventListener('change', onVolumeChange);
                    volumeRange.addEventListener('input', onVolumeChange);

                    // If you set mute: true, uncomment the line bellow.
                    // muteButton.classList.add('muted');

                    vrView.on('ready', onVRViewReady);

                    vrView.on('play', function() {
                        console.log('media play');
                        console.log(vrView.getDuration());
                    });
                    vrView.on('pause', function() {
                        console.log('media paused');
                    });
                    vrView.on('timeupdate', function(e) {
                        var current = formatTime(e.currentTime);
                        var duration = formatTime(e.duration);
                        timeContainer.innerText = current + ' | ' + duration;
                        console.log('currently playing ' + current + ' secs.');
                    });
                    vrView.on('ended', function() {
                        console.log('media ended');
                        playButton.classList.add('paused');
                    });
                }

                function onVRViewReady() {
                    console.log('vrView.isPaused', vrView.isPaused);
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
                    vrView.mute(!isMuted);
                    muteButton.classList.toggle('muted');
                }

                function onVolumeChange(e) {
                    vrView.setVolume(volumeRange.value / 100);
                }

                function formatTime(time) {
                    time = !time || typeof time !== 'number' || time < 0 ? 0 : time;

                    var minutes = Math.floor(time / 60) % 60;
                    var seconds = Math.floor(time % 60);

                    minutes = minutes <= 0 ? 0 : minutes;
                    seconds = seconds <= 0 ? 0 : seconds;

                    var result = (minutes < 10 ? '0' + minutes : minutes) + ':';
                    result += seconds < 10 ? '0' + seconds : seconds;
                    return result;
                }

                window.addEventListener('load', onLoad);

            </script>

        </div>

		<?php
		$returnGeneratedHtml = ob_get_contents();
		ob_end_clean();

		return $returnGeneratedHtml;
	}
}
