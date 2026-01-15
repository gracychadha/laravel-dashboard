@extends("website.layout.master-layout")
@section("title", "{{ $package->title }}")

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .nav-item.nav-link-active {
            background-color: #d4edda !important;
            color: #155724 !important;
            font-weight: bold;
            border-left: 4px solid #28a745;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: #f8f9fa;
            border-radius: 50%;
        }
    </style>
@endpush

@section("content")
    <main class="bg-light min-vh-100 py-5">
        <section class="breadcrumb-section" data-img-src="{{ asset('assets/images/breadcrumb/breadcrumb.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>{{ $package->title }}</h1>
                            </div>
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $package->title }}</li>
                                </ol>
                            </nav>
                        </div>
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

        <section class="pt-4">
            <div class="px-4">
                <div class="row g-5">

                    <!-- Left Sidebar -->
                    <div class="col-lg-3">
                        <div class="sticky-top" style="top: 100px;">
                            <div class="list-group rounded-4 overflow-hidden smooth-card mb-4">
                                <a href="#title" class="list-group-item list-group-item-action py-3 nav-item">Health
                                    Packages</a>
                                <a href="#detail" class="list-group-item list-group-item-action py-3 nav-item">Health
                                    Included</a>
                                <a href="#overview"
                                    class="list-group-item list-group-item-action py-3 nav-item">Overview</a>
                                <a href="#faq" class="list-group-item list-group-item-action py-3 nav-item">FAQs</a>
                            </div>

                            <div class="bg-white p-4 rounded-4 smooth-card">
                                <h6 class="fw-bold text-success mb-4">Why This Test?</h6>
                                <div class="d-flex gap-3 mb-3 align-items-center">
                                    <div class="info-icon d-flex align-items-center justify-content-center text-success">
                                        <i class="fas fa-vial fs-4"></i>
                                    </div>
                                    <div>
                                        <strong>Blood Sample</strong><br>
                                        <small class="text-muted">Only 2-3 ml needed</small>
                                    </div>
                                </div>
                                <div class="d-flex gap-3 mb-3 align-items-center">
                                    <div class="info-icon d-flex align-items-center justify-content-center text-primary">
                                        <i class="fas fa-clock fs-4"></i>
                                    </div>
                                    <div><strong>Report in 24 Hours</strong></div>
                                </div>
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="info-icon d-flex align-items-center justify-content-center text-success">
                                        <i class="fas fa-home fs-4"></i>
                                    </div>
                                    <div><strong>Free Home Collection</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-lg-6">

                        @php
                            // Decode test_ids → array of test IDs
                            $testIds = is_string($package->test_ids)
                                ? json_decode($package->test_ids, true)
                                : (is_array($package->test_ids) ? $package->test_ids : []);

                            $includedTests = \App\Models\Test::whereIn('id', $testIds)
                                ->select('id', 'title', 'icon')
                                ->inRandomOrder()
                                ->get();

                            // Decode parameter_id → array of parameter IDs
                            $parameterIds = is_string($package->parameter_id)
                                ? json_decode($package->parameter_id, true)
                                : (is_array($package->parameter_id) ? $package->parameter_id : []);

                            $parameters = \App\Models\Parameter::whereIn('id', $parameterIds)
                                ->select('id', 'title', 'slug')
                                ->get()
                                ->map(function ($param) {
                                    $param->slug = $param->slug ?? \Illuminate\Support\Str::slug($param->title);
                                    return $param;
                                });

                            $faqs = \App\Models\FaqsPackage::where('subparameter_id', $package->id)
                                ->with('subparameter')
                                ->get();
                        @endphp


                        <!-- Test Details -->
                        <section id="title" class="bg-white rounded-4 p-5 smooth-card mb-5 shadow">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="text-muted mb-0"></p>
                                <p class="text-muted mb-0">134+ booked in last 3 days</p>
                            </div>

                            <h3 class="text-center fw-bold mb-4">{{ $package->title }}</h3>

                            <!-- Swiper Slider - Included Tests -->
                            <div class="swiper mySwiper mt-4">
                                <div class="swiper-wrapper">
                                    @forelse($includedTests->take(6) as $test)
                                        <div class="swiper-slide">
                                            <div class="border rounded-3 p-3 d-flex align-items-center gap-2"
                                                style="border-color:#1c5a80 !important;">
                                                @if($test->icon)
                                                    <img src="{{ asset('storage/' . $test->icon) }}" width="50"
                                                        alt="{{ $test->title }}">
                                                    <span>{{ $test->title }}</span>
                                                @else
                                                    <div class="bg-light rounded-circle border d-flex align-items-center justify-content-center flex-shrink-0"
                                                        style="width:50px;height:50px;">
                                                        <i class="fas fa-vial text-muted"></i>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <div class="text-center text-muted p-4">No tests included</div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </section>

                        <!-- Overview -->
                        <section id="overview" class="bg-white rounded-4 p-5 smooth-card mb-5 shadow">
                            <h2 class="h4 fw-bold mb-4">Overview</h2>
                            <p class="lead text-muted">
                                {!! $package->overview ?? '<p>A comprehensive health package designed to give you complete insight into your health with advanced diagnostic tests.</p>' !!}
                            </p>
                        </section>

                        <!-- Included Parameters (Dynamic + Clickable) -->
                        <section id="detail" class="bg-white rounded-4 p-5 smooth-card mb-5 shadow">
                            <h5 class="mb-4"> Health Parameters</h5>

                            <div class="row gy-3">
                                @foreach($parameters as $parameter)
                                    <div class="col-md-6">
                                        <a href="{{ route('parameter-detail', $parameter->slug) }}"
                                            class=" rounded p-3 d-block text-decoration-none  bg-light">
                                            <img src="{{ asset('assets/images/icon-d.png') }}"> <strong
                                                class="ps-2">{{ $parameter->title }}</strong>

                                            @if($parameter->total_tests)
                                                <span class="text-muted ms-2">({{ $parameter->total_tests }} Parameters)</span>
                                            @endif
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <!-- FAQs -->
                        <section id="faq" class="bg-white rounded-4 p-5 smooth-card mb-5 shadow">
                            <h2 class="h4 fw-bold mb-3">Frequently Asked Questions</h2>

                            @if($faqs->count() > 0)
                                <div class="accordion" id="faqAccordion">
                                    @foreach($faqs as $index => $faq)
                                        <div class="accordion-item border rounded mb-3  ">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button {{ $loop->first ? '' : 'collapsed' }} bg-light text-dark"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="faq{{ $index }}"
                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }} text-dark "
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body bg-light " style="color: #000">
                                                    {!! $faq->answer !!}

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">No FAQs available for this package.</p>
                            @endif
                        </section>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-lg-3">
                        <div class="sticky-top" style="top: 100px;">
                            <div class="bg-white rounded-4 p-4 text-center border border-success shadow-sm mb-4"
                                style="border-width:2px;">
                                <h4 class="fw-semibold mb-3">{{ $package->title }}</h4>
                                <div class="d-flex justify-content-center align-items-center gap-2 mb-4">
                                    <i class="fas fa-rupee-sign text-success"></i>
                                    <span class="fs-3 fw-bold">{{ number_format((float) $package->price) }}</span>
                                </div>

                                <a href="#" class="theme-button style-1 w-100">
                                    <span data-text="Add to Cart">Add to Cart</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>

                            <div class="bg-white rounded-4 shadow-sm mb-4">
                                <div class="bg-warning text-center fw-semibold rounded-top-4 py-2">
                                    Book a Home Visit Now
                                </div>
                                <div class="p-4 text-center">
                                    <p class="mb-4">
                                        Book any blood test or health checkup<br>
                                        and get tested at the comfort of your home
                                    </p>
                                    <a href="tel:{{ str_replace(' ', '', $settings->phone1 ?? '+91 90909 90909') }}" class="theme-button style-1 w-100">
                                        <span data-text="Get  Instant Call Back">Get  Instant Call Back</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="smooth-card">
                                <img src="{{ asset('assets/images/blog/blog-4.jpg') }}" alt="Blog Image"
                                    class="img-fluid rounded-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            new Swiper(".mySwiper", {
                loop: true,
                autoplay: { delay: 3000 },
                slidesPerView: 1,
                spaceBetween: 15,
                breakpoints: {
                    576: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    992: { slidesPerView: 3 }
                }
            });

            document.addEventListener("DOMContentLoaded", function () {
                const navLinks = document.querySelectorAll('.nav-item');
                const sections = document.querySelectorAll('section[id]');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            navLinks.forEach(link => {
                                link.classList.remove('nav-link-active');
                                if (link.getAttribute('href') === `#${entry.target.id}`) {
                                    link.classList.add('nav-link-active');
                                }
                            });
                        }
                    });
                }, { threshold: 0.3, rootMargin: "-100px 0px -50% 0px" });

                sections.forEach(section => observer.observe(section));

                navLinks.forEach(link => {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        window.scrollTo({
                            top: target.offsetTop - 120,
                            behavior: 'smooth'
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection