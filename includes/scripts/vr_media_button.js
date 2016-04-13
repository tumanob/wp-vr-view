
jQuery(function($) {
    $(document).ready(function(){
            $('#open-vr-media').click(open_media_window);
        });

        function open_modal_form(){

          
        }

        function open_media_window() {
            if (this.window === undefined) {
                this.window = wp.media({
                        title: 'Insert a media',
                        library: {type: 'image'},
                        multiple: false,
                        button: {text: 'Insert'}
                    });

                var self = this; // Needed to retrieve our variable in the anonymous function below
                this.window.on('select', function() {
                        var first = self.window.state().get('selection').first().toJSON();
                      //alert(JSON.stringify(first));
                        wp.media.editor.insert('[vrview img="' + first.url + '"]');
                    });
            }

            this.window.open();
            return false;
        }



});

function callme(data){
  alert(data);
}
