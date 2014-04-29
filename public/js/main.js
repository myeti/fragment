$(document).ready(function(){

    var panel = {
        left: $('#left'),
        middle: $('#middle'),
        right: $('#right')
    };

    // open person
    panel.middle.on('click', 'a.edit-person', function(e){

        var url = $(this).attr('href');
        panel.right.addClass('active').load(url);
        $('.name').removeClass('active');

        e.preventDefault();
        return false;
    });

    // open/close menu
    panel.middle.on('click', '.name', function(e){
        e.stopPropagation();
        $('.name').not(this).removeClass('active');
        $(this).toggleClass('active');
    }).on('click', function(){
        $('.name').removeClass('active');
    });

    // close person
    panel.right.on('click', 'a.close', function(e){
        panel.right.removeClass('active').load(url);
        e.preventDefault();
        return false;
    });

});