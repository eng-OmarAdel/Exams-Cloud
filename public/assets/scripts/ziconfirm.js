var ZiConfirm = function () {
    var o = function () {
        $(".ziconfirm").off("click");
        $(".ziconfirm").click(function () {
            var e = $(this);
            bootbox.confirm("Are you sure?", function (o) {
                if (o) {
                    eval(e.data('confirmcallback'));
                }
            });
        });
    };
    return{init: function () {
            o();
        }};
}();