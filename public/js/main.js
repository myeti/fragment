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

});