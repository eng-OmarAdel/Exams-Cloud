@can('admin')
@extends('layouts.backend')
@section('title')
اعدادات الحساب
@endsection('title')
@section('content')
<div class="row">

    <div class="col-lg-12">  

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_form">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-placeholder-2"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                             <b>تعديل اعدادات الحساب</b>
                        </h3>
                    </div>          
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#"  m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a> 
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href=""  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a>  
                        </li>
                    </ul>
                </div>
            </div>
            <!--begin::Form-->
<form action="users/{{$user->id}}" id="form_add" method="post" class="m-form m-form--fit m-form--label-align-right" novalidate="novalidate">
                <input type="hidden" name="_token" value="U9wkwgMs1WQTsIP1XDVt3f57NR4TTnb0QcF7NEpM">
                <input type="hidden" name="_method" value="PUT" fillable="never">
             
                <div class="m-portlet__body">

<div id="test">
{{csrf_field()}}

                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">الاسم</label>
                        <input type="text" class="ignoreField form-control m-input" name="username" value="{{$user->username}}" id="username" placeholder="الاسم">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">الايميل</label>
                        <input type="email" class="ignoreField form-control m-input" value="{{$user->email}}" name="email" id="email" placeholder="الايميل">
                    </div>                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">كلمة المرور</label>
                        <input  type="password" class="ignoreField form-control m-input" name="password" id="password" placeholder="كلمة المرور">
                    </div>             
                   <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">تأكيد كلمة المرور</label>
                        <input  type="password" class="ignoreField form-control m-input" name="confirmpassword" id="confirmpassword" placeholder="تأكيد كلمة المرور">
                    </div>

                    

</div>
                    
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                        <button type="reset" m-portlet-tool="toggle"  class="btn btn-secondary">مسح كلمة السر</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->    
        </div>  
        <!--end::Portlet-->

    </div>
</div>


<!------------------------------------------------------------------------------>


@endsection

@section('script')

<script>
//Table Name Variable



var Form_submit = function() {
    var o = function() {
        var container = "#m_portlet_form";
        var e = $("#form_add");

        e.validate({
            errorElement: "span",
            errorClass: "help-block help-block-error",
            focusInvalid: !1,
            ignore: "",
          
            rules: {

         
                email: {
                    required: true,
                    email: true,
                    maxlength: 255,
                    remote: {
                                url: 'emailcheck',
                                type: 'get',
                                data: {


                                      email: function() {
                                        return $('#email').val(); 
                                      },
                                      user: function() {
                                        return $('#form_add').attr('action').split("/")[1]; 
                                      },
                                           
                            },
                    }
                },
                password: {

                    maxlength: 255,
                    minlength: 8,

                },
                confirmpassword: {
                    equalTo: "#password",
                    maxlength: 255,
                    minlength: 8,

                },
             
                username:{
                    required: true,
                    maxlength: 255,

                } ,

    
  




            },
            submitHandler: function (x) {

                e.ajaxSubmit({
                    success: function() {swal('تم التعديل بنجاح')},
                    error: function(request, errordata, errorObject) { swal('error while updating profile') },
                });

            }
        });
    };
    return {
        init: function() {
            o();
        }
    };
}();


//var editor = CKEDITOR.replace( 'bodyy' );
//editor.on( 'change', function( evt ) {
///for ( instance in CKEDITOR.instances ) {
  //      CKEDITOR.instances[instance].updateElement();
//}

//});
jQuery(document).ready(function() {
    Form_submit.init();
});

</script>
@endsection

@endcan
