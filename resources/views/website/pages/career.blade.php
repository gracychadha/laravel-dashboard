@extends("website.layout.master-layout")
@section("title", " Career | Diagnoedge")
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
                <img class="breadcrumb-shape-one" src="assets/images/shape/shape-4.png" alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="assets/images/shape/square-blue.png" alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="assets/images/shape/plus-orange.png" alt="breadcrumb shape three">
            </div>
        </section>
        <!-- breadcrumb section end -->
        <!-- pricing section start -->
        <section class="pricing-section-1 bg-section pt-50 md-pt-30 pb-50 md-pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title">
                                <span class="sub-title">Jobs &amp; Offers</span>
                                <h2>Find Your Dream Job</h2>
                            </div>
                            <div class="section-title-content">
                                <p>Explore thousands of opportunities and take the next step in your career journey.Explore
                                    thousands of opportunities and take the next step in your career journey.Explore
                                    thousands of opportunities and take the next step in your career journey.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- pricing tabs start -->
                        <div class="pricing-tabs">
                            <!-- nav start -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    {{-- <button class="nav-link active" id="nav-lab-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-lab" type="button" role="tab" aria-controls="nav-lab"
                                        aria-selected="true">Lab Packages</button> --}}
                                    <button class="nav-link" id="nav-career-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-career" type="button" role="tab" aria-controls="nav-career"
                                        aria-selected="false">Job Careers</button>
                                </div>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- pricing tabs end -->
                    </div>
                </div>
                @php
                    $jobs = \App\Models\JobCareer::where('is_active', '1')->get();
                @endphp

                <!-- tab content start -->
                <div class="tab-content">




                    <div class="tab-pane fade active show" id="nav-career" role="tabpanel" aria-labelledby="nav-career-tab"
                        tabindex="0">
                        <div class="row align-items-center">

                            <!-- Lab Technician -->
                            @forelse ($jobs as $job)
                                <div class="col-lg-4 col-md-12">
                                    <div class="pricing-item">
                                        <div class="pricing-content">
                                            <div class="pricing-text">
                                                <p class="pricing-plan-title">
                                                    {{ $job->title ? $job->title : 'Lab Technician' }}
                                                </p>
                                                <h3 class="pricing-plan-price">{{ $job->type ? $job->type : 'Full Time' }}
                                                    @if ($job->is_featured)
                                                        <span> Urgent </span>
                                                    @endif



                                                </h3>
                                                <p align="justify">Join our team of dedicated healthcare professionals and make
                                                    a real impact in
                                                    patient care.</p>
                                            </div>
                                            <div class="pricing-list">
                                                <div class="check-list mb-3">
                                                    @if ($job->description)
                                                        {!! $job->description !!}
                                                    @else
                                                        <p>No details</p>
                                                    @endif
                                                </div>
                                                {{-- <p class="text-black">Job Details</p>
                                                <div class="check-list mb-30">
                                                    <ul>
                                                        <li>Experience: 1–3 Years</li>
                                                        <li>Qualification: B.Sc / DMLT</li>
                                                        <li>Location: New Delhi</li>
                                                    </ul>
                                                </div> --}}
                                                <div class="pricing-button-wapper">
                                                    <a href="{{ route('career-form', $job->slug) }}" class="theme-button style-2" aria-label="Apply Now">
                                                        <span data-text="Apply Now">Apply Now</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No career JObs Found</p>
                            @endforelse
                            <!-- Job Apply Modal -->

                           




                        </div>
                    </div>

                </div>
                <!-- tab content end -->

            </div>
        </section>
        <!-- pricing section end -->



    </main>
@endsection
@push('scripts')
    <script>


    </script>
@endpush