@php
    $testimonials = \App\Models\Testimonials::where('status', 'active')->latest()->get();
@endphp

@if($testimonials->count() > 0)
<!-- testimonials section start -->
<section class="testimonials-section-3 py-5" style="background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section title start -->
                <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
                    <span class="sub-title">Our Testimonials</span>
                    <h2>What Our Patients Say About Us</h2>
                    <p class="text-muted lead">Real experiences from patients who trusted Diagnoedge for accurate diagnostics and caring service.</p>
                </div>
                <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- testimonials slider three start -->
                <div class="swiper testimonials-slider-two">
                    <!-- swiper wrapper start -->
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonials-item">
                                <div class="testimonials-content">
                                    <div class="testimonials-content-item">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="testimonials-rating">
                                                <i class="fa-solid fa-star active" style="color:#FFD700;"></i>
                                                <i class="fa-solid fa-star active" style="color:#FFD700;"></i>
                                                <i class="fa-solid fa-star active" style="color:#FFD700;"></i>
                                                <i class="fa-solid fa-star active" style="color:#FFD700;"></i>
                                                <i class="fa-solid fa-star active" style="color:#FFD700;"></i>
                                            </div>
                                            <div class="testimonials-quote">
                                                <figure>
                                                    <img src="{{ asset('assets/images/testimonials/quote.png') }}" alt="quote">
                                                </figure>
                                            </div>
                                        </div>

                                        <p class="desc text-justify">
                                            {!! nl2br(e($testimonial->message)) !!}
                                        </p>
                                    </div>

                                    <div class="testimonials-author">
                                        <div class="testimonials-author-image">
                                            <figure>
                                                @if($testimonial->image)
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                                         alt="{{ $testimonial->name }}"
                                                         class="img-fluid"
                                                         onerror="this.src='{{ asset('assets/images/avatar/avatar-default.jpg') }}'"
                                                         loading="lazy">
                                                @else
                                                    <img src="{{ asset('assets/images/avatar/avatar-default.jpg') }}" 
                                                         alt="{{ $testimonial->name }}"
                                                         class="img-fluid"
                                                         loading="lazy">
                                                @endif
                                            </figure>
                                        </div>
                                        <div class="testimonials-author-content">
                                            <h4>{{ $testimonial->name }}</h4>
                                            <p>{{ $testimonial->designation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- swiper wrapper end -->
                    <!-- swiper actions start -->
                    <div class="swiper-actions text-center">
                        <div class="dot"></div>
                    </div>
                    <!-- swiper actions end -->
                </div>
                <!-- testimonials slider three end -->
            </div>
        </div>
    </div>
</section>
<!-- testimonials section end -->
@else
<!-- Fallback when no active testimonials -->
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fas fa-comments fa-3x mb-3 d-block"></i>
                <h4>No testimonials available</h4>
                <p class="mb-0">Be the first to share your experience!</p>
            </div>
        </div>
    </div>
</div>
@endif