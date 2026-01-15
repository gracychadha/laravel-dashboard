<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $seo = getSeo(request()->path());
        // setting
        $settings = App\Models\Setting::first();
        $socials = $settings->social_links;
    @endphp


    {{-- <title>@yield('title')</title> --}}

    <title>{{ $seo->title ?? 'Welcome to Diagnoedge'}}</title>
    <meta name="keywords" content="{{ $seo->keywords ?? 'Diagnoedge'}}">
    <meta name="description" content="{{ $seo->description ?? 'Diagnoedge'}}">



    {{-- css files --}}
    <link rel="shortcut icon"
        href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/logo/d.png') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/logo/d.png') }}"
        type="image/x-icon">
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- image comparision css -->
    <link rel="stylesheet" href="{{ asset('assets/css/twentytwenty.css') }}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- main css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Load required libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include the reCAPTCHA script (site key in env) -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .iti {
            width: 100%;
        }

        /* Mobile Fix */
        @media (max-width: 768px) {
            .talk-to-us-btn {
                bottom: 90px !important;
                /* Move above footer */
                right: 15px !important;
                /* Adjust position */
                transform: scale(0.9);
                /* Optional: Slightly smaller button */
            }
        }

        input:read-only {
            background: #dde7dd;
        }

        input[readonly]:hover {
            background: #dde7dd;
        }
    </style>
    @stack('styles')
</head>

<body>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>

    {{-- header start --}}
    @include("website.components.header")
    {{-- header end --}}

    {{-- main content --}}
    @yield("content")
    {{-- main content end --}}
    {{-- footer popup --}}
    @include("website.components.popup-footer")
    {{-- footer start --}}
    @include("website.components.footer")
    {{-- footer end --}}

</body>





<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery meanmenu js -->
<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<!-- swiper js -->
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<!-- wow Js -->
<script src="{{ asset('assets/js/validate.min.js') }}"></script>
<!-- validate js -->
<script src="{{ asset('assets/js/validate.min.js') }}"></script>
<!-- ajax form Js -->
<script src="{{ asset('assets/js/ajax-form.js') }}"></script>
<!-- image comparision js -->
<script src="{{ asset('assets/js/jquery.event.move.js') }}"></script>
<script src="{{ asset('assets/js/jquery.twentytwenty.js') }}"></script>
<!-- appear Js -->
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
<!-- magnific Js -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- SmoothScroll Js -->
<script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
<!-- main Js -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- jQuery (already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

{{-- for the push script of the pages --}}
@stack('scripts')
<script>
    window.footerCaptcha = function () {
        const btn = document.getElementById('bookingSubmit1');
        if (btn) btn.disabled = false;
    };

    // INTEL FLAG SCRIPT FOR PHONE ID
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector("#mobile1");
        iti1 = window.intlTelInput(input, {
            initialCountry: "auto",
            nationalMode: false,
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            geoIpLookup: function (callback) {
                fetch('https://ipapi.co/json')
                    .then(response => response.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback('us'));
            }
        });

        // Apply z-index to flag container
        const flagContainer = input.parentElement.querySelector('.iti__flag-container');
        if (flagContainer) {
            flagContainer.style.zIndex = '9999';
        }

        // Apply z-index to the dropdown country list
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                const countryList = document.querySelector('.iti__country-list');
                if (countryList) {
                    countryList.style.zIndex = '9999';
                }
            });
        });

        // Observe changes in the DOM so that dropdown gets z-index when created
        observer.observe(document.body, { childList: true, subtree: true });
    });

    document.getElementById("bookingForm1").addEventListener("submit", function (e) {
        document.querySelector("#mobile1").value = iti1.getNumber();
    });


   



    // Start of Tawk.to Script
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/691db177832c61195c8c7908/1jadvqflg';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();





</script>

</html>