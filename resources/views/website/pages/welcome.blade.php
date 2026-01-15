@extends("website.layout.master-layout")

@section("title", "Welcome To Diagnoedge Labs")

@section("content")
    <main class="main">
        {{-- resources/views/components/booking-modal.blade.php --}}
        @props([])


        @php
            $popImage = \App\Models\SiteSetting::where('popup_enabled', 1)->first();

        @endphp

        <!-- Modal HTML -->
        <div id="bookingModal" class="modal" aria-hidden="true">
            <div class="modal-dialog  modal-lg">


                <div class="modal-content modal-content-custom" role="dialog" aria-modal="true"
                    aria-labelledby="bookingTitle">
                    <div class="modal-left"
                        style="background-image: url('{{ $popImage && $popImage->popup_image ? asset('storage/' . $popImage->popup_image) : asset('images/popup.jpg') }}');">
                    </div>

                    <div class="modal-right">
                        <div class="modal-header d-flex justify-content-between align-items-center" style="padding:8px 0;">
                            <h5 id="bookingTitle" style="margin: 0; color: #333; font-weight: 700;">Looking to Book a Test?
                            </h5>
                            <span class="close" id="bookingClose">&times;</span>
                        </div>

                        <div class="modal-body p-0">
                            <p style="color: #666; margin-bottom: 10px; font-size: 14px;">
                                Please share your details — our health advisor will call you or you can call us at
                                <span class="popup-call-btn"><a href="tel:+919876784545" target="_blank">+91 987 678
                                        4545</a></span>
                            </p>

                            <div id="alertBox"></div>

                            <form id="bookingForm" method="POST" action="{{ route('book.test') }}">
                                @csrf

                                <div class="form-group position-relative ">
                                    <span class="popupicon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" style="padding-left: 45px;" type="text" id="name"
                                        name="name" placeholder="Enter Name" required>
                                </div>

                                <div class="form-group position-relative ">

                                    <input class="form-control " style="padding-left : 55px !important;" type="tel"
                                        id="mobile" name="mobile" placeholder="Enter Mobile No." required>
                                </div>


                                <input type="hidden" name="source" value="modal_homepage">

                                <div class="form-group ">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                                        data-callback="popupCaptcha"></div>
                                </div>
                                <button type="submit" id="bookingSubmit" class="theme-button style-1 w-100" disabled>
                                    <span data-text="Submit">Submit</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- hero section end -->
        <section class="banner-booknoow space-between sidespace">
            <div class="container-fluid">
                <div class="row gy-4 align-items-stretch">

                    <!-- LEFT: CAROUSEL -->
                    <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                        <div id="carouselExampleFade"
                            class="carousel slide carousel-fade rounded-4 overflow-hidden shadow-lg" data-bs-ride="carousel"
                            data-bs-interval="5000">

                            <!-- Controls -->
                            <div class="position-absolute top-0 end-0 d-flex gap-2 m-3" style="z-index: 10;">
                                <button class=" slider-prev btn btn-outline-light btn-lg"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="prev"><i
                                        class="fa fa-chevron-left"></i></button>
                                <button class="slider-prev btn btn-outline-light btn-lg"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="next"><i
                                        class="fa fa-chevron-right"></i></button>
                            </div>

                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0"
                                    class="active"></button>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2"></button>
                            </div>

                            @php
                                $sliders = App\Models\SliderImage::where('status', 'active')->get();
                            @endphp
                            <!-- Slides -->
                            {{-- <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/lab/banner-1.png" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/lab/banner-2.png" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/lab/banner-3.png" class="d-block w-100" alt="">
                                </div>
                            </div> --}}
                            <div class="carousel-inner">
                                @forelse($sliders as $key => $slide)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100"
                                            alt="Slider Image">
                                    </div>
                                @empty
                                    {{-- fallback default slides --}}
                                    <div class="carousel-item active">
                                        <img src="assets/images/lab/banner-1.png" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/lab/banner-2.png" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/lab/banner-3.png" class="d-block w-100" alt="">
                                    </div>
                                @endforelse
                            </div>


                        </div>
                    </div>

                    <!-- RIGHT: CARD -->
                    <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="card p-2 shadow-lg border-0 rounded-4 h-100 align-items-center justify-content-center">
                            <h3 class="text-center mb-3 fw-bold text-success">Book a Test Online</h3>

                            <div class="mb-2">
                                <p class=" mb-2">If you Already Know What Test to Take</p>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 d-flex align-items-center">
                                        <img src="assets/images/logo/test.svg" alt="icon" width="35" height="25">
                                        <span class="vr ms-2"></span>
                                    </span>
                                    <input type="text" id="already_know" class=" form-control border-start-0"
                                        placeholder="Search and book" autocomplete="off">

                                    <div id="searchResult" class=" bg-white border rounded"></div>

                                </div>
                            </div>

                            <div class="mb-2">
                                <p class=" mb-2">Find a Nearest Center</p>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 d-flex align-items-center">
                                        <img src="assets/images/logo/center.svg" alt="icon" width="35" height="25">
                                        <span class="vr ms-2"></span>
                                    </span>
                                    <input type="text" placeholder="Enter Area" class="form-control  border-start-0"
                                        id="find_center2" autocomplete="off">
                                </div>
                            </div>

                            <div class="text-center mt-2">
                                <small class="fw-bold text-success"><i class="fa fa-clock"></i> Get reports in 24–48
                                    hours</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- product section start -->
        <section class="product-section background-one pt-50  md-pt-30 pb-50 md-pb-30">
            <div class="container">
                {{-- Tru Health Packages Section --}}
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center pt-10 pb-10">Tru Health Packages</h5>
                        </div>
                        <div class="pricing-tabs">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-male-THP">For
                                        Male</button>
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-THP">Tru
                                        Health Packages</button>
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-female-THP">For
                                        Female</button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                @php
                    $packages = \App\Models\Subparameter::where('status', 'active')
                        ->latest()
                        ->get();
                @endphp

                <div class="tab-content">

                    {{-- All Tru Health Packages --}}
                    <div class="tab-pane fade active show" id="nav-THP">
                        <div class="swiper myProductSwiper pb-20 p-sm-10">
                            <div class="swiper-wrapper">
                                @forelse($packages as $pkg)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative">
                                                <a
                                                    href="{{ route('health-package.detail', $pkg->slug ?? Str::slug($pkg->title)) }}">
                                                    <img src="{{ $pkg->image ? asset('storage/' . $pkg->image) : asset('assets/images/product/test.jpg') }}"
                                                        class="img-fluid w-100" alt="{{ $pkg->title }}"></a>
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-success text-white rounded-circle px-2 py-1 small fw-bold">
                                                    {{ rand(15, 50) }}
                                                </span>
                                            </div>
                                            <div class="p-3">
                                                <a
                                                    href="{{ route('health-package.detail', $pkg->slug ?? Str::slug($pkg->title)) }}">
                                                    <h6 class="title-card mb-1">
                                                        {{ Str::limit($pkg->title, 60) }}
                                                    </h6>
                                                </a>

                                                @php
                                                    $testCount = is_array($pkg->test_ids) ? count($pkg->test_ids) : 0;
                                                    $parameterCount = is_array($pkg->parameter_id) ? count($pkg->parameter_id) : 0;


                                                @endphp

                                                @if($testCount > 0)
                                                    <p class="text-muted small pb-3 border-bottom-grey">
                                                        <span class="badge bg-light text-dark border ">
                                                            {{ $testCount }} Profile | {{ $parameterCount  }} Parameters
                                                        </span>
                                                    </p>
                                                @endif

                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">
                                                    Rs. {{ number_format((float) ($pkg->price ?? 0)) }}
                                                </p>
                                                <a href="{{ route('appointment') }}" class="theme-button style-1">
                                                    <span data-text="Add to Cart">Add to Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="text-center py-5 w-100 text-muted">
                                            No packages available
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Male Tab--}}
                    <div class="tab-pane fade" id="nav-male-THP">
                        <div class="swiper myProductSwiper pb-20">
                            <div class="swiper-wrapper">
                                @forelse($packages as $pkg)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative">
                                                <img src="{{ $pkg->image ? asset('storage/' . $pkg->image) : asset('assets/images/product/test1.jpg') }}"
                                                    class="img-fluid w-100" alt="{{ $pkg->title }}">
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-primary text-white rounded-circle px-2 py-1 small fw-bold">
                                                    M
                                                </span>
                                            </div>
                                            <div class="p-3">
                                                <a
                                                    href="{{ route('health-package.detail', $pkg->slug ?? Str::slug($pkg->title)) }}">
                                                    <h6 class="title-card mb-1">
                                                        {{ Str::limit($pkg->title, 60) }}
                                                    </h6>
                                                </a>
                                                <p class="text-muted small mb-2">
                                                    <span class="badge bg-light text-dark border">
                                                        {{ is_array($pkg->test_ids) ? count($pkg->test_ids) : 0 }} Profile |
                                                        {{ (is_array($pkg->parameter_id) ? count($pkg->parameter_id) : 0)  }}
                                                        Parameters
                                                    </span>
                                                </p>
                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">Rs.
                                                    {{ number_format((float) ($pkg->price ?? 0)) }}
                                                </p>
                                                <a href="{{ route('appointment') }}" class="theme-button style-1">
                                                    <span data-text="Add to Cart">Add to Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide text-center py- py-5 text-muted w-100">No male packages</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Female Tab --}}
                    <div class="tab-pane fade" id="nav-female-THP">
                        <div class="swiper myProductSwiper pb-20">
                            <div class="swiper-wrapper">
                                @forelse($packages as $pkg)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative">
                                                <a
                                                    href="{{ route('health-package.detail', $pkg->slug ?? Str::slug($pkg->title)) }}">
                                                    <img src="{{ $pkg->image ? asset('storage/' . $pkg->image) : asset('assets/images/product/test.jpg') }}"
                                                        class="img-fluid w-100" alt="{{ $pkg->title }}"></a>
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-danger text-white rounded-circle px-2 py-1 small fw-bold">
                                                    F
                                                </span>
                                            </div>
                                            <div class="p-3">
                                                <a
                                                    href="{{ route('health-package.detail', $pkg->slug ?? Str::slug($pkg->title)) }}">
                                                    <h6 class="title-card mb-1">
                                                        {{ Str::limit($pkg->title, 60) }}
                                                    </h6>
                                                </a>
                                                <p class="text-muted small mb-2">
                                                    <span class="badge bg-light text-dark border">
                                                        {{ is_array($pkg->test_ids) ? count($pkg->test_ids) : 0 }} Profile |
                                                        {{ (is_array($pkg->parameter_id) ? count($pkg->parameter_id) : 0)  }}
                                                        Parameters
                                                    </span>
                                                </p>
                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">Rs.
                                                    {{ number_format((float) ($pkg->price ?? 0)) }}
                                                </p>
                                                <a href="{{ route('appointment') }}" class="theme-button style-1">
                                                    <span data-text="Add to Cart">Add to Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide text-center py-5 text-muted w-100">No female packages</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- section for test packages start FOR Popular Tests --}}
            <div class="container pt-30 md-pt-10">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center pt-10 pb-10">Popular Test Packages</h5>
                        </div>

                        <!-- pricing tabs start -->
                        <div class="pricing-tabs">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link" id="nav-male-TP-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-male-TP" type="button" role="tab" aria-controls="nav-male-TP"
                                        aria-selected="false">For Male</button>
                                    <button class="nav-link active" id="nav-TP-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-TP" type="button" role="tab" aria-controls="nav-TP"
                                        aria-selected="true">Popular Test Packages</button>
                                    <button class="nav-link" id="nav-female-TP-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-female-TP" type="button" role="tab"
                                        aria-controls="nav-female-TP" aria-selected="false">For Female</button>
                                </div>
                            </nav>
                        </div>
                        <!-- pricing tabs end -->
                    </div>
                </div>

                @php
                    $packages = \App\Models\PopularTests::where('status', 'active')->latest()->get();
                @endphp

                <div class="tab-content">

                    {{-- Popular Tab --}}
                    <div class="tab-pane fade active show" id="nav-TP" role="tabpanel" aria-labelledby="nav-TP-tab">
                        <div class="swiper myProductSwiper pb-20">
                            <div class="swiper-wrapper">
                                @forelse($packages as $package)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative text-center  bg-light">
                                                <!-- ICON instead of big image -->
                                                <a {{--
                                                    href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}"
                                                    --}}><img
                                                        src="{{ $package->image ? asset('storage/' . $package->image) : asset('assets/images/default.webp') }}"
                                                        class="w-100" alt="{{ $package->title }}"></a>

                                                <!-- Discount badge (optional) -->
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-success text-white rounded-circle px-2 py-1 small fw-bold">
                                                    {{ rand(10, 40) }}
                                                </span>
                                            </div>

                                            <div class="p-3">
                                                <a 
                                                    href="{{ route('test-detail', $package->slug ?? Str::slug($package->title)) }}"
                                                   >
                                                    <h6 class="title-card mb-3">
                                                        {{ Str::limit($package->title, 60) }}
                                                    </h6>
                                                </a>

                                                @if($package->detail_id && is_array($package->detail_id) && count($package->detail_id) > 0)
                                                    <p class="text-muted small pb-3 border-bottom-grey">
                                                        <span class="badge bg-light text-dark border">
                                                            {{ count($package->detail_id) }}
                                                            Test{{ count($package->detail_id) > 1 ? 's' : '' }} | Parameter 1
                                                        </span>
                                                    </p>
                                                @endif

                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">
                                                    Rs. {{ number_format((float) $package->price) }}
                                                </p>

                                                <a href="{{ route('test-detail', $package->slug ?? Str::slug($package->title)) }}"
                                                    class="theme-button style-1" aria-label="Add To Cart">
                                                    <span data-text="Add To Cart">Add To Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="text-center py-5 w-100">
                                            <p class="text-muted">No packages available</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Male Tab --}}
                    <div class="tab-pane fade" id="nav-male-TP" role="tabpanel" aria-labelledby="nav-male-TP-tab">
                        <div class="swiper myProductSwiper pb-20">
                            <div class="swiper-wrapper">
                                @forelse($packages as $package)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative text-center py-4 bg-light">
                                                <a
                                                    href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}"><img
                                                        src="{{ $package->icon ? asset('storage/' . $package->icon) : asset('assets/images/default.webp') }}"
                                                        width="80" height="80" class="rounded-circle border p-3 shadow-sm"
                                                        alt="{{ $package->title }}"></a>
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-primary text-white rounded-circle px-2 py-1 small fw-bold">M</span>
                                            </div>
                                            <div class="p-3">
                                                <a
                                                    href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}">
                                                    <h6 class="title-card mb-1">{{ Str::limit($package->title, 60) }}</h6>
                                                </a>
                                                @if($package->detail_id && is_array($package->detail_id))
                                                    <p class="text-muted small mb-2">
                                                        <span
                                                            class="badge bg-light text-dark border">{{ count($package->detail_id) }}
                                                            Tests</span>
                                                    </p>
                                                @endif
                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">Rs.
                                                    {{ number_format((float) $package->price) }}
                                                </p>
                                                <a href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}"
                                                    class="theme-button style-1">
                                                    <span data-text="Add To Cart">Add To Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="text-center py-5 w-100">
                                            <p class="text-muted">No packages</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Female Tab --}}
                    <div class="tab-pane fade" id="nav-female-TP" role="tabpanel" aria-labelledby="nav-female-TP-tab">
                        <div class="swiper myProductSwiper pb-20">
                            <div class="swiper-wrapper">
                                @forelse($packages as $package)
                                    <div class="swiper-slide">
                                        <div class="lab-test-card shadow border-0 rounded-4 overflow-hidden bg-white">
                                            <div class="position-relative text-center py-4 bg-light">
                                                <a
                                                    href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}">
                                                    <img src="{{ $package->icon ? asset('storage/' . $package->icon) : asset('assets/images/default.webp') }}"
                                                        width="80" height="80" class="rounded-circle border p-3 shadow-sm"
                                                        alt="{{ $package->title }}"></a>
                                                <span
                                                    class="position-absolute top-0 end-0 m-2 bg-danger text-white rounded-circle px-2 py-1 small fw-bold">F</span>
                                            </div>
                                            <div class="p-3">
                                                <h6 class="title-card mb-1">{{ Str::limit($package->title, 60) }}</h6>
                                                @if($package->detail_id && is_array($package->detail_id))
                                                    <a
                                                        href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}">
                                                        <p class="text-muted small mb-2">
                                                            <span
                                                                class="badge bg-light text-dark border">{{ count($package->detail_id) }}
                                                                Tests</span>
                                                        </p>
                                                    </a>
                                                @endif
                                                <hr class="my-2">
                                                <p class="fw-semibold fs-6 mb-3">Rs.
                                                    {{ number_format((float) $package->price) }}
                                                </p>
                                                <a href="{{ route('parameter-detail', $package->slug ?? Str::slug($package->title)) }}"
                                                    class="theme-button style-1">
                                                    <span data-text="Add To Cart">Add To Cart</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="text-center py-5 w-100">
                                            <p class="text-muted">No packages</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <div class="container pt-30 md-pt-10">
                <div class=" container">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <h5 class="text-center  pb-30 md-pb-10">Test by Health Risks</h5>

                        <!-- section title end -->
                    </div>

                    @php
                        $healthRisks = \App\Models\HealthRisk::where('status', 'active')->get();
                    @endphp

                    <div class="row test-section services-section-1 justify-content-center">

                        @if($healthRisks->isNotEmpty())
                            @foreach ($healthRisks as $risk)
                                <div class="col-lg-2 test-card shadow">
                                    <div class="test-card-img">
                                        <img
                                            src="{{ $risk->icon ? Storage::url($risk->icon) : asset('assets/images/services/icon-service-1.png') }}">
                                    </div>
                                    <div class="title text-center">
                                        <a href="{{ route('healthrisk', $risk->slug ?? Str::slug($risk->title)) }}">
                                            {{ $risk->title ?? 'No Title Available' }}
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-2 test-card shadow">
                                <div class="test-card-img">
                                    <img src="{{ asset('assets/images/services/icon-service-1.png') }}">
                                </div>
                                <div class="title text-center">No Health Risks Available</div>
                            </div>
                        @endif

                    </div>


                </div>
            </div>


        </section>
        <!-- product section end -->
        <!-- about section start -->
        @php
            $aboutSection = \App\Models\AboutSection::where('is_active', true)->first();
        @endphp

        @if($aboutSection)
            <section class="about-section-4 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row">

                        <!-- LEFT SIDE -->
                        <div class="col-lg-5 col-md-12">
                            <div class="section-title mb-20 wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">{{ $aboutSection->sub_title ?? '' }}</span>
                                <h2>{{ $aboutSection->main_title ?? '' }}</h2>
                            </div>

                            <div class="about-img d-flex justify-content-center w-100">
                                @if(!empty($aboutSection->image))
                                    <img src="{{ asset('storage/' . $aboutSection->image) }}"
                                        alt="{{ $aboutSection->main_title ?? 'About Image' }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('assets/images/why-choose/why-choose-img-1-2.jpg') }}" alt="About Us"
                                        class="img-fluid">
                                @endif
                            </div>
                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="col-lg-7 col-md-12">
                            <div class="about-content wow fadeInUp" data-wow-delay=".3s">

                                <!-- TEXT CONTENT -->
                                <div class="about-content-text">

                                    <p align="justify">
                                        {!! $aboutSection->description_1
                ? nl2br(e($aboutSection->description_1))
                : 'No data to show' !!}
                                    </p>

                                    <p align="justify">
                                        {!! $aboutSection->description_2
                ? nl2br(e($aboutSection->description_2))
                : 'No data to show' !!}
                                    </p>

                                </div>

                                <!-- FEATURES -->
                                <div class="about-features-wappper">

                                    {{-- Feature 1 --}}
                                    <div class="about-features-item">
                                        <div class="about-features-icon">
                                            <figure>
                                                @if(!empty($aboutSection->icon_1))
                                                    <img src="{{ asset('storage/' . $aboutSection->icon_1) }}"
                                                        alt="{{ $aboutSection->feature_1_title ?? 'Feature Icon 1' }}">
                                                @else
                                                    <img src="{{ asset('assets/images/about/icon-about-1.png') }}"
                                                        alt="Feature Icon 1">
                                                @endif
                                            </figure>
                                        </div>

                                        <div class="about-features-title">
                                            <h3>{{ $aboutSection->feature_1_title ?? 'No data to show' }}</h3>
                                            <p align="justify">
                                                {!! $aboutSection->feature_1_description
                ? nl2br(e($aboutSection->feature_1_description))
                : 'No data to show' !!}
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Feature 2 --}}
                                    <div class="about-features-item">
                                        <div class="about-features-icon">
                                            <figure>
                                                @if(!empty($aboutSection->icon_2))
                                                    <img src="{{ asset('storage/' . $aboutSection->icon_2) }}"
                                                        alt="{{ $aboutSection->feature_2_title ?? 'Feature Icon 2' }}">
                                                @else
                                                    <img src="{{ asset('assets/images/about/icon-about-2.png') }}"
                                                        alt="Feature Icon 2">
                                                @endif
                                            </figure>
                                        </div>

                                        <div class="about-features-title">
                                            <h3>{{ $aboutSection->feature_2_title ?? 'No data to show' }}</h3>
                                            <p align="justify">
                                                {!! $aboutSection->feature_2_description
                ? nl2br(e($aboutSection->feature_2_description))
                : 'No data to show' !!}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @else
            <div class="text-center w-100 py-5">
                <h4>No about content to show</h4>
            </div>
        @endif

        <!-- about section end -->


        <!-- marquee ticker section start -->
        @include("website.components.sticker")
        <!-- marquee ticker section end -->

        @php
            $faqs = \App\Models\Faq::where('status', 'active')->get();
        @endphp
        <!-- faq section start -->
        <section class="faq-section-1 mb-5 pt-50 md-pt-30">
            <div class="container">
                <!-- faq wapper start -->
                <div class="faq-wapper py-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- section title start -->
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Faq's</span>
                                <h2>Clear answers to your questions</h2>
                                <p align="justify"> At DiagnoEdge Lab, we understand that health testing can raise many
                                    questions — from
                                    booking appointments to understanding your reports.</p>
                            </div>
                            <!-- section title end -->
                            <!-- faq image start -->
                            <div class="faq-image wow fadeInUp" data-wow-delay=".3s">
                                <figure class="image-anime">
                                    <img src="images/faq/FAQ.png" alt="faq">
                                </figure>
                            </div>
                            <!-- faq image end -->
                        </div>
                        <div class="col-lg-6">
                            <!-- faq-content start -->
                            <div class="faq-content wow fadeInUp" data-wow-delay=".2s">
                                <!-- accordion start -->
                                <div class="accordion" id="accordionExample">
                                    <!-- accordion item start -->
                                    @forelse($faqs as $faq)
                                        @php
                                            $id = 'faq_' . $loop->index;
                                        @endphp
                                        <div class="accordion-item">
                                            <!-- accordion-header start -->
                                            <h2 class="accordion-header" id="heading_{{ $id }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse_{{ $id }}" aria-expanded="true"
                                                    aria-controls="collapse_{{ $id }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <!-- accordion header end -->
                                            <!-- accordion collapse start -->
                                            <div id="collapse_{{ $id }}"
                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                aria-labelledby="heading_{{ $id }}" data-bs-parent="#accordionExample">
                                                <!-- accordion body start -->
                                                <div class="accordion-body">
                                                    <div class="inner">
                                                        <div class="accordion-content">
                                                            <p>
                                                                {{ strip_tags($faq->answer) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- accordion body end -->
                                            </div>
                                            <!-- accordion collapse end -->
                                        </div>
                                    @empty
                                        <div class="container">
                                            <p>No Faqs</p>
                                        </div>

                                    @endforelse
                                    <!-- accordion item end -->


                                </div>
                                <!-- accordion end -->
                            </div>
                            <!-- faq-content end -->
                        </div>
                    </div>
                </div>
                <!-- faq wapper end -->
            </div>
        </section>
        <!-- faq section end -->
        {{-- why choose us section --}}
        <section class="portfolio-section-1 py-5" style="background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Left Content -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title text-success fw-bold">
                                {{ App\Models\WhyChooseUsSection::first()?->sub_title ?? 'Why Choose Us?' }}
                            </span>

                            <h2 class="mt-2">
                                {{ App\Models\WhyChooseUsSection::first()?->main_title ?? 'Why DiagnoEdge Labs?' }}
                            </h2>

                            <div class="lead">
                                {!! App\Models\WhyChooseUsSection::first()?->description_1 ?? 'DiagnoEdge Labs has been a trusted name in diagnostics for over a decade.' !!}
                            </div>

                            @if(App\Models\WhyChooseUsSection::first()?->description_2)
                                <div class=" lh-lg">
                                    {!! App\Models\WhyChooseUsSection::first()?->description_2 !!}
                                </div>
                            @else
                                <p>no data to show</p>
                            @endif

                        </div>
                    </div>

                    <!-- Right Side - Cards -->
                    <div class="col-lg-6 custom-padding--md-20">
                        @php
                            $section = App\Models\WhyChooseUsSection::first();
                        @endphp

                        <div class="row g-4 align-items-center">

                            <!-- Big Experience Card -->
                            <div class="col-12 col-md-5">
                                <div class="text-center p-5 rounded-4 shadow-lg h-100 d-flex flex-column justify-content-center"
                                    style="background: #ffffff; border: 4px solid #54ad4c; min-height: 280px;">
                                    @if($section?->big_card_image)
                                        <img src="{{ asset('storage/' . $section->big_card_image) }}" class="mb-3"
                                            style="width: 90px; height: 90px; object-fit: contain;">
                                    @else
                                        <i class="fas fa-award mb-3" style="font-size: 4.5rem; color: #54ad4c;"></i>
                                    @endif

                                    <h3 class="fw-bold mb-0" style="color: #1c5a80; font-size: 4.5rem; line-height: 1;">
                                        {{ $section?->big_card_value ?? '10+' }}
                                    </h3>
                                    <p class="text-muted fw-medium mt-2 fs-5">
                                        {{ $section?->big_card_description ?? 'Years of Excellence' }}
                                    </p>
                                </div>
                            </div>

                            <!-- 4 Small Feature Cards -->
                            <div class="col-12 col-md-7">
                                <div class="row g-3 g-md-4">

                                    @php $hasCards = false; @endphp

                                    @for($i = 1; $i <= 4; $i++)
                                        @if(!empty($section?->{"small_card_{$i}_title"}))
                                            @php $hasCards = true; @endphp

                                            <div class="col-6">
                                                <div class="text-center p-4 rounded-4 shadow h-100 d-flex flex-column justify-content-center"
                                                    style="background: #ffffff; border-top: 6px solid #54ad4c; min-height: 140px;">

                                                    @if(!empty($section?->{"small_card_{$i}_image"}))
                                                        <img src="{{ asset('storage/' . $section->{"small_card_{$i}_image"}) }}"
                                                            class="mb-3" style="width: 56px; height: 56px; object-fit: contain;">
                                                    @else
                                                        <i class="fas fa-flask mb-3" style="font-size: 2.4rem; color: #54ad4c;"></i>
                                                    @endif

                                                    <h5 class="fw-bold mb-0" style="color: #1c5a80; font-size: 1.05rem;">
                                                        {{ $section->{"small_card_{$i}_title"} }}
                                                    </h5>
                                                </div>
                                            </div>

                                        @endif
                                    @endfor

                                    {{-- If no cards found --}}
                                    @if(!$hasCards)
                                        <div class="col-12">
                                            <div class="text-center py-4">
                                                <h4>No data cards to show</h4>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- portfolio section start -->
        <section class="portfolio-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area">
                            <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                                <span class="sub-title">Our Gallery</span>
                                <h2>Explore our showcase of featured works</h2>
                            </div>
                            <div class="section-title-content wow fadeInRight" data-wow-delay=".2s">
                                <p align="justify">Step inside DiagnoEdge Lab through our gallery. From advanced testing
                                    equipment and
                                    hygienic sample collection areas to our expert team at work — every image reflects our
                                    commitment to precision, care, and excellence in diagnostics.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-section ">
                    <div class="container">

                        <!-- Add Swiper container -->
                        <div class="swiper myGallerySwiper">
                            <div class="swiper-wrapper">

                                @forelse ($gallery as $gal)
                                    <div class="swiper-slide">
                                        <div class="photo-gallery">
                                            <div class="photo-gallery-image">
                                                <figure class="image-anime">
                                                    <img src="{{ asset('storage/' . $gal->image) }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="photo-gallery-icon">
                                                <a class="photo-popup" href="{{ asset('storage/' . $gal->image) }}">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center w-100 py-5">
                                        <h4>No gallery images to show</h4>
                                    </div>
                                @endforelse





                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- portfolio section end -->


        <section class="accredit-sec py-5" style="background:#e6f5e9;">
            <div class="container">

                @php
                    $section = App\Models\AccreditationSection::first();
                    $items = collect([
                        $section?->title1,
                        $section?->title2,
                        $section?->title3,
                        $section?->title4,
                    ])->filter();
                @endphp


                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                    <span class="sub-title">Accreditations & Certifications</span>
                    <h2>Why Trust Our Quality Standards?</h2>
                    <p class="lead">We follow globally recognized testing standards ensuring precision, safety, and
                        accuracy.</p>
                </div>

                <div class="row g-4 justify-content-center custom-padding--md-10">

                    @forelse($items as $index => $title)
                        @if($title)
                            <div class="col-md-4 col-lg-3">
                                <div class="feature-card text-center p-4">
                                    @php $icon = $section?->{"icon" . ($index + 1)}; @endphp

                                    @if($icon)
                                        <img src="{{ Storage::url($icon) }}" alt="{{ $title }}" class="mb-3"
                                            style="width: 4.5rem; height: 4.5rem; object-fit: contain;">
                                    @else
                                        <i class="fas fa-award mb-3" style="font-size: 4.5rem; color: #54ad4c;"></i>
                                    @endif

                                    <h6 class="fw-bold">{{ $title }}</h6>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="text-center w-100 py-5">
                            <h4>No Data to show</h4>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>

        @php
            $blogs = \App\Models\Blog::where('status', 'active')->get();
        @endphp
        <!-- blog section start -->
        <section class="blog-section background-one pt-50 md-pt-30 pb-50 md-pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title start -->
                        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                            <span class="sub-title">Blog &amp; Article</span>
                            <h2>Update with our latest insights</h2>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    @forelse($blogs as $blog)
                        <div class="col-lg-4 col-md-12">
                            <!-- blog grid item 1 start -->

                            <div class="blog-grid-item-1 wow fadeInUp" data-wow-delay=".3s">


                                <div class="blog-grid-image">
                                    <a href="{{ route('blog-details', $blog->slug) }}">
                                        <figure class="image-anime">
                                            <img src="{{ Storage::url(path: $blog->image) }}" alt="blog image one">
                                        </figure>
                                    </a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-user"></i>
                                            <span>{{ $blog->author }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('d-M-Y') }}
                                        </span>
                                    </li>
                                </ul>
                                <div class="blog-title">
                                    <h3><a href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                </div>
                                <div class="blog-grid-content">
                                    <p>{{ Str::limit(strip_tags($blog->description), 80) }}...</p>
                                    <div class="blog-grid-button">
                                        <a href="{{ route('blog-details', $blog->slug) }}" class="read-more-btn">More
                                            Details</a>
                                    </div>
                                </div>
                            </div>


                            <!-- blog grid item 1 end -->
                        </div>
                    @empty
                        <div class="text-center w-100 py-5">
                            <h4>No Blogs to show</h4>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- blog section end -->
        <!-- testimonials section start -->
        @include("website.components.testimonials")




    </main>


@endsection
{{-- SCRIPT ADD THERE ONLY FOR APPOINTMENT BLADE --}}
@push('scripts')


    <script>
    
    //      $(document).ready(function () {
    //     setTimeout(function () {
    //         $("#bookingModal").modal("show");
    //     }, 3000);
    // });
        // search
    function autoSearch(inputId, resultId) {
        document.getElementById(inputId).addEventListener('keyup', function () {

            let keyword = this.value.toLowerCase();

            if (keyword.length < 2) {
                document.getElementById(resultId).innerHTML = '';
                return;
            }

            fetch(`/search-all?keyword=` + keyword)
                .then(res => res.json())
                .then(data => {
                    let output = "";

                    if (data.results.length > 0) {
                        data.results.forEach(item => {
                            output += `
                              <a href="${item.url}" class="p-2 w-100 d-block border-bottom result-item bg-light" style="font-size:16px;">
                                <img 
                                src="storage/${item.icon}" 
                                alt="${item.title}" 
                                style="width:40px;height:40px;object-fit:cover;border-radius:6px; border: 1px solid grey; margin-right:10px;"
                            >
    ${item.title}
    </a>`;
                        });
                    } else {
                        output = `<div class="p-2 text-danger">No related option found</div>`;
                    }

                    document.getElementById(resultId).innerHTML = output;
                });
        });
    }
    autoSearch('already_know', 'searchResult');
    autoSearch('already_know2', 'searchResult2');
   
        // SWIPER  FOR PRODUCT
        var swiper = new Swiper(".myProductSwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            breakpoints: {
                1200: { // desktops
                    slidesPerView: 4,
                },
                992: { // laptops & tablets landscape
                    slidesPerView: 3,
                },
                768: { // tablets portrait
                    slidesPerView: 2,
                },
                576: { // mobile large
                    slidesPerView: 1,
                },
                0: { // mobile small
                    slidesPerView: 1,
                },
            },

        });


        // gallery swiper
        var swiper = new Swiper(".myGallerySwiper", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                320: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                991: { slidesPerView: 3 }
            }
        });






        window.footerCaptcha = function () {
            const btn = document.getElementById('bookingSubmit1');
            if (btn) btn.disabled = false;
        };
        let iti1;
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
         // INTEL FLAG SCRIPT FOR PHONE ID

          window.popupCaptcha = function () {
            const btn = document.getElementById('bookingSubmit');
            if (btn) btn.disabled = false;
        };
         let iti;
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector("#mobile");
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

        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector("#mobile");
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
            document.querySelector("#mobile").value = iti1.getNumber();
        });


        // form submission for footer popup
        document.addEventListener('DOMContentLoaded', function () {

            const modal = document.getElementById('popupCallModal');
            const closeBtn = document.getElementById('popupClose');
            const form = document.getElementById('bookingForm1');
            const submitBtn = document.getElementById('bookingSubmit1');
            const alertBox = document.getElementById('alertBox1');

            function closeBookingModal() {

                // Close Bootstrap modal properly
                let modalInstance = bootstrap.Modal.getInstance(modal);
                if (!modalInstance) {
                    modalInstance = new bootstrap.Modal(modal);
                }
                modalInstance.hide();

                // Reset form
                form.reset();

                // Reset captcha
                if (window.grecaptcha) grecaptcha.reset();

                // Disable submit
                submitBtn.disabled = true;

                // Clear alerts
                alertBox.innerHTML = '';


                // Reset captcha
                if (window.grecaptcha) grecaptcha.reset();

                // Disable submit button again
                submitBtn.disabled = true;

                // Clear messages
                alertBox.innerHTML = '';

                // Re-enable page scroll
                document.body.style.overflow = 'auto';
            }

            function openBookingModal() {

                document.body.style.overflow = 'hidden';
            }

            closeBtn.addEventListener('click', closeBookingModal);
            window.addEventListener('click', (e) => {
                if (e.target === modal) closeBookingModal();
            });

            const isHomepage = ['/', '/home', '/index', ''].includes(window.location.pathname);
            if (isHomepage) setTimeout(openBookingModal, 5000);

            // AJAX SUBMIT
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Submitting...';

                // intlTelInput update
                if (iti1) {
                    form.querySelector('#mobile').value = iti1.getNumber();
                }

                const formData = new FormData(form);

                fetch(form.action, {
                    method: "POST",
                    headers: {
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        submitBtn.innerHTML = 'Submit';
                        alertBox.innerHTML = '';

                        if (data.success) {

                            // Show success message briefly before closing
                            alertBox.innerHTML = `<div class="alert-success">${data.message}</div>`;

                            // Close modal immediately after short delay (optional)
                            setTimeout(() => {
                                closeBookingModal();
                            }, 1000);

                        } else {
                            let html = `<div class="alert-error"><ul>`;
                            if (data.errors) {
                                Object.values(data.errors).flat().forEach(err => html += `<li>${err}</li>`);
                            } else {
                                html += `<li>${data.message || 'An error occurred'}</li>`;
                            }
                            html += `</ul></div>`;
                            alertBox.innerHTML = html;

                            if (window.grecaptcha) grecaptcha.reset();
                            submitBtn.disabled = true;
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        submitBtn.innerHTML = 'Submit';
                        alertBox.innerHTML = `<div class="alert-error">An error occurred. Please try again.</div>`;
                        if (window.grecaptcha) grecaptcha.reset();
                        submitBtn.disabled = true;
                    });
            });

        });




    </script>

@endpush