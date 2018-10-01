var ZiForm = function () {
    var c = function (form)
    {
        $("input[name!='_token'][name!='company_id'][name!='sector_id'][name!='job_title'][fillable!='never']", form).val('');
        $("select", form).val('');
        $("textarea", form).val('');
    };
    var o = function (form, object) {
        for (var key in object) {
            $("[name='" + key + "']", form).val(object[key]);
        }
    };


  var d = function (nameandid ,data) { data.forEach(function(item) {
    $.each(item[nameandid].split(","), function(i,e){
    $("#"+nameandid+" option[value='" + e + "']").prop("selected", true);
});
});  };




    var v = function (form, rulz, ajax)
    {
        r = $(".alert-danger", form);
        x = $(".alert-warning", form);
        i = $(".alert-success", form);
        form.validate({
            errorElement: "span",
            errorClass: "help-block help-block-error",
            focusInvalid: !1,
            ignore: "",
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                },
                password: {
                    pwcheck: "Password is too weak! Requires digits, lower case, and upper case!"
                }
            },
            rules: rulz,
            invalidHandler: function (e, t) {
                i.hide();
                x.hide();
                r.show();
                App.scrollTo(r, -200);
            }, errorPlacement: function (e, r) {
                var i = $(r).parent(".input-group");
                i.size() > 0 ? i.after(e) : r.after(e);
            }, highlight: function (e) {
                $(e).closest(".form-group").addClass("has-error");
            }, unhighlight: function (e) {
                $(e).closest(".form-group").removeClass("has-error");
            }, success: function (e) {
                e.closest(".form-group").removeClass("has-error");
            }, submitHandler: function (e) {
                i.show();
                r.hide();
                form.ajaxSubmit(ajax);
            }
        });
    };
    return{
        populate: function (form, object) {
            o(form, object);
        },
        multiselect: function (selectid ,key ,data) {
            d(selectid ,key ,data);
        },
        clear: function (form) {
            c(form);
        },
        validate: function (form, rules, ajax) {
            v(form, rules, ajax);
        }
    };
}();