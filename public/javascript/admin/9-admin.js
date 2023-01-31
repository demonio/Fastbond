$('aside .draggable').draggable({
    connectToSortable: '.sortable',
    helper: 'clone',
});

/*function droppable() {
    $(".droppable").droppable({
        greedy: true,
        drop: function(event, ui) {
            $('<div class="droppable"></div>').appendTo(event.target);
            droppable();
        }
    });
}
droppable();*/

function sortable() {
    $('.sortable').sortable({
        receive: function(e, ui) {
            ui.helper.find('a').remove();
            ui.helper.prepend('<button type="button" data-remove="parent"><img src="/img/icons/x.svg" width="20" height="20"></button>');
            if (ui.helper.data('after') === 1) {
                ui.helper.append('<div class="sortable"></div>');
            }
            sortable();
        },
    });
}
sortable();