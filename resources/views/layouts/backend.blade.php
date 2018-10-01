<!DOCTYPE html>
<html   >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
           @yield('title') | ExamCloud 
        </title>
        <meta name="description" content="ExamCloud.com">
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
        <style>
            label,th {
                text-transform: capitalize;
            }
        </style>

        <!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->

        <link href="{{URL::to('/')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="{{URL::to('/')}}/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/assets/demo/demo6/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/assets/global/plugins/old-datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

                <script src="{{URL::to('/')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <link href="{{URL::to('/')}}/assets/plugins/fontawesome-iconpicker-1.3.1/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">

        <!--end::Base Styles -->
        <link rel="shortcut icon" href="{{URL::to('/')}}/assets/demo/demo6/media/img/logo/favicon.png" />

    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
                @include('inc.header')

            <!-- END: Header -->        
        <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>                        
                @include('inc.nav')

     
                         
                          
                  
                            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                                
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">@yield('title')</h3>         
        </div>
    </div>
</div>
<!-- END: Subheader -->     
                <!--beign:: Content-->
                    <div class="m-content">
                    @yield('content')
                    </div>
                <!--END:: Content-->
            </div>
            </div>
            <!-- end:: Body -->

                @include('inc.footer')

        </div>
        <!-- end:: Page -->
             
        <!-- begin::Scroll Top -->
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <!-- end::Scroll Top -->  
                @include('inc.base_scripts')
        

@yield('script')
            
                @include('inc.script_code')

    </body>
    <!-- end::Body -->
</html>
