
<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        
        <title>estfham | Login</title>

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
                <link href="{{url('')}}/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
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
                    <div class="inner-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="logo-header" data-aos="fade-right"  data-aos-duration="1000">
                                <a href="{{url('')}}/"><img src="{{url('')}}/front/image/logo.png"></a>
                            </div><!--logo-header-->
                    
                            <div class="wrapper">
                              <header id="header" class="header">
                                <nav class="menu-navigation">
                                  <a href="#" class="menu-icon-toggle"><span></span></a>
                                  <i class="menu-background top"></i>
                                  <i class="menu-background middle"></i>
                                  <i class="menu-background bottom"></i>
                            <ul class="nav-menu" data-aos="fade-left" data-aos-duration="1000">
                                <li><a href="{{url('')}}">Home</a></li>
                                <li><a href="{{url('')}}/about-us">About us</a></li>
                                <li><a href="{{url('')}}/services">Services</a></li>
                                <li><a href="{{url('')}}/#section4">Sectors</a></li>
                                <li><a href="{{url('')}}/jobs-listing">Jobs</a></li>
                                <li><a href="{{url('')}}/courses-search">Courses</a></li>
                                <li><a href="{{url('')}}/blog-listing">Blog</a></li>
                                <li><a href="{{url('')}}/#section7">Contact</a></li>
                                @if (Auth::check())
                                @can('jobseeker')
                                <li><a href="{{url('')}}/jobseekercp">Portal</a></li>
                                @endcan
                                @can('company')
                                <li><a href="{{url('')}}/companycp">Portal</a></li>
                                @endcan
                                @can('admin')
                                <li><a href="{{url('')}}/adminsec">Dashboard</a></li>
                                @endcan
                                <li><a href="{{url('')}}/logout">Logout</a></li>
                                @else
                                <li><a href="{{url('')}}/login">Login/Register</a></li>
                                
                                @endif
                                <li>
                                    <div class="flags">
                                        
                                <a href="{{url('')}}/mena">

                                    <img id="mena" src="{{url('')}}/front/image/flag-ar.png">

                                </a>
                                <a href="{{url('')}}/uk">
                                    <img id="UK" src="{{url('')}}/front/image/flag-en.jpg"> 
                                </a>    
                                    </div>
                                </li>
                            </ul><!--nav-menu-->

                                </nav>
                              </header>
                            </div>
                        </div><!--col-md-12-->
                    </div><!--row-->
                </div><!--container-->
            </div><!--inner-header-->    
    <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
        <div class="m-login__container">
            <div class="m-login__logo">
                <a href="#">
                <img src="{{url('')}}/logoland.png">    
                </a>
            </div>
 
            <div class="m-login__signin">

                                     <form  method="POST" action="{{ route('password.request') }}" action="../register" id="form_add" class="m-login__form m-form" >
                    {{ csrf_field() }}
                    <div class="row">
                                <input type="hidden" name="token" value="{{ $token }}">

                <div class="col-md-12">
                    <div class="form-group m-form__group">
                        <input type="email" class="ignoreField form-control m-input" name="email"  id="login_email"  placeholder="Login Email">
                    </div>                   
                     <div class="form-group m-form__group">
                        <input  required type="password" class="ignoreField form-control m-input" name="password"  id="password"  placeholder="Enter password">
                    </div>             
                   <div class="form-group m-form__group">
                        <input required type="password" class="ignoreField form-control m-input" name="password_confirmation"  id="password_confirmation"  placeholder="Confirm password">
                    </div>
                </div>

                


            </div>


                
               
                    <div class="m-login__form-action">


                        <input class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn" type="submit" name="Submit">&nbsp;&nbsp;
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