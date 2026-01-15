@extends("website.layout.master-layout")
@section("title", "Blog Details | Diagnoedge")
@section("content")
    <!-- main start -->
    <main class="main">
        <!-- breadcrumb section start -->
        <section class="breadcrumb-section" data-img-src="{{  asset("assets/images/breadcrumb/breadcrumb.png") }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb content start -->
                        <div class="breadcrumb-content">
                            <!-- breadcrumb title start -->
                            <div class="breadcrumb-title wow fadeInUp" data-wow-delay=".2s">
                                <h1>Blog Details</h1>
                            </div>
                            <!-- breadcrumb title end -->
                            <!-- nav start -->
                            <nav aria-label="breadcrumb" class="wow fadeInUp" data-wow-delay=".3s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route("our-blogs") }}">Our Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                                </ol>
                            </nav>
                            <!-- nav end -->
                        </div>
                        <!-- breadcrumb content end -->
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <img class="breadcrumb-shape-one" src="{{ asset("assets/images/shape/shape-4.png") }}"
                    alt="breadcrumb shape one">
                <img class="breadcrumb-shape-two" src="{{ asset("assets/images/shape/square-blue.png") }}"
                    alt="breadcrumb shape two">
                <img class="breadcrumb-shape-three" src="{{ asset("assets/images/shape/plus-orange.png") }}"
                    alt="breadcrumb shape three">
            </div>
        </section>
        <!-- breadcrumb section end -->

        <!-- blog single section start -->
        <section class="blog-single-section pt-100 md-pt-80 pb-100 md-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- blog single post start -->
                        <div class="blog-single-post">
                            <!-- blog block one start -->
                            <div class="blog-block-one">
                                <!-- blog single media start -->
                                <div class="blog-single-media">
                                    <figure class="image-anime">
                                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}"
                                            alt="blog single image">
                                    </figure>
                                </div>
                                <!-- blog single media end -->
                                <!-- blog single contain start -->
                                <div class="blog-single-contain">
                                    <!-- blog entry content start -->
                                    <div class="blog-entry-content">
                                        <ul class="blog-single-meta d-flex justify-content-between">
                                            <li>
                                                <a href="#">
                                                    <i class="fa-solid fa-user"></i>
                                                    <span>By: {{ $blog->author }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}</span>
                                            </li>
                                            
                                            
                                        </ul>
                                        <h2>{{ $blog->title }}</h2>

                                        <p align="justify">  
                                            {!! $blog->description !!}
                                        </p>
                                        <div class="blog-quote">
                                            <div class="blog-quote-icon">
                                                <i class="fa-solid fa-quote-right"></i>
                                            </div>
                                            <p>
                                                “{{ $blog->title }}” - {{ $blog->author }}
                                            </p>
                                        </div>
                                       
                                        

                                    
                                      
                                    </div>
                                    <!-- blog entry content end -->
                                    @php
                                    $categoryNames = App\Models\BlogCategory::whereIn('id', $blog->category_ids)->pluck('name');

                                    @endphp
                                    <!-- share links start -->
                                    <div class="share-links">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <!-- share tag start -->
                                                <div class="share-tag">
                                                    <span class="share-links-title"> Category's</span>
                                                    <ul class="tagcloud">
                                                        @foreach ($categoryNames as $cat )
                                                         <li><a href="">{{ $cat }}</a></li>
                                                        @endforeach
                                                       
                                                      
                                                    </ul>
                                                </div>
                                                <!-- share tag end -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- share links end -->
                                </div>
                               
                            </div>
                            <!-- blog block one end -->
                            
                        </div>
                        <!-- blog single post end -->
                    </div>
                    {{-- blog sidebar start --}}
                    @include("website.components.blog-sidebar")
                    {{-- blog sidebar end --}}
                </div>
            </div>
        </section>
        <!-- blog single section end -->
    </main>
    <!-- main end -->

@endsection