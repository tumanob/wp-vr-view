<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add 360 Video</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="../../../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="../css/friendly_buttons_tinymce.css" />

<script type="text/javascript">

  var args = top.tinymce.activeEditor.windowManager.getParams();
  var wp = args.wp;

  var custom_uploader;

    $('.upload_image_button').click(function(e) {
        e.preventDefault();

        var $upload_button = $(this);

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $upload_button.siblings('input[type="text"]').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {

		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);

		// set up variables to contain our input values
  //  var video   = jQuery('#button-dialog input#video').val();
    var video  = jQuery('#button-dialog input#video').val();
		var image   = jQuery('#button-dialog input#image').val();
		var stereo  = jQuery('#button-dialog select#stereo').val();
    var width   = jQuery('#button-dialog input#width').val();
    var height  = jQuery('#button-dialog input#height').val();

  	var output = '';

		// setup the output of our shortcode
		output = '[vrview ';
			output += 'video="' + video + '" ';
      if(image)
			   output += 'img="' + image + '" ';
      if(stereo=="true")
			   output += 'stereo="' + stereo + '" ';
      if(width)
			   output += 'width="' + width + '" ';
      if(height)
			   output += 'height="' + height + '" ';

      output += ']';

		tinyMCEPopup.execCommand('mceReplaceContent', false, output);

		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);

</script>

</head>
<body>
	<div id="button-dialog">
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<label for="video">360 video .mp4 file URL<span style="color:red;">* </span></label>
				<input type="text" name="video" value="" id="video" />
        <!--<a href="#" class="media_add_link"> add image from library</a>-->
			</div>
			<div class="odd">
				<label for="image">Image preview URL</label>
				<input type="text" name="image" value="" id="image" />
			</div>
			<div>
				<label for="stereo">Stereo</label>
				<select name="stereo" id="stereo" size="1">
					<option value="true">Yes</option>
					<option value="false" selected="selected">No</option>
				</select>
			</div>
      <div class="odd">
				<label for="width">Width</label>
				<input type="text" name="width" value="" id="width" />
        <label for="height">Height</label>
				<input type="text" name="height" value="" id="height" />
			</div>
      <div>
        <span style="color:red;">* </span> - Required fields
        <br/>
        <br/>
        <b>360 video url</b> Should be to .mp4 file. You can take it from Media library or from any other URL.
        <br/>  <br/>
        <b>Width and Height</b> -  might be in pixels or in percent ( 500, 100%)
      </div>
			<div>
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>
