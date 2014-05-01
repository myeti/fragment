$(document).ready(function(){

    var panel = {
        left: $('#left'),
        middle: $('#middle'),
        right: $('#right')
    };

    // open person
    panel.middle.on('click', 'a', function(e){

        var url = $(this).attr('href');
        panel.right.addClass('active').load(url);

        e.preventDefault();
        return false;
    });

    // close person
    panel.right.on('click', 'a.close', function(e){
        panel.right.removeClass('active').load(url);
        e.preventDefault();
        return false;
    });

    // add p-event
    panel.right.on('click', 'a.add-p-event', function(e){

        var i = panel.right.find('.p-events .event:last').attr('data-i');
        i = (typeof i === 'undefined') ? 0 : i + 1;

        var tpl = panel.right.find('.p-template').html().replace(/{i}/g, i);
        panel.right.find('.p-events').append(tpl);

        e.preventDefault();
        return false;
    });

    // add c-event
    panel.right.on('click', 'a.add-c-event', function(e){

        var id = $(this).attr('data-id');
        var i = panel.right.find('.c-events[data-id=' + id + '] .event:last').attr('data-i');
        i = (typeof i === 'undefined') ? 0 : i + 1;

        var tpl = panel.right.find('.c-template').html().replace(/{i}/g, i).replace(/{id}/g, id);
        panel.right.find('.c-events[data-id=' + id + ']').append(tpl);

        e.preventDefault();
        return false;
    });

    // remove event
    panel.right.on('click', 'a.remove-event', function(e){

        $(this).parent().remove();

        e.preventDefault();
        return false;
    });

});