@extends("website.layout.master-layout")
@section("title", " About Us | Diagnoedge")
@section("content")
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
                                <h1>About Us</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
        @php $about = App\Models\AboutSectionTwo::where('is_active', true)->first(); @endphp

        @if($about)
            <section class="about-section-2 pt-50 md-pt-30 pb-50 md-pb-30">
                @if($about->shape_1)
                <div class="about-shape-1"><img src="{{ Storage::url($about->shape_1) }}" alt=""></div>@endif
                @if($about->shape_2)
                <div class="about-shape-2"><img src="{{ Storage::url($about->shape_2) }}" alt=""></div>@endif

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-images-box">
                                <div class="about-images-top wow fadeInUp">
                                    <img src="{{ $about->image_top ? Storage::url($about->image_top) : asset('assets/images/about/about-2-1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="about-images-bottom">
                                    <div class="about-year-counter wow fadeInLeft">
                                        <div class="about-year-icon">
                                            <img src="{{ $about->founded_image ? Storage::url($about->founded_image) : asset('assets/images/about/icon-about-4.png') }}"
                                                alt="">
                                        </div>
                                        <div class="about-year-content">
                                            <p>Our Diagnoedge Hospital Funded in</p>
                                            <h3>{{ $about->founded_year }}</h3>
                                        </div>
                                    </div>
                                    <div class="about-year-images wow fadeInRight">
                                        <img src="{{ $about->image_bottom ? Storage::url($about->image_bottom) : asset('assets/images/about/about-2-2.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 md-pt-30">
                            <div class="about-content">
                                <div class="section-title wow fadeInUp">
                                    <span class="sub-title">{{ $about->sub_title }}</span>
                                    <h2>{{ $about->main_title }}</h2>
                                 <p align="justify">{!! $about->description_1 ? $about->description_1 : '' !!}</p>


@if($about->description_2)
    <p align="justify">{!! $about->description_2 ? $about->description_2 : '' !!}</p>

@endif
                                </div>

                                <div class="about-footer wow fadeInUp">
                                    <div class="about-button-wappper">
                                        <a href="{{ route('contact-us') }}" class="theme-button style-1">
                                            <span data-text="More About">Contact Us</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <div class="about-contact-box">
                                        <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
                                        <div class="about-contact-box-content">
                                            <p>For Emergency, Call Now</p>
                                            <a href="tel:+123446788">+1 234 467 88</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- about section end -->


        <!-- counter section start -->
        @php
            $counter = \App\Models\Counter::first();

        @endphp

        @if($counter)
            <section class="counter-section-2 pb-60 md-pb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- counter list start -->
                            <div class="counter-list">
                                <!-- Counter 1 -->
                                <div class="counter-item wow fadeInUp" data-wow-delay=".2s">
                                    <div class="counter-content">
                                        <div class="counter-text">
                                            <span class="counter-value" data-stop="{{ $counter->count1 }}"
                                                data-speed="3000">0</span>+
                                        </div>
                                        <h2 class="counter-title">{{ $counter->title1 }}</h2>
                                    </div>
                                </div>

                                <!-- Counter 2 -->
                                <div class="counter-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="counter-content">
                                        <div class="counter-text">
                                            <span class="counter-value" data-stop="{{ $counter->count2 }}"
                                                data-speed="3000">0</span>+
                                        </div>
                                        <h2 class="counter-title">{{ $counter->title2 }}</h2>
                                    </div>
                                </div>

                                <!-- Counter 3 -->
                                <div class="counter-item wow fadeInUp" data-wow-delay=".4s">
                                    <div class="counter-content">
                                        <div class="counter-text">
                                            <span class="counter-value" data-stop="{{ $counter->count3 }}"
                                                data-speed="3000">0</span>+
                                        </div>
                                        <h2 class="counter-title">{{ $counter->title3 }}</h2>
                                    </div>
                                </div>

                                <!-- Counter 4 -->
                                <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                                    <div class="counter-content">
                                        <div class="counter-text">
                                            <span class="counter-value" data-stop="{{ $counter->count4 }}"
                                                data-speed="3000">0</span>+
                                        </div>
                                        <h2 class="counter-title">{{ $counter->title4 }}</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- counter list end -->
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- counter section end -->


        @php

            $makes = \App\Models\AboutMake::first();
        @endphp

        <!-- why-section start -->
        @if($makes)
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <!-- why content start -->
                            <div class="why-content">
                                <!-- section-title start -->
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">{{ $makes->sub_title }}</span>
                                    <h2>{{ $makes->main_title }}</h2>
                                    <p align="justify">
                                        {{ $makes->description }}
                                    </p>
                                </div>

                                <!-- section-title end -->


                            </div>
                            <!-- why content end -->
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- why choose image start -->
                            <div class="">

                                <figure class="image-anime">
                                    <img src="{{  Storage::url($makes->image)  }}" style="border-radius: 20px;"
                                        alt="why choose image one">
                                </figure>



                            </div>
                            <!-- why choose image end -->
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                                                <!-- why content start -->
                            <div class="why-content">
                                <!-- section-title start -->
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">What Makes Us Different</span>
                                    <h2>Precision, Trust, and Unmatched Diagnostic Excellence</h2>
                                    <p align="justify">
                                        At Diagnoedge Lab, we combine advanced laboratory technology with a patient-focused
                                        approach
                                        to deliver highly accurate diagnostic results. Our processes are guided by strict
                                        quality
                                        standards, modern equipment, and a team of skilled professionals who ensure reliability
                                        at
                                        every step. From seamless sample collection to transparent reporting, we aim to make
                                        diagnostics simple, fast, and dependable for individuals, doctors, and healthcare
                                        organizations.
                                        Choosing Diagnoedge means choosing clarity, accuracy, and a partner committed to your
                                        well-being.
                                    </p>
                                </div>

                                <!-- section-title end -->


                            </div>
                            <!-- why content end -->
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- why choose image start -->
                            <div class="">

                                <figure class="image-anime">
                                    <img src="assets/images/about/about-2-1.jpg" style="border-radius: 20px;"
                                        alt="why choose image one">
                                </figure>



                            </div>
                            <!-- why choose image end -->
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- why-section end -->

        <!-- testimonials section start -->
        @include("website.components.testimonials")
        <!-- testimonials section end -->

    </main>
@endsection

@push('scripts')
@endpush