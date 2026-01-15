@extends("website.layout.master-layout")
@section("title", $package->title)

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .smooth-card:hover {
            transform: translateY(-4px);
            transition: 0.3s;
        }
    </style>
@endpush

@section("content")
    <main class="bg-light min-vh-100 py-5">

        {{-- Breadcrumb --}}
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

        <div class="container py-5">

            {{-- HEADER SECTION --}}
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 smooth-card mb-5">
                <div class="d-flex align-items-start gap-4 ">
                    <img src="{{ $package->icon ? Storage::url($package->icon) : asset('assets/images/services/icon-service-1.png') }}"
                        class="rounded" style="width:100px; height:100px; object-fit:contain;">

                    <div>
                        <h3 class="fw-bold">{{ $package->title }}</h3>

                        @if($package->description)
                            <p class="text-muted">{!! $package->description !!}</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- FETCH PARAMETERS --}}
            @php
                $parameterIds = is_string($package->parameter_id)
                    ? json_decode($package->parameter_id, true)
                    : (is_array($package->parameter_id) ? $package->parameter_id : []);

                $parameters = \App\Models\Parameter::whereIn('id', $parameterIds)->get();
               
            @endphp
  
            {{-- PARAMETERS --}}
            <h4 class="fw-bold mb-4">Related Tests ({{ count($parameters) }})</h4>

            <div class="row gy-4">

                @foreach($parameters as $param)
                    <div class="col-md-6 col-lg-3">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100 smooth-card">

                            {{-- Parameter Title --}}
                            <h6 class="fw-bold mb-2"><a href="{{ route('parameter-detail', $param->slug ?? Str::slug($param->title)) }}">{{ $param->title }}</a></h6>

                            {{-- Price --}}
                            <p class="fw-semibold text-success fs-5 mb-2">
                                ₹ {{ number_format($param->price ?? 0) }}
                            </p>

                            {{-- Button --}}
                            <a href="{{ route('parameter-detail', $param->slug ?? Str::slug($param->title)) }}"
                                class="theme-button style-1">
                                <span data-text="Add To Cart">Add To Cart</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </main>
@endsection