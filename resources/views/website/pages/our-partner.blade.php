@extends("website.layout.master-layout")
@section("title", " Our Partners | Diagnoedge")
@section("content")
    {{-- main section --}}
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
                                <h1>Our Partner</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Partner</li>
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
        <!-- about section start -->

        @php
            $partnersabout = App\Models\PartnerAbout::first();
        @endphp
        @if($partnersabout)
            <section class="about-section-2 pt-50 md-pt-30 pb-50 ">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <!-- about images box start -->
                            <div class="about-images-box">
                                <!-- about images top start -->
                                <div class="about-images-top wow fadeInUp" data-wow-delay=".2s">
                                    <figure class="image-anime">
                                        <img src="assets/images/about/about-2-2.jpg" alt="about one">
                                    </figure>
                                </div>
                                <!-- about images top end -->

                            </div>
                            <!-- about images box end -->
                        </div>
                        <div class="col-lg-6 md-pt-30">
                            <!-- about content start -->
                            <div class="about-content">
                                <!-- section title start -->

                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">{{ $partnersabout->sub_title }}</span>
                                    <h2>{{ $partnersabout->main_title }}</h2>
                                    <p align="justify">
                                        {{ $partnersabout->description }}
                                    </p>
                                </div>

                                {{-- <div class="check-list-two-col wow fadeInUp" data-wow-delay=".3s">
                                    <ul>
                                        <li>Trusted Healthcare Partnerships</li>
                                        <li>Advanced Diagnostic Support</li>
                                        <li>Shared Commitment to Quality</li>
                                        <li>Growth Through Collaboration</li>
                                    </ul>
                                </div> --}}


                            </div>
                            <!-- about content end -->
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="about-section-2 pt-50 md-pt-30 pb-50 ">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <!-- about images box start -->
                            <div class="about-images-box">
                                <!-- about images top start -->
                                <div class="about-images-top wow fadeInUp" data-wow-delay=".2s">
                                    <figure class="image-anime">
                                        <img src="assets/images/about/about-1-1.jpg" alt="about one">
                                    </figure>
                                </div>
                                <!-- about images top end -->

                            </div>
                            <!-- about images box end -->
                        </div>
                        <div class="col-lg-6 md-pt-30">
                            <!-- about content start -->
                            <div class="about-content">
                                <!-- section title start -->

                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">Our Partners</span>
                                    <h2>Empowering Diagnostics Through Strong & Trusted Partnerships</h2>
                                    <p align="justify">
                                        At Diagnoedge Lab, we proudly collaborate with leading healthcare providers, diagnostic
                                        innovators, and technology partners who share our dedication to accuracy, reliability,
                                        and patient-centered care. Through these strategic partnerships, we enhance our testing
                                        capabilities, introduce cutting-edge diagnostic solutions, and ensure faster, more
                                        efficient service delivery. Together, we work to raise the standard of laboratory
                                        diagnostics and contribute to better health outcomes for the communities we serve.
                                    </p>
                                </div>




                            </div>
                            <!-- about content end -->
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- about section end -->

        <!-- partners section start -->
        @php
            $partners = \App\Models\Partner::where('status', 'active')->get();
        @endphp

        @if($partners->count() > 0)
            <section class="partners-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title start -->
                            <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Our Partners</span>
                                <h2>Partners Who Trust Diagnoedge</h2>
                            </div>
                            <!-- section title end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- partners slider start -->
                            <div class="swiper partners-slider">
                                <!-- swiper wrapper start -->
                                <div class="swiper-wrapper">
                                    @foreach($partners as $partner)
                                        <!-- swiper slide start -->
                                        <div class="swiper-slide">
                                            <!-- partners item start -->
                                            <div class="partners-item">
                                                <div class="partners-image text-center">
                                                    <figure>
                                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="Partner Logo"
                                                            class="img-fluid" loading="lazy"
                                                            onerror="this.src='{{ asset('assets/images/partners/placeholder.png') }}'">
                                                    </figure>
                                                </div>
                                            </div>
                                            <!-- partners item end -->
                                        </div>
                                        <!-- swiper slide end -->
                                    @endforeach
                                </div>
                                <!-- swiper wrapper end -->
                            </div>
                            <!-- partners slider end -->
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="partners-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title start -->
                            <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">Our Partners</span>
                                <h2>Partners Who Trust Diagnoedge</h2>
                            </div>
                            <!-- section title end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center w-100 py-5">
                                <h4>No Partners to show</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- partners section end -->

        @php
            $whyPartners = \App\Models\WhyPartner::first();
        @endphp




        @if($whyPartners)
            <!-- Why Partner With Us -->
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- CONTENT LEFT -->
                        <div class="col-lg-6 col-md-12">
                            <div class="why-content">
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">{{ $whyPartners->sub_title }}</span>
                                    <h2>{{ $whyPartners->main_title }}</h2>
                                    <p align="justify">
                                        {{ $whyPartners->description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- IMAGE RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime rounded-sm">
                                <img src="{{  Storage::url(path: $whyPartners->image)  }}" style="border-radius: 20px;"
                                    alt="Corporate Health Partner">
                            </figure>

                        </div>

                    </div>
                </div>
            </section>
        @else
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- CONTENT LEFT -->
                        <div class="col-lg-6 col-md-12">
                            <div class="why-content">
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">Why Partner With Us</span>
                                    <h2>Why Choose Diagnoedge Healthcare as Your Corporate Wellness Partner?</h2>
                                    <p align="justify">
                                        Choosing Diagnoedge Healthcare as your corporate wellness partner provides reliable,
                                        tailored solutions to enhance employee health and workplace productivity. Our
                                        experienced medical team, state-of-the-art diagnostic facilities, and comprehensive
                                        range of tests are designed to meet the unique needs of your organization. With our
                                        corporate wellness packages, you can ensure that every employee receives complete health
                                        support.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- IMAGE RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime rounded-sm">
                                <img src="{{ asset('images/avatar/img2.jpg') }}" style="border-radius: 20px;"
                                    alt="Corporate Health Partner">
                            </figure>

                        </div>

                    </div>
                </div>
            </section>

        @endif


    </main>
@endsection