/**
 * Created by euphoric on 12/13/16.
 */
$('.equal-size').width(
    Math.max.apply(
        Math,
        $('.equal-size').map(function(){
            return $(this).outerWidth();
        }).get()
    )
);