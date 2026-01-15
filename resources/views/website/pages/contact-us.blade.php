@extends("website.layout.master-layout")
@section("title", " Contact Us | Diagnoedge")
@section("content")
    <!-- main start -->
    <main class="main">
        <!-- breadcrumb section start -->
        <section class="breadcrumb-section" data-img-src="assets/images/breadcrumb/breadcrumb.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb content start -->
                        <div class="breadcrumb-content">
                            <!-- breadcrumb title start -->
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>Contact Us</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- breadcrumb content end -->
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <img class="breadcrumb-shape-one" src="assets/images/shape/shape-4.png" alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="assets/images/shape/square-blue.png" alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="assets/images/shape/plus-orange.png" alt="breadcrumb shape three">
            </div>
        </section>
        <!-- breadcrumb section end -->

        <!-- contact section start -->
        <section class="contact-section pt-50 md-pt-30 md-pb-50">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <!-- section title start -->
                        <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Contact Me</span>
                            <h2>Stay connect with us today</h2>
                        </div>
                        <!-- section title end -->
                        <!-- contact item wrapper start -->
                        <div class="contact-item-wrapper">
                            @php
                                $settings = App\Models\Setting::first();
                                $socials = $settings->social_links;
                            @endphp
                            <!-- contact items start -->
                            <div class="contact-item wow fadeInUp" data-wow-delay=".5s">
                                <div class="contact-icon"><i class="fa-solid fa-phone-volume"></i></div>
                                <div class="contact-content">
                                    <p>Call Now</p>
                                    <h3><a href="{{ str_replace(' ', '', $settings->phone1 ?? '+91 90909 90909') }}"
                                            target="_blank">{{ $settings->phone1 ?? '+91 90909 90909' }}</a></h3>
                                </div>
                            </div>
                            <!-- contact items end -->
                            <!-- contact items start -->
                            <div class="contact-item wow fadeInUp" data-wow-delay=".4s">
                                <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div class="contact-content">
                                    <p>Email</p>
                                    <h3><a href="mailto:{{ $settings->email ?? 'info@diagnolabs.com' }}">{{ $settings->email
                                            ??
                                            'info@diagnolabs.com' }}</a></h3>
                                </div>
                            </div>
                            <!-- contact items end -->
                            <!-- contact items start -->
                            <div class="contact-item wow fadeInUp" data-wow-delay=".3s">
                                <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="contact-content">
                                    <p>Address</p>
                                    <h3>{{ $settings->location ?? 'SCO. 8, Kalgidhar Enclave, Baltana, Zirakpur(PB)' }}</h3>
                                </div>
                            </div>
                            <!-- contact items end -->
                        </div>
                        <!-- contact item wrapper end -->

                        <div class="contact-social-links wow fadeInUp" data-wow-delay=".6s">
                            <span class="follow-text">Follow Us Today :</span>
                            <ul class="social-icon">
                                @if(!empty($socials['facebook']))
                                    <li>
                                        <a href="{{ $socials['facebook'] }}" target="_blank">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($socials['instagram']))
                                    <li>
                                        <a href="{{ $socials['instagram'] }}" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($socials['linkedin']))
                                    <li>
                                        <a href="{{ $socials['linkedin'] }}" target="_blank">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($socials['twitter']))
                                    <li>
                                        <a href="{{ $socials['twitter'] }}" target="_blank">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <!-- contact form box start -->
                        <div class="contact-form-box shadow">
                            <div class="section-title">
                                <h2>Send us a message</h2>
                            </div>
                            <!-- default-form start -->
                            <div class="default-form contact-form">
                                @if(session('success'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: '{{ session("success") }}',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK',
                                        });
                                    </script>
                                @endif
                                <form action="{{url('/')}}/store" method="POST" id="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input id="name" class="form-control" name="fullname" type="text"
                                                        autocomplete="off" placeholder="Name Here" required="required"
                                                        value="{{ old('fullname') }}">
                                                    <label for="name"><i class="fa-solid fa-user"></i> Name*</label>
                                                    @error('fullname')
                                                        <div class="text-danger small">{{ $message }}</div>
                                                    @enderror
                                                    <span class="error" id="name-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input id="email" class="form-control" name="email" type="email"
                                                        autocomplete="off" placeholder="Email Here" required="required"
                                                        value="{{ old('email') }}">
                                                    <label for="email"><i class="fa-solid fa-envelope"></i> Email*</label>
                                                    @error('email')
                                                        <div class="text-danger small">{{ $message }}</div>
                                                    @enderror
                                                    <span class="error" id="email-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input id="tel" class="form-control" name="phone" type="text"
                                                        autocomplete="off" placeholder="Phone Number Here"
                                                        required="required" style="padding-left: 45px"
                                                        value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <div class="text-danger small">{{ $message }}</div>
                                                    @enderror
                                                    {{-- <label for="phone">Phone Number*</label> --}}
                                                    <span class="error" id="phone-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <input id="subject" class="form-control" name="subject" type="text"
                                                        autocomplete="off" placeholder="Subject Here" required="required"
                                                        value="{{ old('subject') }}">
                                                    <label for="subject"><i class="fa-solid fa-pen"></i> Subject*</label>
                                                    @error('subject')
                                                        <div class="text-danger small">{{ $message }}</div>
                                                    @enderror
                                                    <span class="error" id="subject-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-floating field-inner">
                                                    <textarea id="message" class="form-control" name="message"
                                                        autocomplete="off" placeholder="Type Message Here"
                                                        required="required">{{ old('message') }}</textarea>
                                                    @error('message')
                                                        <div class="text-danger small">{{ $message }}</div>
                                                    @enderror
                                                    <label for="message"><i class="fa-solid fa-message"></i>
                                                        Message*</label>
                                                    <span class="error" id="message-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                                                    data-callback="recaptchaCallback">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-btn-wapper mt-10">
                                                <button type="submit" class="theme-button style-1" data-text="Send Message"
                                                    id="captcha-btn" disabled>
                                                    <span data-text="Send Message">Send Message</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ajax-response"></div>
                                </form>
                            </div>
                            <!-- default-form end -->
                        </div>
                        <!-- contact form box end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section end -->

        <!-- Google Map start -->
        <div class="google-map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <!-- google map iframe start -->
                        <div class="google-map-iframe">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.4029934748426!2d76.82146917552163!3d30.642608274613707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feb8e4afcb9d1%3A0x44d2c0bd3ccf22a1!2sBaltana%2C%20Zirakpur%2C%20Punjab%20140303!5e0!3m2!1sen!2sin!4v1733825123456!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" title="Baltana Zirakpur Map">
                            </iframe>


                        </div>
                        <!-- google map iframe end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Map end -->
    </main>
    <!-- main end -->

@endsection
{{-- ADD SCRIPT THERE ONLY FO CONTACT BLADE --}}
@push('scripts')
    <script>
        window.recaptchaCallback = function () {
            const btn = document.getElementById('captcha-btn');
            if (btn) btn.disabled = false;
        };

        let iti;
        // INTEL FLAG SCRIPT FOR PHONE ID
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector("#tel");
            iti = window.intlTelInput(input, {
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

        document.getElementById("contactForm").addEventListener("submit", function (e) {
            document.querySelector("#tel").value = iti.getNumber();
        });

    </script>
@endpush