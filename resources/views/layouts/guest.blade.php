<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - Diagnoedge</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/d.png') }}" type="image/x-icon">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    
    <style>
        .auth-page {
            min-height: 100vh;
        }

        .auth-image {
            background: url('{{ asset ('assets/images/admin 2.jpg') }}') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
        }

        .auth-form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 30px;
            min-height: 100vh;
        }
        #DZScript{
            display: none !important;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="container-fluid p-0 auth-page">
        <div class="row g-0">
            <!-- Left Side Image -->
            <div class="col-md-8 auth-image d-none d-md-block"></div>

            <!-- Right Side Form -->
            <div class="col-md-4 bg-white auth-form-section">
                <div class="auth-form p-0 w-100" >
                    <div class="text-center mb-3">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/diagno-logo.png') }}" alt="">
                        </a>
                    </div>
                    <h4 class="text-center mb-4">{{ $title ?? 'Sign in your account' }}</h4>

                    <!-- Form Slot -->
                    {{ $slot }}

                    
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/styleSwitcher.js') }}"></script> --}}

</body>

</html>
