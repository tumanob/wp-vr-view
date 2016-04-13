(function() {
    tinymce.PluginManager.add('vr_tc_button', function( editor, url ) {
        editor.addButton( 'vr_tc_button', {
            title: 'VR image',
            icon: 'icon vr-own-icon',
            onclick: function() {
              //  editor.insertContent('Hello World!');
              //alert
              editor.windowManager.open({
                title : 'ADD VR image',
      					file : url + '/photosphere_popup.php', // file that contains HTML for our modal window
      					width : 400 + parseInt(editor.getLang('button.delta_width', 0)), // size of our window
      					height : 500 + parseInt(editor.getLang('button.delta_height', 0)), // size of our window
      					inline : 1
      				}, {
      					plugin_url : url
      				});


            }
        });
    });
})();
