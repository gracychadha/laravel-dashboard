@extends("website.layout.master-layout")
@section("title", "Health Packages | Diagnoedge")
@section("content")
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
                                <h1>Health Packages</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Health Packages</li>
                                </ol>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- breadcrumb content end -->
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <img class="breadcrumb-shape-one" src="{{ asset('assets/images/shape/shape-4.png') }}" alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="{{ asset('assets/images/shape/square-blue.png') }}" alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="{{ asset('assets/images/shape/plus-orange.png') }}" alt="breadcrumb shape three">
            </div>
        </section>
        <!-- breadcrumb section end -->
        <!-- about section start -->
        <section class="about-section-4 pt-70 md-pt-80 pb-70 md-pb-80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <!-- section title start -->
                        <div class="section-title mb-20 wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Overview</span>
                            <h2>Overview of the health packages</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <!-- about content start -->
                        <div class="about-content wow fadeInUp" data-wow-delay=".3s">
                            <!-- about content text start -->
                            <div class="about-content-text">

                                <p align="justify">
                                    At DiagnoEdge Lab, we combine cutting-edge diagnostic technology with expert medical
                                    insights to deliver accurate, reliable, and timely results. Our mission is to empower
                                    better health decisions through precision testing, personalized care, and a commitment
                                    to excellence in laboratory diagnostics.


                                </p>
                                <p align="justify">
                                    We understand that every test tells a story — that’s why we ensure each report is
                                    handled with utmost care, accuracy, and confidentiality. Whether it’s routine blood work
                                    or advanced molecular testing, our team of qualified pathologists and lab professionals
                                    work diligently to provide results you can trust.
                                </p>
                            </div>
                            <!-- about content text end -->
                            <!-- about features wappper start -->
                            <div class="about-features-wappper">
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="assets/images/about/icon-about-1.png" alt="icon about one">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Accuracy Firs</h3>
                                        <p>We use the latest diagnostic equipment and standardized testing protocols to
                                            ensure precise results every time.</p>
                                    </div>
                                </div>
                                <div class="about-features-item">
                                    <div class="about-features-icon">
                                        <figure>
                                            <img src="assets/images/about/icon-about-2.png" alt="icon about two">
                                        </figure>
                                    </div>
                                    <div class="about-features-title">
                                        <h3>Patient-Centric Approach</h3>
                                        <p>Your health is our priority — we focus on delivering quick turnaround times and
                                            seamless sample collection services.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- about features wappper end -->
                        </div>
                        <!-- about content end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->
        {{-- product test section start --}}
        <section class="test-card-section pt-70 md-pt-80 pb-70 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Health Packages</span>
                            <h2>Health test packages according to body test</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="lab-test-card shadow-sm border-0 rounded-4 overflow-hidden bg-white">
                            <div class="position-relative">
                                <img src="assets/images/product/test.jpg" class="img-fluid w-100"
                                    alt="Truehealth Vital Test">
                                <span
                                    class="position-absolute top-0 end-0 m-2 bg-success text-white rounded-circle px-2 py-1 small fw-bold">
                                    0
                                </span>
                            </div>
                            <div class="p-3">
                                <a href="{{ route('package-details') }}">
                                    <h6 class="title-card mb-1">
                                    Truehealth Vital with Body Vitals Check & More
                                </h6>
                                </a>
                                <p class="text-muted small mb-2">
                                    <span class="badge bg-light text-dark border">9 Profile | 81
                                        Parameters</span>
                                </p>
                                <hr class="my-2">
                                <p class="fw-semibold fs-6 mb-3">Rs.3500</p>
                                <button class="btn btn-success w-100 fw-semibold rounded-3">
                                    Add to cart <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        {{-- product test section end --}}
    </main>
@endsection