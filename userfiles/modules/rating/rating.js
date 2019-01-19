mw.rating = {};
mw.rating.save = function (data) {

    $.post(mw.settings.api_url + 'rating/Controller/save', data)
        .done(function (data) {
            // alert( "Data Loaded: " + data );
            mw.notification.success("谢谢你的评价");
        });


}


$(function () {
    $(".starrr").starrr()
    $(".mw-rating-controller").on('change', function (e, value) {
        var value = $(this).val();
        var remove_rating = false;
        if(typeof(value) == 'undefined' || parseInt(value) == 0){
            var r = confirm("Are you sure you want to remove your rating?");
            if (r == true) {
                var remove_rating = true;
                var value = 0;
            } else {

            }
        }

        var data = {};
        data.rel_type = $(this).data('rel-type');
        data.rel_id = $(this).data('rel-id');
        if (!remove_rating && $(this).data('require-comment')) {
            var comment = prompt("请输入评论为您的评级", "");
            if (comment != null) {
                data.comment = comment;
            } else {
                return;
            }
        }


        data.rating = value;
        mw.rating.save(data);


    });
});

$(document).ready(function () {

    $('.starrr').on('starrr:change', function (e, value) {
        var remove_rating = false;
        if(typeof(value) == 'undefined' || parseInt(value) == 0){
            var r = confirm("您确定要删除您的评级吗？");
            if (r == true) {
                var remove_rating = true;
                var value = 0;
            } else {

            }
        }


        var data = {};
        data.rel_type = $(this).data('rel-type');
        data.rel_id = $(this).data('rel-id');
        if (!remove_rating && $(this).data('require-comment')) {
            var comment = prompt("请输入评论为您的评级", "");
            if (comment != null) {
                data.comment = comment;
            } else {
                return;
            }
        }


        data.rating = value;
        mw.rating.save(data);
    });


});
