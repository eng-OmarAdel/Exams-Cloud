




  <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="email" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
{{-- 




<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        
        <title>ay 7aga | Login</title>

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
                            <ul class="nav-menu" data-aos="fade-left" data-aos-duration="1000">
                                <li><a href="{{url('')}}/">Home</a></li>
                                <li><a href="{{url('')}}/about-us">About us</a></li>
                                <li><a href="{{url('')}}/#section4">Sectors</a></li>
                                <li><a href="{{url('')}}/jobs-listing">Jobs</a></li>
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
                            </ul><!--nav-menu-->
                            <div class="wrapper">
                              <header id="header" class="header">
                                <nav class="menu-navigation">
                                  <a href="#" class="menu-icon-toggle"><span></span></a>
                                  <i class="menu-background top"></i>
                                  <i class="menu-background middle"></i>
                                  <i class="menu-background bottom"></i>
                                  <ul class="menu">
                                    <li><a href="{{url('')}}">Home</a></li>
                                    <li><a href="{{url('')}}/about-us">About us</a></li>
                                    <li><a href="{{url('')}}/#section4">Sectors</a></li>
                                    <li><a href="{{url('')}}/jobs-listing">Jobs</a></li>
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
                                  </ul>
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
            <div class="m-login__account">
                <span class="m-login__account-msg">
                Don't have an account yet ?
                </span>&nbsp;&nbsp;
                <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
            </div>
            <div class="m-login__signin">
                
                <form method="POST" action="../login" class="m-login__form m-form" >
                {{ csrf_field() }}
                    <div class="form-group m-form__group">
                        <input class="form-control m-input"   type="text" placeholder="Email" name="email" autocomplete="off">
                         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                         @endif

                    </div>
                    <div class="form-group m-form__group">
                        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                         @endif
                    </div>
                    <div class="row m-login__form-sub">
                        <div class="col m--align-left m-login__form-left">
                            <label class="m-checkbox  m-checkbox--accent">
                            <input type="checkbox" name="remember"> Remember me
                            <span></span>
                            </label>
                        </div>
                        <div class="col m--align-right m-login__form-right">
                            <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                        </div>
                    </div>
                    <div class="m-login__form-action">
                        <button id="m_login_signin_submit" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="m-login__forget-password">
                <div class="m-login__head">
                    <h3 class="m-login__title">Forgotten Password ?</h3>
                    <div class="m-login__desc">Enter your email to reset your password:</div>
                </div>
                <form class="m-login__form m-form" action="">
                    <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                    </div>
                    <div class="m-login__form-action">
                        <button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
                        <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="m-login__signup">
                <div class="m-login__head">
                    <h3 class="m-login__title">Sign Up</h3>
                    <div class="m-login__desc">Enter your details to create your account:</div>
                </div>
                <form method="POST" action="../register" id="form_add" class="m-login__form m-form" >
                    {{ csrf_field() }}
                    <div class="row">
                <div class="col-md-6">
                    <h5 class="m-section__heading">Contact Information</h5>
                    <div class="form-group m-form__group">
                        <input type="text" class="ignoreField form-control m-input" name="name"  id="name"  placeholder="Full Name">
                    </div>
                    <div class="form-group m-form__group">
                        <input type="number" class="form-control m-input" name="phone"   id="phone"  placeholder="Phone">
                    </div>
                    <div class="form-group m-form__group">
                        <input type="email" class="form-control m-input" name="email"  id="email"  placeholder="Contact Email">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <h5 class="m-section__heading">Login Information</h5>
                    <div class="form-group m-form__group">
                        <input type="email" class="ignoreField form-control m-input" name="login_email"  id="login_email"  placeholder="Login Email">
                    </div>                   
                     <div class="form-group m-form__group">
                        <input  required type="password" class="ignoreField form-control m-input" name="password"  id="password"  placeholder="Enter password">
                    </div>             
                   <div class="form-group m-form__group">
                        <input required type="password" class="ignoreField form-control m-input" name="confirmpassword"  id="confirmpassword"  placeholder="Confirm password">
                    </div>
                </div>
                <div class="col-md-12">
                     <div class="form-group m-form__group">
                        <textarea placeholder="Address" class="form-control m-input" id="address" name="address" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5 class="m-section__heading">CV Information</h5>
                    <div class="form-group m-form__group">
                        <input type="text" class="form-control m-input" name="job_title"  id="job_title"  placeholder="Current Job Title">
                    </div>
                    <div class="form-group m-form__group">
                        <input type="text" class="form-control m-input" name="salary"  id="salary"  placeholder="Current Salary">
                    </div>

                    <div class="form-group m-form__group">
                        <select required class="form-control m-input m-input--air" id="Location" name="location">
                        <option value="">Location</option>
                        </select>
                    </div>

                    <div class="form-group m-form__group">
                        <textarea class="form-control m-input" id="skills" name="skills" placeholder="Skills" rows="3"></textarea>
                    </div>
                    
                                   <h6 class="m-section__heading">Profile Pic</h6>

                        <input required type="file" class="form-control m-input" name="image" id="image"  placeholder="Enter image">
                        <small>Extentions allowed jpeg ,jpg & png</small>
                                   <h6 class="m-section__heading">CV</h6>

                        <input required type="file" class="form-control m-input" name="cv" id="cv"  placeholder="Enter cv">
                        <small>Extentions allowed doc ,docx & pdf</small>
                </div>
            </div>


                
                    <div class="row form-group m-form__group m-login__form-sub">
                        <div class="col m--align-left">
                            <label class="m-checkbox  m-checkbox--accent">
                            <input type="checkbox" name="agree">I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
                            <span></span>
                            </label>
                            <span class="m-form__help"></span>
                        </div>
                    </div>
                    <div class="m-login__form-action">
                        <button id="m_login_signup_submit" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Sign Up</button>&nbsp;&nbsp;
                        <button id="m_login_signup_cancel" class="btn btn-outline-accent m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</button>
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
</html> --}}