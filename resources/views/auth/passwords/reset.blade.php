<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title>@yield('title') | {{config('app.name')}}</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle62fd.css')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('backend/plugins/global/plugins.bundle62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/custom/prismjs/prismjs.bundle62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/style.bundle62fd.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('backend/css/themes/layout/header/base/light62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/themes/layout/header/menu/light62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/themes/layout/brand/dark62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/themes/layout/aside/dark62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/custom/uppy/uppy.bundle62fd.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/css/pages/login/login-262fd.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <!--end::Layout Themes-->
    <script>(function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 1070954, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');</script>

    @stack('style')

</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable">

<div class="d-flex flex-column flex-root">

    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">

        <div class="content d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
            <!--begin::Title-->
            <div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                <h3 class="display4 font-weight-bolder my-7 text-dark"
                    style="color: #986923;">{{ config('app.name') }}</h3>
                <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">{{ storeConfig('tag_line') }}</p>
            </div>
            <!--end::Title-->
            <!--begin::Image-->
            <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                 style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/illustrations/login-visual-2.svg);"></div>
            <!--end::Image-->
        </div>

        <div class="login-aside d-flex flex-row-auto position-relative overflow-hidden">
            <!--begin: Aside Container-->
            <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                <!--begin::Logo-->
                <a href="#" class="text-center pt-2">
                    <img src="{{ asset(companyLogo()) }}" class="max-h-75px" alt=""/>
                </a>
                <!--end::Logo-->
                <!--begin::Aside body-->
                <div class="d-flex flex-column-fluid flex-column flex-center">
                    <!--begin::Signup-->
                    <div class="login-form login-signup pt-11 d-block">
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ route('password.update') }}" id="reset-form">
                            <!--begin::Title-->
                            <div class="text-center pb-8">
                                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('Reset Password') }}</h2>
                            </div>
                            <!--end::Title-->

                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                       type="email" value="{{ $email ?? old('email') }}" placeholder="Email"
                                       name="email" autocomplete="off"/>

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                       type="password" placeholder="Password" name="password" autocomplete="off"/>

                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                       type="password" placeholder="Confirm password" name="password_confirmation"
                                       autocomplete="off"/>

                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
                                @endif
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                <button type="submit" id="kt_login_signup_submit"
                                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                                    Submit
                                </button>
                                <a href="{{ route('login') }}"
                                        class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                                    Cancel
                                </a>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signup-->
                </div>
                <!--end::Aside body-->

            </div>
            <!--end: Aside Container-->
        </div>

    </div>

</div>

<script>
    var storage_base_link = "{{asset('')}}";
    var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>

<script src="{{asset('backend/plugins/global/plugins.bundle62fd.js')}}"></script>
<script src="{{asset('backend/plugins/custom/prismjs/prismjs.bundle62fd.js')}}"></script>
<script src="{{asset('backend/js/scripts.bundle62fd.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle62fd.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('backend/js/pages/widgets62fd.js')}}"></script>
<!--end::Page Scripts-->
<script src="{{ asset('backend/js/toastr.js') }}"></script>


<script src="{{ asset('backend/js/pages/crud/forms/widgets/bootstrap-datepicker62fd.js') }}"></script>
<script src="{{ asset('backend/js/pages/crud/forms/widgets/bootstrap-switch62fd.js') }}"></script>


<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\Auth\ResetPasswordRequest', '#reset-form'); !!}

</body>

</html>