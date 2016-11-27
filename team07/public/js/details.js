/**
 * Created by euphoric on 11/26/16.
 */
$(function(){
    // if there are results rows on a page it  adds the on click method required to call the details controller
    if($(".result_button")[0]) {
        $('.result_button').on('click', function () {
            var listing_id = $(this).attr('id');
            console.log("listing_id: " +listing_id);

            $.redirect(url + "details", {listing_detail_id: listing_id});
        })
    } else {
        console.log("No Result Rows Visible on this Page");
    }
});