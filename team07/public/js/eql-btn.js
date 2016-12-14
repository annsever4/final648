/**
 * Created by euphoric on 12/13/16.
 */

try {
    $('.equal-size').width(
        Math.max.apply(
            Math,
            $('.equal-size').map(function () {
                return $(this).outerWidth();
            }).get()
        )
    );
} catch (e) {
    console.log("eql-btn function not working")
}