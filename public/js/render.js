$(document).ready(function(){

    // tree drag
    $('#tree-container').draggable();

    // coupe person size
    $('#tree .couple').each(function(){

        var firstPerson = $(this).find('.person:first');
        var lastPerson = $(this).find('.person:last');

        var firstSize = firstPerson.width();
        var lastSize = lastPerson.width();

        if(firstSize > lastSize) {
            lastPerson.css('width', firstSize);
        }
        else {
            firstPerson.css('width', lastSize);
        }

    });

});