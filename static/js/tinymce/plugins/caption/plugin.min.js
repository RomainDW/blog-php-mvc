tinymce.PluginManager.add('caption', function(ed, url) {
    ed.addButton('caption', {
        text: 'Caption',
        icon: false,
        onclick: function() {
            ed.windowManager.open({
                title: 'Add caption',
                body: [
                    {type: 'textbox', name: 'caption', label: 'Caption'}
                ],
                onsubmit: function(e) {
                    var element = ed.selection.getNode();
                    var parent = element.parentElement;

                    if(parent.className === 'image-container') {
                        parent.setAttribute('data-label', e.data.caption);
                        return;
                    }
                    var dom = ed.dom;
                    var container = dom.create('div', {'class': 'image-container', 
                                                       'data-label': e.data.caption, 
                                                       'style': element.getAttribute('style')});
                    element.setAttribute('style', '');
                    dom.insertAfter(container, element);
                    container.appendChild(element);
                }
            });
        }
    });
});