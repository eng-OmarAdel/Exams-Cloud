<!DOCTYPE html>


<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title> Reset Page </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
            <script src="http://malsup.github.com/jquery.form.js"></script> 

        <script>
            WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
                
        </script>

        <!--end::Web font -->

        <!--begin::Global Theme Styles -->
        <link href="{{url('')}}/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

        <!--RTL version:<link href="{{url('')}}/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="{{url('')}}/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

        <!--RTL version:<link href="{{url('')}}/assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

        <!--end::Global Theme Styles -->
        <link rel="shortcut icon" href="{{url('')}}/assets/demo/default/media/img/logo/favicon.ico" />
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <div class="card-header">{{ __('Reset Password') }}</div>
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
                <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                    <div class="m-stack m-stack--hor m-stack--desktop">
                        <div class="m-stack__item m-stack__item--fluid">
                            <div class="m-login__wrapper">
                                <div class="m-login__logo">
                                    <a href="#">
                                        <img src="{{url('')}}/assets/app/media/img/logos/logo-2.png">
                                    </a>
                                </div>
                <div class="m-login__signin">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                                      
                    </div>
                </div>
              
            </div>
        </div>
         <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1  m-login__content m-grid-item--center" style="background-image: url({{url('')}}/assets/app/media/img//bg/bg-4.jpg)">
                    <div class="m-grid__item">
                        <h3 class="m-login__welcome">Join Our Community</h3>

                    </div>
                </div>
</div>
</div>
        <!-- end:: Page -->

        <!--begin::Global Theme Bundle -->
        <script src="{{url('')}}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="{{url("")}}/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts -->
        <script src="{{url('')}}/assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>

        <!--end::Page Scripts -->
    </body>

    <!-- end::Body -->
</html>