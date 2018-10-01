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
            <header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-light ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="/adminsec?view=dashboard" class="m-brand__logo-wrapper">
                                        <img alt="" src="{{URL::to('/')}}/assets/demo/demo6/media/img/logo/logo.png" style=" width: 75px; "/>
                                    </a>
                                    <h3 class="m-header__title">
                                        ExamCloud
                                    </h3>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                            <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <div class="m-header__title">
                                <h3 class="m-header__title-text">
                                    ExamCloud
                                </h3>
                            </div>
                            <!-- BEGIN: Horizontal Menu -->
                            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
                            
                            <!-- END: Horizontal Menu -->               
                <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-light" id="m_quicksearch" m-quicksearch-mode="default">

                                    <!--BEGIN: Search Results -->
                                    <div class="m-dropdown__wrapper">
                                        <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"  data-max-height="300" data-mobile-max-height="200">
                                                    <div class="m-dropdown__content m-list-search m-list-search--skin-light"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--BEGIN: END Results -->
                                </div>

                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                              @if($user->can('jobseeker') ||$user->can('contactperson') || $user->can('company'))



                                        <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1" aria-expanded="true">
    <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
        <span class="m-nav__link-icon"><i class="flaticon-music-2"></i></span>
    </a>
    <div class="m-dropdown__wrapper" style="z-index: 101;">
        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
        <div class="m-dropdown__inner">
            <div class="m-dropdown__header m--align-center" style="background: url(./assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
                <span class="m-dropdown__header-title">Notifications</span>
                <span class="m-dropdown__header-subtitle">User Notifications</span>
            </div>
            <div class="m-dropdown__body">              
                <div class="m-dropdown__content">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                            <div class="m-scrollable mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" data-scrollable="true" data-max-height="250" data-mobile-max-height="200" style="max-height: 250px; height: 250px; position: relative; overflow: visible;"><div id="mCSB_2" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: 250px;" tabindex="0"><div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                <div class="m-list-timeline m-list-timeline--skin-light">
                                    <div class="m-list-timeline__items">
                                        <div class="m-dropdown__body">

                                                                    <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                                    <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                                                            <div class="m-list-timeline__items">
                                                                                @foreach($notifications as $notification)
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                       {{ json_decode($notification['data'])->action}}
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
    {{\Carbon\Carbon::parse($notification['created_at'])->diffForHumans()}}
        </span>
                                                                                </div>
                                                                          @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                        </div>
                                    </div>
                                </div>
                            </div></div></div>
                        </div>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>                                                    
                                        @endcan

                                        <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic m--hide">
                                                    <img src="{{URL::to('/')}}/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                </span>
                                                <span class="m-nav__link-icon m-topbar__usericon">
                                                    <span class="m-nav__link-icon-wrapper">
                                                        <i class="flaticon-user-ok"></i>
                                                    </span>
                                                </span>
                                                <span class="m-topbar__username m--hide">
                                                    {{$user->username}}
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <div class="m-card-user m-card-user--skin-light">
                                                            <div class="m-card-user__pic">
                                                                <img src="{{URL::to('/')}}/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                    {{$user->username}}
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    {{$user->email}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__section m--hide">
                                                                    <span class="m-nav__section-text">
                                                                        Section
                                                                    </span>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="?view=account" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                        <span class="m-nav__link-title">
                                                                            <span class="m-nav__link-wrap">
                                                                                <span class="m-nav__link-text">
                                                                                    حسابى
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                @can('admin')
                                                                <li class="m-nav__item">
                                                                    <a href="?view=support" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                        <span class="m-nav__link-text">
                                                                            رسائل الدعم
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                @endcan
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        تسجيل خروج
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                 
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->        
        <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light ">
                    <!-- BEGIN: Aside Menu -->
                        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                        @can('admin')
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=dashboard" class="m-menu__link ">
                                    <i class="m-menu__link-icon flaticon-grid-menu-v2"></i>
                                    <span class="m-menu__link-text">
                                        لوحة القيادة
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    لوحة القيادة
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=users" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-avatar"></i>
                                    <span class="m-menu__link-text">
                                        الإداريين
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    الإداريين
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=playgroundowner" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-user"></i>
                                    <span class="m-menu__link-text">
                                        أصحاب الملاعب
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    أصحاب الملاعب
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>     

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=clients" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users"></i>
                                    <span class="m-menu__link-text">
                                        العملاء
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    العملاء
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>   
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=playgroundgroup" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
                                        مجموعات الملاعب
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                        مجموعات الملاعب
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>  
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=orders" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-coins  "></i>
                                    <span class="m-menu__link-text">
                                        الحجوزات
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    الحجوزات
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>  
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=settings" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-settings"></i>
                                    <span class="m-menu__link-text">
                                        إعدادات
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    إعدادات
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=cities" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-placeholder-1"></i>
                                    <span class="m-menu__link-text">
                                        المدن والمواقع
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    المدن والمواقع
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                                <a  href="?view=support" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-lifebuoy"></i>
                                    <span class="m-menu__link-text">
                                        الدعم
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                الدعم
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                        @endcan
                        
                         
                          
                      
                                        </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->
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

<!-- begin::Footer -->
            <footer class="m-grid__item     m-footer ">
                <div class="m-container m-container--fluid m-container--full-height m-page__container">
                    <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                            <span class="m-footer__copyright">
                                2018 &copy; ExamCloud.com 
                            </span>
                        </div>
                        
                    </div>
                </div>
            </footer>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
             
        <!-- begin::Scroll Top -->
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <!-- end::Scroll Top -->  
        <!--begin::Base Scripts -->
        <script src="{{URL::to('/')}}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="{{URL::to('/')}}/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

        <!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
              <script src="{{URL::to('/')}}/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

        <!--end::Page Vendors -->  
    
        <!--Zi Stuff-->
        <script src="{{URL::to('/')}}/assets/global/scripts/ziform.js" type="text/javascript"></script>
        <script src="{{URL::to('/')}}/assets/global/scripts/ziselect.js" type="text/javascript"></script>

        <script src="{{URL::to('/')}}/assets/global/plugins/jquery_chained-2.x/jquery.chained.js" type="text/javascript"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDCQFhPHqArEnilysXeHLrbp2FHOnHPIiE&sensor=false&libraries=places"></script>
        <script src="{{url("")}}/assets/plugins/locationpicker/dist/locationpicker.jquery.js"></script>            
        <script src="{{URL::to('/')}}/assets/plugins/fontawesome-iconpicker-1.3.1/dist/js/fontawesome-iconpicker.min.js"></script>
        <script src="{{URL::to('/')}}/assets/plugins/Export-Table-JSON-Data-To-Excel-jQuery-ExportToExcel/excelexportjs.js"></script>

@yield('script')
            
<script type="text/javascript">
    $(document).ready(function () {
        $("#series").chained("#mark");
        
    });
</script>
<script type="text/javascript">
    $('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 ضصثقفغعهخحجدشسيبلاتنمكطئءؤرﻻىةوزظذﻵآ؟?أﻷ @._, #$&]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});

</script>
    </body>
    <!-- end::Body -->
</html>
