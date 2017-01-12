(function() {
    tinymce.PluginManager.add('video_tc_button', function( editor, url ) {
        editor.addButton( 'video_tc_button', {
            title: 'VR video',
            icon: 'icon video-own-icon',
            onclick: function() {
              //  editor.insertContent('Hello World!');
              //alert
              editor.windowManager.open({
              	file : url + '/video_popup.php', // file that contains HTML for our modal window
      					width : 400 + parseInt(editor.getLang('button.delta_width', 0)), // size of our window
      					height : 600 + parseInt(editor.getLang('button.delta_height', 0)), // size of our window
      					inline : 1
      				}, {
      					plugin_url : url
      				});


            }
        });
    });
})();
