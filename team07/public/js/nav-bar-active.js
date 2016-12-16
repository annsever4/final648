/**
 * Created by euphoric on 12/16/16.
 */

//highlights active tab
$(document).ready(function() {

    //clears old active class
    $(".nav li").removeClass("active");

    // tries to make the current page active if a pill exists for it
    try {
        $(document).ready(function(){

            $('a[href ="' + this.location.pathname + '"]').parent().addClass('active');

        })
    } catch (e) {
        console.log(e);
        console.log("if this is only happening when on pages that do not have pills it is working as intended");
    }

});