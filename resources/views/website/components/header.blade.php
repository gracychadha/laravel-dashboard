<!-- preloader start -->
{{-- <div class="preloader">
    <div class="preloader-icon">
        <img src="{{ asset(" assets/images/loader.svg") }}" alt="loader image">
    </div>
    <div class="preloader-text">
        <p>d</p>
        <p>i</p>
        <p>a</p>
        <p>g</p>
        <p>n</p>
        <p>o</p>
        <p>e</p>
        <p>d</p>
        <p>g</p>
        <p>e</p>
    </div>
</div> --}}
<!-- preloader end -->

<!-- back to top start -->
<button id="back-top" class="back-to-top" aria-label="back to top">
    <i class="fa-solid fa-chevron-up"></i>
</button>
<!-- back to top end -->

<!-- mouse cursor start -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- mouse cursor end -->

<!-- offcanvas sidebar start -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvas-sidebar"
    aria-labelledby="offcanvas-sidebar">
    <!-- offcanvas header start -->
    <div class="offcanvas-header">
        <!-- offcanvas logo start -->
        <div class="offcanvas-logo">
            <figure>
                <img src="{{ $settings->black_logo ? asset('storage/' . $settings->black_logo) : asset('assets/images/logo/diagno-logo.png') }}" alt="offcanvas logo">
            </figure>
        </div>
        <!-- offcanvas logo emd -->
        <!-- offcanvas close start -->
        <button type="button" class="offcanvas-close bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fa-solid fa-xmark"></i></button>
        <!-- offcanvas close end -->
    </div>
    <!-- offcanvas header end -->
    <!-- offcanvas body start -->
    <div class="offcanvas-body">
        <!-- menu outer start -->
        <div class="mobile-menu">
            <!-- Here menu will come automatically via javascript / same menu as in header -->
        </div>
        <!-- menu outer end -->
        <!-- offcanvas about start -->
        <div class="offcanvas-about d-none d-xl-block">
            <p align="justify">There are many variations of passages available sure there majority have suffered
                alteration in some form
                by inject humour or randomised words which don't look even slightly believable.</p>
        </div>
        <!-- offcanvas about end -->
        <!-- offcanvas contact start -->
        <div class="offcanvas-contact">
            <!-- widget-contact start -->
            <div class="widget widget-contact">
                <!-- widget title start -->
                <div class="widget-title">
                    <h3>Contact Info</h3>
                </div>
                <!-- widget title end -->
                <!-- widget content start -->
                <div class="widget-content">
                    <!-- offcanvas cta item start -->
                    <div class="offcanvas-cta-item">
                        <!-- offcanvas cta list start -->
                        <div class="offcanvas-cta-list">
                            <div class="offcanvas-cta-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="offcanvas-cta-content">
                                <p>{{ $settings->location ?? 'Batlana , Zirakpur' }}</p>
                            </div>
                        </div>
                        <!-- offcanvas cta list end -->
                        <!-- offcanvas cta list start -->
                        <div class="offcanvas-cta-list">
                            <div class="offcanvas-cta-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="offcanvas-cta-content">
                                <a href="mailto:{{ $settings->email ?? 'info@diagnoedgelabs.com' }}" target="_blank">{{
                                    $settings->email ?? 'info@diagnoedgelabs.com' }}</a>
                            </div>
                        </div>
                        <!-- offcanvas cta list end -->
                        <!-- offcanvas cta list start -->
                        <div class="offcanvas-cta-list">
                            <div class="offcanvas-cta-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="offcanvas-cta-content">
                                <a href="tel:{{ str_replace(' ', '', $settings->phone1 ?? '+91 90909 90909') }}"
                                    target="_blank">{{ $settings->phone1 ?? '+91 90909 90909' }}</a>
                            </div>
                        </div>
                        <!-- offcanvas cta list end -->
                    </div>
                    <!-- offcanvas cta item end -->
                </div>
                <!-- widget content end -->
            </div>
            <!-- widget-contact end -->
        </div>
        <!-- offcanvas contact end -->
        <!-- offcanvas button wapper start -->
        <div class="offcanvas-button-wapper">
            <a href="{{ route('appointment') }}" class="theme-button style-1" aria-label="Book Appointment">
                <span data-text="Book Appointment">Book Appointment</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <!-- offcanvas button wapper end -->
        <!-- offcanvas social start -->
        <div class="offcanvas-social">
            <!-- widget social media start -->
            <div class="widget widget-social-media">
                <!-- widget content start -->
                <div class="widget-content">
                    <ul class="social-icon">

                        @if(!empty($socials['facebook']))
                            <li>
                                <a href="{{ $socials['facebook'] }}" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                        @endif

                        @if(!empty($socials['instagram']))
                            <li>
                                <a href="{{ $socials['instagram'] }}" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        @endif

                        @if(!empty($socials['linkedin']))
                            <li>
                                <a href="{{ $socials['linkedin'] }}" target="_blank">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                        @endif

                        @if(!empty($socials['twitter']))
                            <li>
                                <a href="{{ $socials['twitter'] }}" target="_blank">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- widget content end -->
            </div>
            <!-- widget social media end -->
        </div>
        <!-- offcanvas-social end -->
    </div>
    <!-- offcanvas body end -->
</div>
<!-- offcanvas sidebar end -->

<!-- header start -->
<header class="header header-1">
    <!-- header top start -->
    <div class="header-top d-none d-xl-block">
        <div class="container-fluid">
            <div class="row justify-content-center justify-content-lg-between align-items-center">
                <div class="col-auto">
                    <!-- header top left start -->
                    <div class="header-top-left">
                        <!-- header contact info -->
                        <div class="header-contact-info">
                            <ul>
                                <li>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{ $settings->location ?? 'Batlana , Zirakpur' }}</p>
                                </li>
                                <li>
                                    <p><i class="fa-solid fa-envelope"></i> {{ $settings->email ??
                                        'info@diagnoedgelabs.com' }}</p>
                                </li>
                                <li>
                                    <p><i class="fa-solid fa-clock"></i> Mon - Fri 8:00 - 6:30</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- header top left end -->
                </div>
                <div class="col-auto">
                    <!-- header top right start -->
                    <div class="header-top-right">
                        <!-- header search -->
                        <div class="header-search">
                            <form action="#">
                                <div class="form-group mb-0">
                                    <div class="form-floating field-inner">
                                        <input id="already_know2" name="search" class="form-control white-field"
                                            placeholder="Keywords here...." type="text" autocomplete="off">
                                        <div id="searchResult2" class=" "></div>
                                        <label for="search">Search </label>
                                        <button type="submit" aria-label="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- header cart -->
                        <div class="header-cart">
                            <a href="#">
                                cart
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>02</span>
                            </a>
                        </div>
                    </div>
                    <!-- header top right end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header lower start -->
    <div class="header-lower">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between g-0">
                <div class="col-12">
                    <!-- header content start -->
                    <div class="header-content d-flex justify-content-between align-items-center">
                        <!-- logo box start -->
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <figure>
                                        <img src="{{ $settings->black_logo ? asset('storage/' . $settings->black_logo) : asset('assets/images/logo/diagno-logo.png') }}" alt="header logo">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <!-- logo box end  -->

                        <!-- header navigation start -->
                        <div class="header-navigation d-flex align-items-center">
                            <!-- main menu -->
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">Home</a>

                                        </li>
                                        <li>
                                            <a href="{{ route('about-us') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('doctors') }}">Doctors</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('our-partners') }}">Our Partner</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('corporate') }}">Corporate</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('career') }}">Careers</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('our-blogs') }}">Our Blogs </a>

                                        </li>

                                        <li>
                                            <a href="{{  route('contact-us') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- header navigation end -->

                        <!-- header right start -->
                        <div class="header-right d-flex align-items-center gap-lg-4 gap-3">
                            <!-- header button -->
                            <div class="header-button">
                                <a href="{{ route('appointment') }}" class="theme-button style-1"
                                    aria-label="Book Appointment">
                                    <span data-text="Book Appointment">Book Appointment</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <!-- header sidebar  -->
                            <div class="header-sidebar">
                                <a class="sidebar-toggler color-one" data-bs-toggle="offcanvas"
                                    href="#offcanvas-sidebar" aria-label="sidebar toggler" role="button"
                                    aria-controls="offcanvas-sidebar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <!-- header right end -->
                    </div>
                    <!-- header content end -->
                </div>
            </div>
        </div>
    </div>

    <!-- header lower end -->
</header>

<!-- header end-->