@extends("website.layout.master-layout")
@section("title", " Career Form | Diagnoedge")

@section("content")
    {{-- main section --}}
    <main class="main">
        <!-- breadcrumb section start -->
        <section class="breadcrumb-section" data-img-src="{{ asset('assets/images/breadcrumb/breadcrumb.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb content start -->
                        <div class="breadcrumb-content">
                            <!-- breadcrumb title start -->
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>Career</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Career</li>
                                </ol>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- breadcrumb content end -->
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <img class="breadcrumb-shape-one" src="{{ asset('assets/images/shape/shape-4.png') }}"
                    alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="{{ asset('assets/images/shape/square-blue.png') }}"
                    alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="{{ asset('assets/images/shape/plus-orange.png') }}"
                    alt="breadcrumb shape three">
            </div>
        </section>
        <!-- contact section start -->
        <section class="contact-section pt-50 md-pt-30 md-pb-50">
            <div class="container">
                <div class="row justify-content-center pb-4">

                    <div class="col-lg-12 ">
                        <!-- contact form box start -->
                        <div class="contact-form-box shadow">

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
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold">Apply for {{ $job->title }}</h2>
                                    <p class="text-muted m-0">Fill the form below to apply</p>
                                </div>



                                <form action="{{ route('career-form.store') }}" method="POST" enctype="multipart/form-data"
                                    id="JobForm">

                                    @csrf

                                    <input type="hidden" name="job_slug" value="{{ $job->slug }}">
                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <input type="hidden" name="job_title" value="{{ $job->title }}">

                                    <div class="row g-4 bg-light pb-4">

                                        {{-- ---------------- LEFT SIDE (Job Details) ---------------- --}}
                                        <div class="col-lg-6  pe-4 rounded">
                                            {{-- <h5 class="fw-bold mb-3">Job Details</h5> --}}

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Job Title</label>
                                                <input class="form-control" value="{{ $job->title }}" readonly>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Full Name *</label>
                                                <input class="form-control" name="fullname" type="text" required
                                                    placeholder="Enter your full name" value="{{ old('fullname') }}">
                                                @error('fullname') <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Phone *</label>
                                                <input class="form-control" name="phone" type="text" required id="phone"
                                                    placeholder="Enter your phone number" value="{{ old('phone') }}">
                                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Job Location</label>
                                                <input class="form-control" value="{{ $job->location }}" readonly>
                                            </div>



                                            {{-- <div class="mb-3">
                                                <label class="form-label fw-semibold">Qualification</label>
                                                <input class="form-control" value="{{ $job->qualification }}" readonly>
                                            </div> --}}

                                            @if($job->salary_range)
                                                <div class="">
                                                    <label class="form-label fw-semibold">Salary Range</label>
                                                    <input class="form-control" value="{{ $job->salary_range }}" readonly>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- ---------------- RIGHT SIDE (Your Details) ---------------- --}}
                                        <div class="col-lg-6 ps-4 rounded">
                                            {{-- <h5 class="fw-bold mb-3">Your Details</h5> --}}
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Job Type</label>
                                                <input class="form-control" value="{{ $job->type }}" readonly>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Email *</label>
                                                <input class="form-control" name="email" type="email" required
                                                    placeholder="Enter your email" value="{{ old('email') }}">
                                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>



                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Address *</label>
                                                <input class="form-control" name="address" type="text" required
                                                    placeholder="Enter your address" value="{{ old('address') }}">
                                                @error('address') <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Experience</label>
                                                <input class="form-control" value="{{ $job->experience }}" readonly>
                                            </div>
                                            <div class="">
                                                <label class="form-label fw-semibold">Upload Resume (PDF, DOC, DOCX)</label>
                                                <input class="form-control" type="file" name="resume"
                                                    accept=".pdf,.doc,.docx">
                                                @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>




                                        </div>
                                        <div class="col-12">
                                           
                                                <label class="form-label fw-semibold">Additional Details</label>
                                                <textarea class="form-control" name="details" rows="6"
                                                    placeholder="Write something..." style="height:200px;">{{ old('details') }}</textarea>
                                                @error('details') <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label">
                                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                                                    data-callback="recaptchaCallback">
                                                </div>
                                            </div>

                                        </div>

                                        {{-- SUBMIT BUTTON CENTERED --}}
                                        <div class="col-lg-12">
                                            <div class="contact-btn-wapper mt-0">
                                                <button type="submit" class="theme-button style-1" data-text="Submit"
                                                    id="captcha-btn" disabled>
                                                    <span data-text="Submit">Submit</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
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

    </main>
@endsection
@push('scripts')
    <script>

        window.recaptchaCallback = function () {
            const btn = document.getElementById('captcha-btn');
            if (btn) btn.disabled = false;
        };
        // INTEL FLAG SCRIPT FOR PHONE ID
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector("#phone");
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

        document.getElementById("JobForm").addEventListener("submit", function (e) {
            document.querySelector("#phone").value = iti.getNumber();
        });
    </script>
@endpush