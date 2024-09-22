<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="description" content="Autofill">
        <meta name="description" content="Skin Options">
        <title>WASTIE</title>
        {{--  <title>{{ config('app.name', 'WASTIE') }}</title>  --}}
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="AltEditor (beta)">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/vendors.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/app.bundle.css')}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admins/img/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admins/img/favicon/favicon-32x32.png')}}">
        <link rel="mask-icon" href="{{asset('admins/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/datagrid/datatables/datatables.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/theme-demo.css')}}">
        {{-- <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/notifications/sweetalert2/sweetalert2.bundle.css')}}"> --}}
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/formplugins/select2/select2.bundle.css')}}">

        {{-- toastr --}}
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/notifications/toastr/toastr.css')}}">
        {{-- datepicker --}}
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('admins/css/kswm-table.css') }}">
        <link rel="stylesheet" href="{{ asset('admins/css/invoice.css') }}">
        {{-- dropzone --}}
        <link rel="stylesheet" href="{{ asset('admins/css/formplugins/dropzone/dropzone.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        {{-- lightgallery --}}
        <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/miscellaneous/lightgallery/lightgallery.bundle.css')}}">

        @if (App::getLocale() == "en")
            <link href="{{ asset('admins/css/style-font-en.css') }}" rel="stylesheet" type="text/css">
        @else
            <link href="{{ asset('admins/css/style-font-kh.css') }}" rel="stylesheet" type="text/css">
        @endif
        @yield('style')
        <style>
              .imgGallery img {
                padding: 8px;
                max-width: 100px;
            }
            .drowsons_img{
                border-radius: 3px;
                border: 1px dashed #ccc;
                background-color: #f9f9f9;
                padding: 1.2em;
            }
            .nav-link-text-lang{
                font-size: 0.875rem;
            }
            .pagination .page-link:hover {
                background-color: #008000 !important;
            }
            .header-function-fixed .btn-switch[data-class="header-function-fixed"]{
                background-color: #008000 !important;
            }
            .nav-function-fixed .btn-switch[data-class="nav-function-fixed"]{
                background-color: #008000 !important;
            }
            .header-function-fixed .btn-switch[data-class="header-function-fixed"] + .onoffswitch-title {
                color: #008000 !important;
            }
            .nav-function-fixed .btn-switch[data-class="nav-function-fixed"] + .onoffswitch-title{
                color: #008000 !important;
            }
            .nav-menu li.active > a{
                box-shadow: inset 3px 0 0 #008000 !important;
                background-color: #f1f3f3 !important;
            }
            .header-icon:not(.btn) > [class*='fa-']:first-child {
                color:#f1f3f3 !important;
            }
            .bg-trans-gradient{
                background:  #008000 !important;
            }

            .name{
                float: right;
            }

            /* Add Style this */
            #previewImage{
                text-align: center;
            }
            .image-preview {
                position: relative;
                width: 100px;
                height: 100px;
                overflow: hidden;
                border: 1px solid #ccc;
                border-radius: 10px;
            }
            .image-preview img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .remove-image {
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: rgba(255, 0, 0, 0.7);
                color: #fff;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                width: 17px;
            }
            #lb_image {
                margin-top: 10px;
                padding: 10px 20px;
                border: none;
                background-color: #01972e;
                color: #fff;
                border-radius: 5px;
                cursor: pointer;
            }
            #lb_image:hover {
                background-color: #045f1f;
            }
            /* Add Style this */

        </style>
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /**
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /**
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /**
             * Save to localstorage
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /**
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }
        </script>

        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside page-sidebar-->
                <aside class="page-sidebar">
                    <div class="page-logo bg-success-600">
                        <a href="#" class="page-logo-link position-absolute text-white opacity-200 press-scale-down d-flex align-items-center position-relative " data-toggle="modal" data-target="#modal-shortcut">
                            <img src="{{asset('admins/img/logo.png')}}" alt="Wastie Collection" aria-roledescription="logo">
                            <span class="position-absolute small pos-top pos-right mr-2 mt-n2"></span>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    @include('layouts.navbar')
                    <!-- END PRIMARY NAVIGATION -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header bg-success-600" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo ">
                            <a href="#" class="page-logo-link  <thead  press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="{{asset('admins/img/logo.png')}}" alt="Wastie Collection" aria-roledescription="logo">
                                <span class="page-logo-text mr-1 ">Wastie Collection</span>
                                <span class="position-absolute  small pos-top pos-right mr-2 mt-n2"></span>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down  dropdown-icon-menu position-relative ">
                            <a href="#" class="header-btn btn border-success bg-success-600 waves-effect waves-themed " data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="btn-group mr-1">
                            <a class="btn btn-outline-success bg-success-600 dropdown-toggle waves-effect waves-themed" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @switch(App::getLocale())
                                    @case('en')
                                        <span>{{Helper::getLang() == 'en' ? 'English' : 'អង់គ្លេស'}}</span>
                                    @break

                                    @case('kh')
                                        <span>{{Helper::getLang() == 'en' ? 'Khmer' : 'ខ្មែរ'}}</span>
                                    @break
                                    @default
                                    <span>{{Helper::getLang() == 'en' ? 'English' : 'អង់គ្លេស'}}</span>
                                @endswitch
                            </a>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a class="dropdown-item" href="{{ url('lang/en') }}"><img src="{{asset('/admins/img/lang/us.png')}}" alt="" height="20">&nbsp;{{Helper::getLang() == 'en' ? 'English' : 'អង់គ្លេស'}}</a>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="{{ url('lang/kh') }}"><img src="{{asset('/admins/img/lang/flag-of-cambodia-logo.png')}}" alt="" height="15">&nbsp;{{Helper::getLang() == 'en' ? 'Khmer' : 'ខ្មែរ'}}</a>
                            </div>
                        </div>

                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up ">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                                    <i class="fal fa-search "></i>
                                </a>
                            </div>
                            <!-- app settings -->
                            <div class="hidden-md-down">
                                <a href="#" class="header-icon " data-toggle="modal" data-target=".js-modal-settings">
                                    <i class="fal fa-cog"></i>
                                </a>
                            </div>

                            <!-- app notification -->
                            <div>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
                                    <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                        <div class="tab-pane" id="tab-messages" role="tabpanel">
                                            <div class="custom-scroll h-100">
                                                <ul class="notification">
                                                    <li class="unread">
                                                        <a href="#" class="d-flex align-items-center">
                                                            <span class="status mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block " style="background-image:url('/admins/img/demo/avatars/avatar-c.png')"></span>
                                                            </span>
                                                            <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Melissa Ayre <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-1">INBOX</span></span>
                                                                <span class="msg-a fs-sm">Re: New security codes</span>
                                                                <span class="msg-b fs-xs">Hello again and thanks for being part...</span>
                                                                <span class="fs-nano text-muted mt-1">56 seconds ago</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" class="bg-success-600 header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="{{ asset('admins/img/demo/avatars/avatar-admin.jpg') }}" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                                </a>
                            </div>
                                <div class="">
                                   <a class=" text-light dropdown-toggle waves-effect waves-themed d-flex flex-row py-4 rounded-top align-items-center " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h6>{{ Auth::user()->name}}</h6></a>
                                <div class="dropdown-menu dropdown-xl">
                                    <div class="dropdown-header bg-success-600 d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex align-items-center ">
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
                                                <span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-divider m-0 "></div>
                                    <a href="#" class="dropdown-item" data-action="app-reset">
                                        <span data-i18n="drpdwn.reset_layout">@lang('lang.layout_reset')</span>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">@lang('lang.setting')</span>
                                    </a>
                                    <a href="{{ url('admins/profile/' . Auth::user()->id) }}" class="dropdown-item" title="profile" data-filter-tags="profile">
                                        <span data-i18n="drpdwn.profile">@lang('lang.profile')</span>
                                    </a>

                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang{{ __('lang.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">sf</a></li>
                            <li class="breadcrumb-item">{{ Auth::user()->name }}</li>
                            <li class="breadcrumb-item active"> {{ ucwords(str_replace('-', ' ', strtolower(request()->segment(2) ?? ''))) }}{{ request()->segment(3) ? ' / ' . ucwords(str_replace('-', ' ', strtolower(request()->segment(3)))) : '' }}</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        @yield('content')
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            {{-- <span class="hidden-md-down fw-700">{{Carbon\Carbon::now()->format('Y')}} © Develop by &nbsp;<a href='#' class='text-secondary fw-700' title='gotbootstrap.com'>WASTIE</a></span> --}}
                        </div>
                        <div>
                            <ul class="list-table m-0">
                                <li>{{Carbon\Carbon::now()->format('Y')}} © Develop by &nbsp;<a href='#' class='text-secondary fw-700' title='gotbootstrap.com'>WASTIE</a></li>
                            </ul>
                        </div>
                    </footer>
                    <!-- END Page Footer -->
                    {{--  <!-- we use this only for CSS color refernce for JS stuff -->  --}}
                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-10"></span>
                    </p>
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Page Settings -->
        <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right btn-outline-success bg-success-600 modal-md">
                <div class="modal-content ">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">

                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="settings-panel">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h6 class="p-0">
                                        App Layout
                                    </h6>
                                </div>
                            </div>
                            <div class="list" id="fh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                                <span class="onoffswitch-title">@lang('lang.fixed_header')</span>
                                <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                            </div>
                            <div class="list" id="nff">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Navigation</span>
                                <span class="onoffswitch-title-desc">left panel is fixed</span>
                            </div>
                            <div class="list" id="nfm">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                                <span class="onoffswitch-title">Minify Navigation</span>
                                <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                            </div>
                            <div class="list" id="nfh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                                <span class="onoffswitch-title">Hide Navigation</span>
                                <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Top Navigation</span>
                                <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                            </div>
                            <div class="list" id="mmb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                                <span class="onoffswitch-title">Boxed Layout</span>
                                <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                            </div>
                            <div class="expanded">
                                <ul class="">
                                    <li>
                                        <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                    </li>
                                    <li>
                                        <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                    </li>
                                    <li>
                                        <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                    </li>
                                    <li>
                                        <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                    </li>
                                </ul>
                                <div class="list" id="mbgf">
                                    <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                                    <span class="onoffswitch-title">Fixed Background</span>
                                </div>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Mobile Menu
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="nmp">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                                <span class="onoffswitch-title">Push Content</span>
                                <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                            </div>
                            <div class="list" id="nmno">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                                <span class="onoffswitch-title">No Overlay</span>
                                <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                            </div>
                            <div class="list" id="sldo">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                                <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                                <span class="onoffswitch-title-desc">Content overlaps menu</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Accessibility
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mbf">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                                <span class="onoffswitch-title">Bigger Content Font</span>
                                <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                            </div>
                            <div class="list" id="mhc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                                <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                                <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                            </div>
                            <div class="list" id="mcb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                                <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                                <span class="onoffswitch-title-desc">color vision deficiency</span>
                            </div>
                            <div class="list" id="mpc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                                <span class="onoffswitch-title">Preloader Inside</span>
                                <span class="onoffswitch-title-desc">preloader will be inside content</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Global Modifications
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mcbg">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                                <span class="onoffswitch-title">Clean Page Background</span>
                                <span class="onoffswitch-title-desc">adds more whitespace</span>
                            </div>
                            <div class="list" id="mhni">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                                <span class="onoffswitch-title">Hide Navigation Icons</span>
                                <span class="onoffswitch-title-desc">invisible navigation icons</span>
                            </div>
                            <div class="list" id="dan">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                                <span class="onoffswitch-title">Disable CSS Animation</span>
                                <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                            </div>
                            <div class="list" id="mhic">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                                <span class="onoffswitch-title">Hide Info Card</span>
                                <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                            </div>
                            <div class="list" id="mlph">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                                <span class="onoffswitch-title">Lean Subheader</span>
                                <span class="onoffswitch-title-desc">distinguished page header</span>
                            </div>
                            <div class="list" id="mnl">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                                <span class="onoffswitch-title">Hierarchical Navigation</span>
                                <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                            </div>
                            <div class="list mt-1">
                                <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                                <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                        <input type="radio" name="changeFrontSize"> SM
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                        <input type="radio" name="changeFrontSize" checked=""> MD
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                        <input type="radio" name="changeFrontSize"> LG
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                        <input type="radio" name="changeFrontSize"> XL
                                    </label>
                                </div>
                                <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
                                    values</span>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
                                    <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
                                    the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
                                    experience a brief flickering effect on page load which may show the intial applied theme for a split
                                    second. Setting the prefered style/theme in the header will prevent this from happening.
                                </div>
                            </div>
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Theme colors
                                    </h5>
                                </div>
                            </div>
                            <div class="expanded theme-colors pl-5 pr-3">
                                <ul class="m-0">
                                    <li>
                                        <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="pl-5 pr-3 py-3 bg-faded">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div> <span id="saving"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Page Settings -->
        <script src="{{asset('admins/js/vendors.bundle.js')}}"></script>
        <script src="{{asset('admins/js/app.bundle.js')}}"></script>
        <script src="{{asset('admins/js/statistics/peity/peity.bundle.js')}}"></script>
        <script src="{{asset('admins/js/datagrid/datatables/datatables.bundle.js')}}"></script>

        {{-- <script src="{{asset('admins/js/notifications/sweetalert2/sweetalert2.bundle.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

        <script src="{{asset('admins/js/formplugins/select2/select2.bundle.js')}}"></script>
        {{-- toastr --}}
        <script src="{{asset('admins/js/notifications/toastr/toastr.js')}}"></script>
        {{-- datepicker --}}
        <script src="{{asset('admins/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
        {!! Toastr::message() !!}
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        {{-- dropzone --}}
        <script src="{{asset('admins/js/formplugins/dropzone/dropzone.js')}}"></script>

        <script src="{{asset('/js/script.js')}}"></script>
        <script src="{{asset('admins/js/miscellaneous/lightgallery/lightgallery.bundle.js')}}"></script>

        <script src="{{asset('admins/js/bootstrap3-typeahead.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const switchBranch = (id)=>{
               $.ajax({
                    type: "POST",
                    url: "{{url('admins/switch/branch')}}",
                    data: {
                        branch_id : id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.mg == "success") {
                            toastr.success("Branch switched successfully!", "@lang('lang.message_title')");
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                });
            }

            $(document).ready(function() {
                var $initScope = $('.lightgallery');

                if ($initScope.length) {
                    // Initialize lightGallery
                    $initScope.lightGallery({
                        thumbnail: true,
                        animateThumb: true,
                        showThumbByDefault: true,
                    });
                }

                // Add body class on lightGallery open
                $initScope.on('onAfterOpen.lg', function(event) {
                    $('body').addClass("overflow-hidden");
                });

                // Remove body class on lightGallery close
                $initScope.on('onCloseAfter.lg', function(event) {
                    $('body').removeClass("overflow-hidden");
                });
            });

            /* demo scripts for change table color */
            /* change background */
            $(document).ready(function()
            {
                'use strict';
                window.addEventListener('load', function()
                {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form)
                    {
                        form.addEventListener('submit', function(event)
                        {
                            if (form.checkValidity() === false)
                            {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
                var controls = {
                    leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                    rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
                }
                $('.datepicker').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });
                $('.select2').select2();

                $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });
                $('#dt-basic-approve').dataTable(
                {
                    responsive: true
                });

                $('.js-thead-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
                });

                $('.js-tbody-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
                });
                $('#js_change_tab_direction input').on('change', function()
                {
                    var newclass = $('input[name=radioNameTabDirection]:checked', '#js_change_tab_direction').val();
                    $('#js_change_tab_direction').parent('.panel-tag').next('.nav.nav-tabs').removeClass().addClass(newclass);
                });
                $('#js_change_pill_direction input').on('change', function()
                {
                    var newclass = $('input[name=radioNamePillDirection]:checked', '#js_change_pill_direction').val();
                    $('#js_change_pill_direction').parent('.panel-tag').next('.nav.nav-pills').removeClass().addClass(newclass);
                });
            });
        </script>
        @yield('script')
    </body>
</html>
