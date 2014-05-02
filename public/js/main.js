$(document).ready(function(){

    var panel = {
        left: $('#left'),
        middle: $('#middle'),
        right: $('#right')
    };

    // login
    $('#login input:first').focus();

    // open modal
    $(document).on('click', 'a[data-modal]', function(e){

        var target = $(this).attr('data-modal');
        var action = $(this).attr('href');

        $('#modals .modal').removeClass('active');
        $('#modals').addClass('active');
        $('.modal' + target).addClass('active')
            .find('form').attr('action', action)
            .find('input[type=text]:first').focus();

        e.preventDefault();
        return false;
    });

    // close modal
    $(document).on('keyup', function(e){
        if (e.keyCode == 27) {
            $('#modals .modal').removeClass('active');
            $('#modals').removeClass('active');
        }
    });

    $('.modal a[data-close]').on('click', function(e){
        $('#modals .modal').removeClass('active');
        $('#modals').removeClass('active');

        e.preventDefault();
        return false;
    });


    // open person
    panel.middle.on('click', '.lines a', function(e){

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

    // delete link
    $(document).on('click', 'a[data-confirm]', function(e){
        var message = $(this).attr('data-confirm');
        return confirm(message);
    });

    // fill lines
    var lines = panel.middle.find('#editor .lines');
    var i = 1;
    panel.middle.find('#editor .tree li > a').each(function(){
        lines.append('<li><a href="' + $(this).attr('href') + '">' + i + '</a></li>');
        $(this).attr('href', '#');
        i++;
    });

});