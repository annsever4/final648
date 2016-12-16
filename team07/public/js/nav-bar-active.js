/**
 * Created by euphoric on 12/16/16.
 */

//highlights active tab
/*
$(document).ready(function() {

    //clears old active class
    try {
        $(".nav li").removeClass("active");
    } catch (err) {
        console.log("no class to remove");
    }

    // tries to make the current page active if a pill exists for it
    try {
        $(document).ready(function(){
            console.log( "path: " +this.location.pathname);
            $('a[href ="' + this.location.pathname + '"]').parent().addClass('active');

        })
    } catch (e) {
        console.log(e);
        console.log("if this is only happening when on pages that do not have pills it is working as intended");
    }

});

    */

var selector = '.nav li';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});