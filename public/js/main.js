$(document).ready(function(){

    var panel = {
        left: $('#left'),
        middle: $('#middle'),
        right: $('#right')
    };


    // open tree
    $('#trees a').on('click', function(e){

        var url = $(this).attr('href');
        panel.middle.load(url);

        e.preventDefault();
        return falsle;
    });

});