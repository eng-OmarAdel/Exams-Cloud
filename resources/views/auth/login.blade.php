
<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        
        <title>ExamCloud | Login</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->

        <!--begin::Base Styles -->  

         
                <link rel="stylesheet" type="text/css" href="{{url('')}}/front/css/style.css">
                <link rel="stylesheet" type="text/css" href="{{url('')}}/front/css/responsive.css">
                <link href="{{url('')}}/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
                <link href="{{url('')}}/assets/demo/demo6/base/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Base Styles -->

        <link rel="shortcut icon" href="{{URL::to('/')}}/assets/demo/demo6/media/img/logo/favicon.png" />
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37564768-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
    <!-- end::Head -->

    
    <!-- end::Body -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

        
        
        <!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    
            
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{url('')}}/assets/app/media/img//bg/bg-3.jpg);">
                  
    <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
        <div class="m-login__container">
            <div class="m-login__logo">
                <a href="{{url('')}}">
                <img width="250px" src="{{url('')}}/assets/logo.png">    
                </a>
            </div>
          {{--   <div class="m-login__account">
                <span class="m-login__account-msg">
                Don't have an account yet ?
                </span>&nbsp;&nbsp;
                <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
            </div> --}}
            <div class="m-login__signin">

                <form method="POST" action="../login" class="m-login__form m-form" >

               
                
                @if (Session::has('verification_success'))
     <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" role="alert">           <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>           <span>{{ Session::get('verification_success') }}</span>       </div>                @endif

                @if (Session::has('verification_failed'))
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">           <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>           <span>{{ Session::get('verification_failed') }}</span>       </div>
                @endif
                {{ csrf_field() }}
                    <div class="form-group m-form__group">
                        <input  required class="form-control m-input"   type="email" placeholder="email" name="email" autocomplete="off">
                        @php $allerr= $errors->first(); @endphp


                        @if ($errors->any())
                                <ul>
                                    @foreach ($errors->get('email') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif
                         

                    </div>
                    <div class="form-group m-form__group">
                        <input required class="form-control m-input m-login__form-input--last" type="password" placeholder="password" name="password">
                        @if ($errors->any())
                                <ul>
                                    @foreach ($errors->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif
                    </div>
                    <div class="row m-login__form-sub">
{{--                         <div class="col m--align-left m-login__form-left">
                            <label class="m-checkbox  m-checkbox--accent">
                            <input type="checkbox" name="remember"> remember me
                            <span></span>
                            </label>
                        </div> --}}
{{--                         <div class="col m--align-right m-login__form-right">
                            <a href="javascript:;" id="m_login_forget_password" class="m-link">forget password ?</a>
                        </div>
                    </div> --}}
                    <div class="m-login__form-action">
                        <button id="m_login_signin_submit" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="m-login__forget-password">
                <div class="m-login__head">
                    <h3 class="m-login__title">forget password ?</h3>
                    <div class="m-login__desc">enter email to change the password.</div>
                </div>
                <form class="m-login__form m-form" action="password/email" method="POST" >
                    <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" placeholder="email" name="email" id="m_email" autocomplete="off">
                    </div>
                    {{csrf_field()}}
                    <div class="m-login__form-action">
                        <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">submit</button>&nbsp;&nbsp;
                        <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">cancel</button>
                    </div>
                </form>
            </div>
            
        </div>  
    </div>
</div>              
        

</div>
<!-- end:: Page -->

                    <!--begin::Base Scripts -->        
                <script src="{{url('')}}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
                <script src="{{url('')}}/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
                <!--end::Base Scripts -->   
       
                <!--end::Page Snippets -->   
                   <!--Zi Stuff-->
        <script src="{{URL::to('/')}}/assets/global/scripts/ziform.js" type="text/javascript"></script>
        <script src="{{URL::to('/')}}/assets/global/scripts/ziselect.js" type="text/javascript"></script>

        <script>
//Table Name Variable

var Form_submit = function() {
    var o = function() {
        var e = $("#form_add");
        ZiForm.validate(
            e, {

         
                login_email: {
                    required: true,
                    email: true,
                    remote: {
                                url: 'emailcheck2',
                                type: 'get',
                                data: {


                                      email: function() {
                                        return $('#login_email').val(); 
                                      },
                                      jobseeker: function() {
                                        return $('#form_add').attr('action').split("/")[1]; 
                                      },
                                           
                            },
                    }                },

                password: {

                    maxlength: 255,
                    minlength: 8,

                },
                confirmpassword: {
                    equalTo: "#password",
                    maxlength: 255,
                    minlength: 8,

                },
             
                name:{
                    required: true,
                    maxlength: 255,
                } ,            
                address:{
                    required: true,
                } ,
                phone:{
                    required: true,
                    number: true,
                    maxlength: 255,
                } ,
                email:{
                    required: true,
                    email: true,
                    maxlength: 255,
                } ,   
                image:{
                    accept:"image/jpeg,image/jpg,image/png",

                },   
                cv:{
                    extension: "docx|doc|pdf"

                } ,     
                skills:{
                    required: true,
                } ,            
                salary:{
                    required: true,
                    maxlength: 255,
                } ,            
                
                location:{
                    required: true,
                    maxlength: 255,
                } ,            
                
                job_title:{
                    required: true,
                    maxlength: 255,
                } ,  


            }, {
                beforeSubmit: function(arr, $form, options) {
                },
                success: function(e) {
                
               window.location.replace("jobseekercp");

                }
            }
        );
    };
    return {
        init: function() {
            o();
           
        }
    };
}();


//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
var LocationSelect = function () {
    var o = function () {

            var select2 = $("#Location");
        $.ajax('Location', {
            complete: function (jqXHR, textStatus) {
                var res = $.parseJSON(jqXHR.responseText);
                ZiSelect.populate(select2, res, ['id', 'title']);
            }
        });
    };
        return{init: function () {
                o();
            }};
    }();

////////////////////////////////////////////////////////////////////////////////////

jQuery(document).ready(function() {
    Form_submit.init();
    LocationSelect.init();
});

</script> 
<!--begin::Page Snippets --> 
                <script src="{{url('')}}/assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
                
            </body>
    <!-- end::Body -->
</html>