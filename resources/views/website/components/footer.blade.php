<!-- footer start -->

<footer class="footer footer-1" data-img-src="{{ asset("assets/images/footer/footer-1-1.png") }}">
    <!-- footer top start -->
    <div class="footer-top">
        <div class="container-fluid">
            <!-- footer top wrap start -->
            <div class="footer-top-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <!-- footer logo start -->
                        <div class="footer-logo wow fadeInUp" data-wow-delay=".2s">
                            <a href="{{ route("home") }}">
                                <figure>
                                    <img src="{{ $settings->white_logo   ? asset('storage/' . $settings->white_logo   ) : asset('assets/images/logo/diagno-white.png') }}" alt="footer logo">
                                </figure>
                            </a>
                        </div>
                        <!-- footer logo end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- footer contact info start -->
                        <div class="footer-contact-info wow fadeInUp" data-wow-delay=".3s">
                            <div class="footer-contact-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="footer-contact-content">
                                <span>Have Any Question?</span>
                                <a href="tel:{{ str_replace(' ', '', $settings->phone1 ?? '+91 90909 90909') }}"
                                    target="_blank">{{ $settings->phone1 ?? '+91 90909 90909' }}</a>
                            </div>
                        </div>
                        <!-- footer contact info end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- footer contact info start -->
                        <div class="footer-contact-info wow fadeInUp" data-wow-delay=".4s">
                            <div class="footer-contact-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="footer-contact-content">
                                <span>Send Email</span>
                                <a href="mailto:{{ $settings->email ?? 'info@diagnolabs.com' }}">{{ $settings->email ??
                                    'info@diagnolabs.com' }}</a>
                            </div>
                        </div>
                        <!-- footer contact info end -->
                    </div>
                </div>
            </div>
            <!-- footer top wrap end -->
        </div>
    </div>
    <!-- footer top end -->
    <!-- footer bottom start -->
    <div class="footer-bottom">
        <div class="container-fluid">
            <!-- footer widget wrap start -->
            <div class="footer-widget-wrap">
                <div class="row justify-content-center ">
                    <div class="col-xl-4 col-lg-12">
                        <!-- footer widget start -->
                        <div class="footer-widget footer-widget-about wow fadeInUp" data-wow-delay=".2s">
                            <p align="justify">we are dedicated to delivering accurate, reliable, and timely diagnostic
                                services. With
                                advanced equipment and a team of skilled professionals, we ensure precise testing and
                                quality care to support better health outcomes for every patient.</p>
                            <!-- footer social icon start -->
                            <div class="footer-social-icon">
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
                            <!-- footer social icon end -->
                        </div>
                        <!-- footer widget end -->
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <!-- footer widget start -->
                        <div class="footer-widget footer-widget-quick-links wow fadeInUp" data-wow-delay=".3s">
                            <h3 class="footer-widget-title">Quick Links</h3>
                            <!-- widget link start -->
                            <div class="widget-link">
                                <ul class="link">

                                    <li>
                                        <a href="{{ route('about-us') }}"><i class="fa-solid fa-chevron-right"></i>
                                            About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('doctors') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Doctors</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('our-partners') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Our Partners</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('corporate') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Corporate</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('career') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Careers</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- widget link end -->
                        </div>
                        <!-- footer widget end -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- footer widget start -->
                        <div class="footer-widget footer-widget-services wow fadeInUp" data-wow-delay=".4s">
                            <h3 class="footer-widget-title">Important Links</h3>
                            <!-- widget link start -->
                            <div class="widget-link">
                                <ul class="link">
                                    <li>
                                        <a href="{{ route('contact-us') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('appointment') }}"><i class="fa-solid fa-chevron-right"></i>
                                            Book Appointment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('privacy-policy') }}"><i
                                                class="fa-solid fa-chevron-right"></i>
                                            Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('terms-conditions') }}"><i
                                                class="fa-solid fa-chevron-right"></i>
                                            Terms &amp; Conditions</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- widget link end -->
                        </div>
                        <!-- footer widget end -->
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- footer widget start -->
                        <div class="footer-widget footer-widget-opening-hours wow fadeInUp" data-wow-delay=".5s">
                            <h3 class="footer-widget-title">Opening Hours</h3>
                            <!-- widget opening hours start -->
                            <div class="widget-opening-hours">
                                <ul class="opening-list">
                                    <li>
                                        <p>Monday - Friday: <span class="time">8:00am - 4:00pm</span></p>
                                    </li>
                                    <li>
                                        <p>Saturday: <span class="time">8:00am - 12:00pm</span></p>
                                    </li>
                                    <li>
                                        <p>Sunday: <span class="time">8:00am - 10:00am</span></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- widget opening hours end -->
                        </div>
                        <!-- footer widget end -->
                    </div>
                </div>
            </div>
            <!-- footer widget wrap end -->
        </div>
    </div>
    <!-- footer bottom end -->
    <!-- footer copyright start -->
    <div class="footer-copyright ">
        <div class="container-fluid">
            <!-- footer copyright wrap start -->
            <div class="footer-copyright-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- footer copyright start -->
                        <div class="copyright-text wow fadeInUp" data-wow-delay=".2s">
                            <p class="m-0 text-center">&copy; <?= date('Y') ?> <a href="{{ route('home') }}"> Diagnoedge
                                </a> |
                                Developed by <a href="https://vibrantick.in/" target="_blank">Vibrantick Infotech
                                    Solutions </a></p>
                        </div>
                        <!-- footer copyright end -->
                    </div>

                </div>
            </div>
            <!-- footer copyright wrap end -->
        </div>
    </div>


    <!-- footer copyright end -->
    <div class="sticky-footer sticky">
        <div class="container">
            <!-- footer copyright wrap start -->
            <div class="footer-copyright-wrap ">
                <div class="row align-items-center">
                    <div class=" text-center">
                        <p>Do you have any queries

                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#popupCallModal"
                                class=" sticky-btn theme-button style-1 sticky-f-btn" aria-label="Get a Call Back">
                                <span data-text="Get a Call Back">Get a Call Back</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            or Call us now at

                            <a href="tel:{{ str_replace(' ', '', $settings->phone1 ?? '+91 90909 90909') }}" class="theme-button style-1 sticky-btn" aria-label="{{ $settings->phone1 ?? '+91 90909 90909' }}" target="_blank">
                                <span
                                    data-text="{{ $settings->phone1 ?? '+91 90909 90909' }}">{{ $settings->phone1 ?? '+91 90909 90909' }}</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- footer copyright wrap end -->
            {{-- <!-- footer copyright wrap start -->
            <div class="footer-copyright-wrap d-none d-sm-block">
                <div class="row align-items-center">
                    <div class=" text-center">
                        <p>Do you have any queries <button data-bs-toggle="modal" data-bs-target="#popupCallModal"> Get
                                a Call back Now</button><br> or Call us now at
                            <button> <a href="tel:+919876784545" target="_blank">+91 987 678 4545</a></button>
                        </p>
                    </div>
                </div>
            </div>
            <!-- footer copyright wrap end --> --}}
        </div>
    </div>
</footer>
<!-- footer end -->