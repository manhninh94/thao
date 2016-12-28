(function() {
    tinymce.PluginManager.add('cshero_quote_btn', function( editor, url ) {
        editor.addButton( 'cshero_quote_btn', {
            text: 'Quote',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Blockquote Default',
                    value: 'cms-quote-default',
                    onclick: function() {
                        editor.insertContent('<blockquote class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                },
                {
                    text: 'Blockquote Reverse',
                    value: 'cms-quote-reverse',
                    onclick: function() {
                        editor.insertContent('<blockquote class="blockquote-reverse '+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                },
                {
                    text: 'Blockquote 1',
                    value: 'cms-blogquote-1',
                    onclick: function() {
                        editor.insertContent('<blockquote class="quote mb-40 m-p-0 '+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                },
                {
                    text: 'Blockquote 2',
                    value: 'cms-blogquote-2',
                    onclick: function() {
                        editor.insertContent('<blockquote class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                },
                {
                    text: 'Blockquote 3',
                    value: 'cms-blogquote-3',
                    onclick: function() {
                        editor.insertContent('<blockquote class="custom-blockquote mb-40 '+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                },
                {
                    text: 'Blockquote 4',
                    value: 'cms-blogquote-4',
                    onclick: function() {
                        editor.insertContent('<blockquote class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<blockquote>');
                    }
                }
           ]
        });
    });
})();