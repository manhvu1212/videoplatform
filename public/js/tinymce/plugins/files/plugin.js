/**
 * Created by mrhoang on 5/21/15.
 */
tinymce.PluginManager.add('files', function(editor, url) {
    editor.addButton('files', {
        text: 'Files',
        icon: false,
        onclick: function() {
            editor.windowManager.open({
                title: 'TinyMCE site',
                url: 'http://www.tinymce.com',
                width: 800,
                height: 600,
                buttons: [{
                    text: 'Close',
                    onclick: 'close'
                }]
            });
        }
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('files', {
        text: 'Files',
        context: 'tools',
        onclick: function() {
            editor.windowManager.open({
                title: 'TinyMCE site',
                url: 'http://www.tinymce.com',
                width: 800,
                height: 600,
                buttons: [{
                    text: 'Close',
                    onclick: 'close'
                }]
            });
        }
    });
});