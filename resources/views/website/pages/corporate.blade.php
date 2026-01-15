@extends("website.layout.master-layout")
@section("title", " Corporate | Diagnoedge")
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
                                <h1>Corporate</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Corporate</li>
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


        @php
            $benefits = \App\Models\CorporateBenefit::first();
        @endphp

        @if($benefits)
            <!-- SECTION 1: Benefits of Corporate Wellness Programs -->
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- IMAGE LEFT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime">
                                <img src="{{ Storage::url(path: $benefits->image)}}" style="border-radius: 20px;"
                                    alt="Corporate Wellness">
                            </figure>

                        </div>

                        <!-- CONTENT RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <div class="why-content">
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">{{ $benefits->sub_title }}</span>
                                    <h2>{{ $benefits->main_title }}</h2>
                                    <p align="justify">
                                        {{ $benefits->description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @else
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- IMAGE LEFT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime">
                                <img src="{{ asset('images/avatar/img3.jpg') }}" style="border-radius: 20px;"
                                    alt="Corporate Wellness">
                            </figure>

                        </div>

                        <!-- CONTENT RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <div class="why-content">
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">Corporate Wellness</span>
                                    <h2>What Are the Benefits of Corporate Wellness Programs?</h2>
                                    <p align="justify">
                                        Corporate wellness programs at Diagnoedge Healthcare deliver multiple benefits, helping
                                        employees maintain better health, boosting productivity, and reducing absenteeism. By
                                        incorporating regular corporate medical check-ups and wellness initiatives,
                                        organizations can proactively address health concerns and create a supportive workplace
                                        culture. Investing in employee wellness not only improves individual well-being but also
                                        strengthens overall organizational performance and fosters a positive work environment.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif

        @php
            $services = App\Models\CorporateService::first();
        @endphp
        @if($services)
            <!-- SECTION 2: Corporate Health Check-ups -->
            <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- CONTENT LEFT -->
                        <div class="col-lg-6 col-md-12">
                            <div class="why-content">
                                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                    <span class="sub-title">{{ $services->sub_title }}</span>
                                    <h2>{{ $services->main_title }}</h2>
                                    <p align="justify">
                                        {{ $services->description }}
                                    </p>
                                    


                                </div>
                            </div>
                        </div>

                        <!-- IMAGE RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime">
                                <img src="{{ Storage::url(path:$services->image)}}"
                                    style="border-radius: 20px;" alt="Health Check-ups">
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
                                    <span class="sub-title">Health Check-ups</span>
                                    <h2>Benefits of Corporate Health Check-ups</h2>
                                    <p align="justify">
                                        Corporate health check-ups provide early detection of health issues, enabling timely
                                        intervention and better overall well-being. Regular check-ups encourage employees to
                                        take proactive steps toward their health, resulting in fewer sick days and higher
                                        workplace productivity. Investing in employee health fosters a culture of wellness,
                                        teamwork, and long-term organizational growth.
                                    </p>
                                    <div class="check-list">
                                        <ul>
                                            <li>Early health issue detection</li>
                                            <li>Preventive care for well-being</li>
                                            <li>Reduced absenteeism</li>
                                            <li>Boosted workplace productivity</li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- IMAGE RIGHT -->
                        <div class="col-lg-6 col-md-12">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/video-gallery/video-gallery-7.jpg')}}"
                                    style="border-radius: 20px;" alt="Health Check-ups">
                            </figure>
                        </div>

                    </div>
                </div>
            </section>
        @endif



        <!-- SECTION 3: The Diagnoedge Advantage -->
        <section class="why-choose-section-1 pt-50 md-pt-30 pb-50 md-pb-30">
            <div class="container">
                <div class="row align-items-center">

                    <!-- IMAGE RIGHT -->
                    <div class="col-lg-6 col-md-12">
                        <figure class="image-anime">
                            <img src="{{ asset('images/avatar/img4.jpg') }}" style="border-radius: 20px;"
                                alt="Diagnoedge Advantage">
                        </figure>
                    </div>
                    <!-- CONTENT LEFT -->
                    <div class="col-lg-6 col-md-12 md-pt-30 ">
                        <div class="why-content">
                            <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                                <span class="sub-title">The Diagnoedge Advantage</span>
                                <h2>Distinctive Features of Diagnoedge Healthcare</h2>
                                <p align="justify">
                                    Diagnoedge Healthcare stands out due to its combination of advanced diagnostic
                                    technology, certified professionals, and personalized care. Our commitment to accuracy
                                    and timely results ensures reliable health insights for all employees.
                                </p>
                                <p align="justify">
                                    We provide innovative health solutions, tailored to your organization’s unique needs.
                                    Whether it’s routine check-ups, preventive screenings, or specialized testing, our team
                                    ensures a patient-centered, convenient, and effective healthcare experience. With
                                    Diagnoedge Healthcare, your employees receive trustworthy diagnostics, compassionate
                                    care, and expert guidance — supporting both individual well-being and organizational
                                    growth.
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>





    </main>
@endsection