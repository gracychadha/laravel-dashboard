@extends("website.layout.master-layout")
@section("title", " Terms & Conditions | Diagnoedge")
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
                                <h1>Terms & Conditions</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
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

        @php
            $termsContent = \App\Models\TermsCondition::first()
        @endphp
        <!-- breadcrumb section end -->
        <div class="container my-4 pt-30 pb-30">
            @if($termsContent)
                <div class="section-title-area">
                    <div class="section-title wow fadeInLeft" data-wow-delay=".2s">
                        <span class="sub-title">{{ $termsContent->sub_title }}</span>
                        <strong class="d-block fs-4 mt-2">{{ $termsContent->main_title }}</strong>
                    </div>
                </div>

                <div class="container">
                    {!! $termsContent->description !!}
                </div>
            @else
                <h4 class="text-center">No content to show</h4>
            @endif
        </div>

    </main>
@endsection