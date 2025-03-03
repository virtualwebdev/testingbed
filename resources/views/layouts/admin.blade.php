<!DOCTYPE html>

@php
// $logo = asset(Storage::url('uploads/logo/'));
$logo=\App\Models\Utility::get_file('uploads/logo/');

$company_favicon = Utility::getValByName('company_favicon');
$dark_mode = Utility::getValByName('dark_mode');
$setting = App\Models\Utility::colorset();
$SITE_RTL=env('SITE_RTL');
$mode_setting = App\Models\Utility::mode_layout();
$color = 'theme-3';
if (!empty($mode_setting['theme_color'])) {
    $color = $mode_setting['theme_color'];
}
@endphp
<html lang="en">
<html dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">

<head>

    <title>
        {{ Utility::getValByName('title_text') ? Utility::getValByName('title_text') : config('app.name', 'HRMGo') }}
        - @yield('page-title')</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />


    <!-- Favicon icon -->
    <link rel="icon"
        href="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}"
        type="image/x-icon" />
    <!-- for calender-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/datepicker-bs5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}">
    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-switch-button.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <!-- vendor css -->
     <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<!-- 
    @if (env('SITE_RTL') == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @else
        @if (isset($mode_setting['dark_mode']) && $mode_setting['dark_mode'] == 'on')
            <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
        @endif
    @endif -->
    @if (env('SITE_RTL') == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
     @if (isset($mode_setting['dark_mode']) && $mode_setting['dark_mode'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endif



   

    <meta name="url" content="{{ url('') . '/' . config('chatify.routes.prefix') }}"
        data-user="{{ Auth::user()->id }}">

    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />
    @stack('css-page')
</head>



<body class="{{ $color }}">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('partial.Admin.menu')
    @include('partial.Admin.header')

    <!-- Modal -->
    <div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h6 class="mt-2">
                        <i data-feather="monitor" class="me-2"></i>Desktop settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting1" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting1">Allow desktop
                            notification</label>
                    </div>
                    <p class="text-muted ms-5">
                        you get lettest content at a time when data will updated
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting2" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting2">Store Cookie</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="save" class="me-2"></i>Application settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting3" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting3">Backup Storage</label>
                    </div>
                    <p class="text-muted mb-4 ms-5">
                        Automaticaly take backup as par schedule
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting4" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting4">Allow guest to print file</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="cpu" class="me-2"></i>System settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting5" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting5">View other user chat</label>
                    </div>
                    <p class="text-muted ms-5">Allow to show public user message</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-light-primary btn-sm">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-header-title">
                                <h4 class="m-b-10">
                                    @yield('page-title')
                                </h4>
                            </div>
                            <ul class="breadcrumb">
                                @yield('breadcrumb')
                            </ul>
                        </div>
                        <div class="col-sm-auto col-md">
                            <div class="float-end" @if(env('SITE_RTL') == 'on')style=" float: left !important;"@endif>
                                @yield('action-button')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="dash-footer">
        <div class="footer-wrapper">
            <div class="py-1">
                <span class="text-muted">{{ __('Copyright') }} &copy;
                    {{ App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGO') }}
                    {{ date('Y') }}</span>
            </div>
        </div>
    </footer>
    
   
    <!--[if lt IE 11]>
  
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>

    <script src="{{ asset('js/letter.avatar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-switch-button.min.js') }}"></script>
    <script src="{{ asset('assets/js/dash.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
    var toster_pos="{{$SITE_RTL =='on' ?'left' : 'right'}}";
   </script>
    <script src="{{ asset('js/chatify/autosize.js') }}"></script>
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>


    <script>
        const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
    </script>
    {{-- <div class="pct-customizer">
        <div class="pct-c-btn">
            <button class="btn btn-primary" id="pct-toggler">
                <i data-feather="settings"></i>
            </button>
        </div>
        <div class="pct-c-content">
            <div class="pct-header bg-primary">
                <h5 class="mb-0 text-white f-w-500">Theme Customizer</h5>
            </div>
            <div class="pct-body">
                <h6 class="mt-2">
                    <i data-feather="credit-card" class="me-2"></i>Primary color settings
                </h6>
                <hr class="my-2" />
                <div class="theme-color themes-color">
                    <a href="#!" class="" data-value="theme-1"></a>
                    <a href="#!" class="" data-value="theme-2"></a>
                    <a href="#!" class="" data-value="theme-3"></a>
                    <a href="#!" class="" data-value="theme-4"></a>
                </div>
                <h6 class="mt-4 rtl-hide">
                    <i data-feather="layout" class="me-2"></i>Sidebar settings
                </h6>
                <hr class="my-2 rtl-hide" />
                <div class="form-check form-switch rtl-hide">
                    <input type="checkbox" class="form-check-input" id="cust-theme-bg" checked />
                    <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg">Transparent layout</label>
                </div>
                <h6 class="mt-4 rtl-hide">
                    <i data-feather="sun" class="me-2"></i>Layout settings
                </h6>
                <hr class="my-2 rtl-hide" />
                <div class="form-check form-switch mt-2 rtl-hide">
                    <input type="checkbox" class="form-check-input" id="cust-darklayout" />
                    <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">Dark Layout</label>
                </div>
                <h6 class="mt-4">
                    <i data-feather="layout" class="me-2"></i>Right To Left
                </h6>
                <hr class="my-2" />
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="cust-rtllayout" />
                    <label class="form-check-label f-w-600 pl-1" for="cust-rtllayout">RTL layout</label>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        feather.replace();
        var pctoggle = document.querySelector("#pct-toggler");
        if (pctoggle) {
            pctoggle.addEventListener("click", function() {
                if (
                    !document.querySelector(".pct-customizer").classList.contains("active")
                ) {
                    document.querySelector(".pct-customizer").classList.add("active");
                } else {
                    document.querySelector(".pct-customizer").classList.remove("active");
                }
            });
        }

        var themescolors = document.querySelectorAll(".themes-color > a");
        for (var h = 0; h < themescolors.length; h++) {
            var c = themescolors[h];

            c.addEventListener("click", function(event) {
                var targetElement = event.target;
                if (targetElement.tagName == "SPAN") {
                    targetElement = targetElement.parentNode;
                }
                var temp = targetElement.getAttribute("data-value");
                removeClassByPrefix(document.querySelector("body"), "theme-");
                document.querySelector("body").classList.add(temp);
            });
        }

        var custthemebg = document.querySelector("#cust-theme-bg");
        custthemebg.addEventListener("click", function() {
            if (custthemebg.checked) {
                document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.add("transprent-bg");
            } else {
                document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.remove("transprent-bg");
            }
        });

        var custthemebg = document.querySelector("#cust-rtllayout");
        custthemebg.addEventListener("click", function() {
            if (custthemebg.checked) {
                document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
                document.getElementsByTagName("html")[0].setAttribute("lang", "ar");
                document.querySelector("#main-style-link").setAttribute("href",
                    "{{ asset('assets/css/style-rtl.css') }}");
            } else {
                document.getElementsByTagName("html")[0].removeAttribute("dir");
                document.getElementsByTagName("html")[0].removeAttribute("lang");
                document.querySelector("#main-style-link").setAttribute("href",
                    "{{ asset('assets/css/style.css') }}");
            }
        });

        var custdarklayout = document.querySelector("#cust-darklayout");
        custdarklayout.addEventListener("click", function() {
            if (custdarklayout.checked) {
                document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute("src",
                    "{{ asset('assets/images/logo_light.png') }}");
                document.querySelector("#main-style-link").setAttribute("href",
                    "{{ asset('assets/css/style-dark.css') }}");
            } else {
                document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute("src",
                    "{{ asset('assets/images/logo_dark.png') }}");
                document.querySelector("#main-style-link").setAttribute("href",
                    "{{ asset('assets/css/style.css') }}");
            }
        });

        function removeClassByPrefix(node, prefix) {
            for (let i = 0; i < node.classList.length; i++) {
                let value = node.classList[i];
                if (value.startsWith(prefix)) {
                    node.classList.remove(value);
                }
            }
        }

        $(document).on('click', '.fc-daygrid-event', function(e) {
            // if (!$(this).hasClass('project')) {
            e.preventDefault();
            var event = $(this);
            var title = $(this).find('.fc-event-title').html();
            console.log(title);
            var size = 'md';
            var url = $(this).attr('href');
            $("#commonModal .modal-title ").html(title);
            $("#commonModal .modal-dialog").addClass('modal-' + size);
            $.ajax({
                url: url,
                success: function(data) {
                    $('#commonModal .body').html(data);
                    $("#commonModal").modal('show');
                    if ($(".d_week").length > 0) {
                        $($(".d_week")).each(function(index, element) {
                            var id = $(element).attr('id');

                            (function() {
                                const d_week = new Datepicker(document.querySelector('#' +
                                    id), {
                                    buttonClass: 'btn',
                                    format: 'yyyy-mm-dd',
                                });
                            })();

                        });
                    }

                },
                error: function(data) {
                    data = data.responseJSON;
                    toastrs('Error', data.error, 'error')
                }
            });
            // }
        });
    </script> --}}

    <script>
        $(document).on('click', '.fc-daygrid-event', function(e) {
            // if (!$(this).hasClass('project')) {
            e.preventDefault();
            var event = $(this);
            var title = $(this).find('.fc-event-title').html();
            console.log(title);
            var size = 'md';
            var url = $(this).attr('href');
            $("#commonModal .modal-title ").html(title);
            $("#commonModal .modal-dialog").addClass('modal-' + size);
            $.ajax({
                url: url,
                success: function(data) {
                    $('#commonModal .body').html(data);
                    $("#commonModal").modal('show');
                    if ($(".d_week").length > 0) {
                        $($(".d_week")).each(function(index, element) {
                            var id = $(element).attr('id');

                            (function() {
                                const d_week = new Datepicker(document.querySelector('#' +
                                    id), {
                                    buttonClass: 'btn',
                                    format: 'yyyy-mm-dd',
                                });
                            })();

                        });
                    }

                },
                error: function(data) {
                    data = data.responseJSON;
                    toastrs('Error', data.error, 'error')
                }
            });
            // }
        });
    </script>

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

    @if (\Auth::user()->type != 'super admin')
        <script>
            $(document).ready(function() {
                pushNotification('{{ Auth::id() }}');
            });

            function pushNotification(id) {

                // ajax setup form csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = false;

                var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                    forceTLS: true
                });

                // Pusher Notification
                var channel = pusher.subscribe('send_notification');
                channel.bind('notification', function(data) {
                    if (id == data.user_id) {
                        $(".notification-toggle").addClass('beep');
                        $(".notification-dropdown #notification-list").prepend(data.html);
                    }
                });

                // Pusher Message
                var msgChannel = pusher.subscribe('my-channel');
                msgChannel.bind('my-chat', function(data) {
                    console.log(data);
                    if (id == data.to) {
                        getChat();
                    }
                });
            }

            // Get chat for top ox
            function getChat() {
                $.ajax({
                    url: '{{ route('message.data') }}',
                    type: "get",
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        if (data.length != 0) {
                            $(".message-toggle-msg").addClass('beep');
                            $(".dropdown-list-message-msg").html(data);
                        }
                    }
                })
            }

            getChat();

            $(document).on("click", ".mark_all_as_read_message", function() {
                $.ajax({
                    url: '{{ route('message.seen') }}',
                    type: "get",
                    cache: false,
                    success: function(data) {
                        $('.dropdown-list-message-msg').html('');
                        $(".message-toggle-msg").removeClass('beep');
                    }
                })
            });
        </script>
    @endif

    @if (Utility::getValByName('gdpr_cookie') == 'on')
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "{{ Utility::getValByName('cookie_text') }}"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="{{ asset('js/cookie.notice.js') }}"></script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            
            show_toastr('Success', '{!! $message !!}', 'success');
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            show_toastr('Error', '{!! $message !!}', 'error');
        </script>
    @endif

    @stack('script-page')
    @stack('scripts')
    @include('Chatify::layouts.footerLinks')
</body>

</html>
