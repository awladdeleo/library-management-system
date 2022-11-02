<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title>@yield('title') | {{config('app.name')}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>

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
    @livewireStyles
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable">


<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="index.html">
        <img alt="Logo" src="{{asset('backend/media/logos/logo-light.png')}}"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                      fill="#000000" fill-rule="nonzero"/>
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
    @include('backend.layouts.sidebar')
    <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
        @include('backend.layouts.header')
        <!--end::Header-->
        @yield('content')
        <!--begin::Footer-->
        @include('backend.layouts.footer')
        <!--end::Footer-->
            <div class="modal fade" id="fileManagerModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Manager</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="fm"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                              fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
</div>
<!--end::Scrolltop-->


<script>
    var storage_base_link = "{{asset('')}}";
    var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
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
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script src="{{ asset('vendor/file-manager/js/custom-file-manager.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        toastr.options = {
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "progressBar": true,
        };

        //delete data
        $(document).on('click', '.deleteId', function (e) {
            e.preventDefault();
            var delete_id = $(this).attr('delete_id');
            var delete_url = $(this).attr('delete_url');
            $('#deleteForm').attr('action', delete_url + '/' + delete_id);
            $("#deleteModal").modal('show');
        });


        //validate form
        $(document).on('submit', '.form-validate', function (e) {
            var error = "";

            //to validate text field
            $(".field-validate").each(function () {
                if ($(this).hasClass('select2-hidden-accessible')) {
                    var obj = $(this).next('.select2-container--default').find('.select2-selection--single');
                    if (this.value == '') {
                        obj.addClass('is-invalid');
                        error = "is-invalid";
                    } else {
                        obj.removeClass('is-invalid');
                    }
                }
                else if ($(this).hasClass('product-category-div')) {
                    var flag = false;
                    $(".product_category").each(function () {
                        if ($(this).is(':checked')) {
                            flag = true;
                            return false;
                        }
                    });

                    if (flag === true) $(this).removeClass('invalid-category');
                    else $(this).addClass('invalid-category');
                }
                else if ($(this).hasClass('summernote')) {
                    if (this.value == '') {
                        KTApp.unblockPage();
                        $(this).next('div').addClass('is-invalid');
                        error = "is-invalid";
                    } else {
                        $(this).next('div').removeClass('is-invalid');
                    }
                }
                else if ($(this).hasClass('image-field')) {
                    if (this.value == '') {
                        KTApp.unblockPage();
                        $(this).parents('.image-input').addClass('is-invalid');
                        error = "is-invalid";
                    } else {
                        $(this).parents('.image-input').removeClass('is-invalid');
                    }
                }
                else {
                    if (this.value == '') {
                        KTApp.unblockPage();
                        $(this).addClass('is-invalid');
                        error = "is-invalid";
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                }

            });

            if (error === "is-invalid") {
                return false;
            }

        });


        $(".select2").on("change", (function (e) {
            $(this).valid();
        }));

        $('.numeric_value').keypress(function (event) {
            if ((event.which !== 46 || $(this).val().indexOf('.') !== -1)
                && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        //focus form field
        $('.form-validate').on('keyup change', '.field-validate', function (e) {
            if (this.value == '') {
                $(this).addClass('is-invalid');
                $(this).parents('.image-input').addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
                $(this).parents('.image-input').removeClass('is-invalid');
            }
        });

        //focus summernote
        $(".summernote").on("summernote.change", function (e) {   // callback as jquery custom event
            if ($($(this).summernote('code')).text() === '') {
                $(this).next('div').addClass('is-invalid');
            } else {
                $(this).next('div').removeClass('is-invalid');
            }
        });

        //page blocking

        $("form").submit(function (e) {
            if ($(this).hasClass('has_loader'))
                loading();
        });

        $('.loading').click(function () {
            loading();
        });

        function loading() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'danger',
                message: 'Please wait...'
            });
        }

        $('.file-manager').click(function () {
            const bodyDom = $('#kt_body');
            bodyDom.addClass('overflow-hidden');
            bodyDom.removeClass('overflow-auto');
            bodyDom.removeClass('modal-open');
        });

        $('#fileManagerModal').on('hidden.bs.modal', function () {
            const bodyDom = $('#kt_body');
            bodyDom.addClass('overflow-auto');
            bodyDom.removeClass('overflow-hidden');
        })

    });
</script>

@livewireScripts

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@stack('script')

{!! Toastr::message() !!}

</body>

</html>