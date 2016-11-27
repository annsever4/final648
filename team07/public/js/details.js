/**
 * Created by euphoric on 11/26/16.
 */
$(function(){

    if($(".row")[0]) {
        $('.row').on('click', function () {
            var listing_id = $(this).attr('id');
            $.ajax({
                url: url + "details",
                type: "POST",
                data: {listing_detail_id: listing_id},

                success: function (response) {
                    window.location = url + "details";
                },

                error: function () {
                    console.log("ajax detail error");
                }

            })
        })
    } else {
        console.log("No Result Rows Visible on this Page");
    }
});