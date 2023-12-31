<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>{{__('Login User')}} </title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{url('')}}/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url('')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{url('')}}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
{{--    <link rel="shortcut icon" href="{{asset('assets/lmtna-logos/16x16.png')}}" />--}}
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        {{-- <div class="login-aside d-flex flex-column flex-row-auto" style="background-image: url('{{asset('assets/media/logos/lmtna.jpg')}}');background-repeat: no-repeat;
        background-position: center center;">


        </div> --}}
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
{{--            <img src="{{asset('assets/media/logos/lmtna.jpg')}}" height="200" alt="">--}}
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    {{--                    id="kt_login_signin_form"--}}
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" method="post" action="{{url('/dashboard/login')}}" >
                        <!--begin::Title-->
                        @csrf

                        <div class="pb-5 pt-lg-0 pt-5 text-center">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg mt-3"> {{__('Login Admin')}} </h3>
                            {{--                            <span class="text-muted font-weight-bold font-size-h4">New Here?--}}
                            {{--									<a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>--}}
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group text-right">
                            <label class="font-size-h6 font-weight-bolder text-dark " >البريد الإلكتروني</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="email" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group text-right " style="text-align: right !important">
                            <div class="d-flex justify-content-between mt-n5 text-right">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5 text-right">كلمة المرور</label>
                                {{--                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>--}}
                            </div>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5 text-right">
                            <button type="submit"  class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 ">{{__('login')}}</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
                <!--begin::Signup-->

                <!--end::Signup-->
                <!--begin::Forgot-->
                <div class="login-form login-forgot">
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                        <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                        </div>
                        <!--end::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group d-flex flex-wrap pb-lg-0">
                            <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                            <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                        </div>
                        <!--end::Form group-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Forgot-->
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center text-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10 text-center">
                    <span class="mr-1">2021©</span>
                    <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">SMA TECH</a>
                </div>
                {{--                <a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>--}}
                {{--                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>--}}
                {{--                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>--}}
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{url('')}}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{url('')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{url('')}}/assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{url('')}}/assets/js/pages/custom/login/login-general.js"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
