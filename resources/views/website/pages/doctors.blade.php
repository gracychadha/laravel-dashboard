@extends("website.layout.master-layout")
@section("title", "Doctors | Diagnoedge")
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
                                <h1>Doctor</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Doctor</li>
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

        <!-- doctor section start -->
        <section class="doctor-section-3 pt-50 md-pt-30 pb-50 md-pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title area start -->
                        <div class="section-title-area">
                            <div class="section-title">
                                <span class="sub-title">Our Doctor</span>
                                <h2>Meet Our expert Eye Specialists</h2>
                            </div>
                            <div class="section-title-content">
                                <p align="justify">Our team at DiagnoEdge Lab is led by experienced and dedicated medical
                                    professionals who
                                    believe that accurate diagnosis is the first step toward effective treatment. With years
                                    of expertise in pathology and laboratory medicine, our doctors ensure every test is
                                    performed with precision, care, and the highest quality standards.</p>
                            </div>
                        </div>
                        <!-- section title area end -->
                    </div>
                </div>
                <div class="row">
                    @forelse ($doctors as $doc)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- doctor items start -->
                            <div class="doctor-items">
                                <!-- doctor image start -->
                                <div class="doctor-image">
                                    <a href="#">
                                        <figure class="image-anime">
                                            <img src="{{ asset('uploads/'.$doc->image) }}" alt="doctors image one">
                                        </figure>
                                    </a>
                                    {{-- <div class="doctor-share">
                                        <ul class="social-icon social-vertical">
                                            <li>
                                                <a href="#" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                                            </li>
                                        </ul>
                                        
                                    </div> --}}
                                    {{-- <div class="doctor-review">
                                        <p><i class="fas fa-star active"></i> 4.9</p>
                                    </div> --}}
                                </div>
                                <!-- doctor image end -->
                                <!-- doctor content start -->
                                <div class="doctor-content">
                                    <h3><a href="#">{{ $doc->fullname }}</a></h3>
                                    <p>{{ $doc->designation }} | {{ $doc->specialization }}</p>
                                </div>
                                <!-- doctor content end -->
                            </div>
                            <!-- doctor items end -->
                        </div>
                        @empty
                        <div class="text-center w-100 py-5">
                                <h4>No Doctor images to show</h4>
                            </div>
                    @endforelse
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- pagination start -->
                        <div class="pagination justify-content-center mt-0">
                            <nav aria-label="page navigation">
                                <ul class="page-list">
                                    <li><a aria-current="page" class="page-numbers current" href="#">1</a></li>
                                    <li><a class="page-numbers" href="#">2</a></li>
                                    <li><a class="next page-numbers" href="#">Next Page</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- doctor section end -->


    </main>
    <!-- main end -->
@endsection