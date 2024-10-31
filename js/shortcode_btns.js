(function() {
    tinymce.PluginManager.add('salon_mce_button', function(editor, url) {
        editor.addButton('salon_mce_button', {
            type: 'menubutton',
            text: 'salon.de',
            icon: 'salon-de-icon',
            menu: [
                {text: 'salon.de button', onclick: function() {editor.insertContent('[salon.de-button]');}},
                {text: 'salon.de widget', onclick: function() {editor.insertContent('[salon.de-widget]');}},
                {text: 'salon.de review', onclick: function() {editor.insertContent('[salon.de-review]');}},
                {text: 'salon.de widget 2', onclick: function() {editor.insertContent('[salon.de-widget-2]');}},
                {text: 'salon.de review 2', onclick: function() {editor.insertContent('[salon.de-review-2]');}},
                {text: 'salon.de widget 3', onclick: function() {editor.insertContent('[salon.de-widget-3]');}},
                {text: 'salon.de review 3', onclick: function() {editor.insertContent('[salon.de-review-3]');}},
                {text: 'salon.de widget 4', onclick: function() {editor.insertContent('[salon.de-widget-4]');}},
                {text: 'salon.de review 4', onclick: function() {editor.insertContent('[salon.de-review-4]');}},
                {text: 'salon.de widget 5', onclick: function() {editor.insertContent('[salon.de-widget-5]');}},
                {text: 'salon.de review 5', onclick: function() {editor.insertContent('[salon.de-review-5]');}}
            ]
        });
    });
})();
