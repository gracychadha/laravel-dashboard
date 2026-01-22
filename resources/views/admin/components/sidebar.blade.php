<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                @can('view-dashboard')
                    <a class="ai-icon" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                @endcan
            </li>







            {{-- CMS --}}
            @canany(['manage-ads', 'manage-blog-categories', 'manage-blogs', 'manage-slider', 'manage-about', 'manage-why-choose-us', 'manage-accreditations', 'manage-gallery', 'manage-testimonials', 'manage-know-us', 'manage-counter', 'manage-what-makes-different', 'manage-partners', 'manage-partner-images', 'manage-why-partners', 'manage-corporate-benefits', 'manage-corporate-services', 'manage-job-career', 'manage-privacy-policy', 'manage-terms-conditions'])
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-layer-1"></i>
                        <span class="nav-text">CMS</span>
                    </a>
                    <ul aria-expanded="false">
                        {{-- @can('manage-ads')
                        <li><a class="" href="{{ route('site-images.index') }}" aria-expanded="false">Ads & Popup</a></li>
                        @endcan --}}

                        @canany(['manage-blog-categories', 'manage-blogs'])
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Blogs</a>
                                <ul class="" aria-expanded="false">
                                    @can('manage-blog-categories')
                                        <li><a href="{{ route('blog-categories.index') }}">Blog category</a></li>
                                    @endcan
                                    @can('manage-blogs')
                                        <li><a href="{{ route('blogs.index') }}">Blog Details</a></li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany

                        @canany(['manage-slider', 'manage-about', 'manage-why-choose-us', 'manage-accreditations',
                        'manage-gallery', 'manage-testimonials'])
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Home Page</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('sliderimage.index') }}">Slider</a></li>
                                <li><a href="{{ route('about-section.index') }}">About Us</a></li>
                                <li><a href="{{ route('act-about-section.index') }}"> About Act Section</a></li>
                                <li><a href="{{ route('how-works.index') }}">How We Works</a></li>
                                <li><a href="{{ route('whychoose-section.index') }}">Why Choose Us</a></li>
                                <li><a href="{{ route('about-two-section.index') }}">About Two </a></li>
                                <li><a href="{{ route('case-study.index') }}">Case Study</a></li>
                                <li><a href="{{ route('network.index') }}">Network Section</a></li>
                               
                              
                               

                            </ul>
                        </li>
                        @endcanany
                         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">About Page</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('value.index') }}">Values Section</a></li>
                                <li><a href="{{ route('about-faqs.index') }}">Faq Section</a></li>
                               
                            </ul>
                        </li>
                         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Commitment Page</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('commitment-one.index') }}">Commitment 1</a></li>
                                <li><a href="{{ route('commitment-two.index') }}">Commitment 2</a></li>
                                <li><a href="{{ route('commitment-three.index') }}">Commitment 3</a></li>
                                <li><a href="{{ route('commitment-four.index') }}">Commitment 4</a></li>
                               
                            </ul>
                        </li>
                        

                        {{-- @canany(['manage-know-us', 'manage-counter', 'manage-what-makes-different'])
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">About Us Page</a>
                            <ul aria-expanded="false">
                                @can('manage-know-us')
                                <li><a href="{{ route('about-section-two.index') }}">Know Us Better</a></li>
                                @endcan
                                @can('manage-counter')
                                <li><a href="{{ route('counters.index') }}">Counter</a></li>
                                @endcan
                                @can('manage-what-makes-different')
                                <li><a href="{{ route('admin-about-makes.index') }}">What Makes Us Different</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany



                        @canany(['manage-corporate-benefits', 'manage-corporate-services'])
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Corporate Page</a>
                            <ul aria-expanded="false">
                                @can('manage-corporate-benefits')
                                <li><a href="{{ route('admin-corporate.index') }}">Benefits</a></li>
                                @endcan
                                @can('manage-corporate-services')
                                <li><a href="{{ route('admin-corporate-service.index') }}">Services</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany--}}


                        @can('manage-job-career')
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Job Career</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('jobcareer.index') }}">Add Vacancy</a></li>
                                </ul>
                            </li>
                        @endcan

                        @can('manage-partner-images')
                            <li><a href="{{ route('partners.index') }}" aria-expanded="false">Partners</a></li>
                        @endcan
                        @can('manage-testimonials')
                            <li><a href="{{ route('testimonials.index') }}" aria-expanded="false">Testimonials</a></li>
                        @endcan
                        @can('manage-gallery')
                            <li><a href="{{ route('faqs.index') }}" aria-expanded="false">Faq</a></li>
                        @endcan
                       
                            <li><a class="" href="{{ route('client-resources.index') }}" aria-expanded="false">Client Resources</a></li>
                            <li><a class="" href="{{ route('staff-resources.index') }}" aria-expanded="false">Staff Resources</a></li>
                       
                        @can('manage-privacy-policy')
                            <li><a class="" href="{{ route('admin-privacy-policy.index') }}" aria-expanded="false">Privacy
                                    Policy</a></li>
                        @endcan

                        @can('manage-terms-conditions')
                            <li><a class="" href="{{ route('admin-terms-condition.index') }}" aria-expanded="false">Terms
                                    Conditions</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            {{-- for who we serve --}}
         
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-briefcase"></i>  
                        <span class="nav-text">Who we Serve</span>
                    </a>
                    <ul aria-expanded="false">
                      
                         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">NDIS Page</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('ndis-about.index') }}">About Section</a></li>
                                <li><a href="{{ route('ndis-service.index') }}">Services Section</a></li>
                                <li><a href="{{ route('ndis-support.index') }}">Who We Support </a></li>
                            </ul>
                        </li>
                         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Aged Care Page</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('aged-about.index') }}">About Section</a></li>
                                <li><a href="{{ route('aged-benefit.index') }}">Benefit Section</a></li>
                                <li><a href="{{ route('aged-service.index') }}">Service Section </a></li>
                            </ul>
                        </li>
                        <li><a class="" href="#" aria-expanded="false">NIISQ Page</a></li>
                        <li><a class="" href="#" aria-expanded="false">DVA Page</a></li>
  

                    </ul>
                </li>
          

            @can('manage-profile')
                <li><a href="{{ route('profile') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        <span class="nav-text">My Profile</span>
                    </a>
                </li>
            @endcan

            @canany(['manage-general-settings', 'manage-system-settings', 'manage-seo-settings', 'manage-website-settings'])
                <li><a href="javascript:void(0)" class="has-arrow ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('manage-general-settings')
                            <li><a href="{{ route('general-setting') }}">General Settings</a></li>
                        @endcan
                        @can('manage-system-settings')
                            <li><a href="{{ route('system-setting') }}">System Setting</a></li>
                        @endcan
                        @can('manage-seo-settings')
                            <li><a href="{{ route('seo-setting.index') }}">SEO Setting</a></li>
                        @endcan
                        @can('manage-website-settings')
                            <li><a href="{{ route('website-setting') }}">Website Settings</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            @canany(['manage-doctors'])
                <li><a href="javascript:void(0);" class="ai-icon has-arrow" aria-expanded="false">
                        <i class="flaticon-381-id-card-4"></i>
                        <span class="nav-text">Staff</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('manage-doctors')
                            <li><a href="{{ route('admin-staff.index') }}">Staff</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            @canany(['manage-users', 'manage-roles', 'manage-permissions'])
                <li><a href="javascript:void(0);" class="ai-icon has-arrow" aria-expanded="false">
                        <i class="flaticon-381-id-card"></i>

                        <span class="nav-text">User Directory</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('manage-users')
                            <li><a href="{{ route('admin-register.index') }}">Add User</a></li>
                        @endcan
                        @can('manage-roles')
                            <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
                        @endcan
                        @can('manage-permissions')
                            <li><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            <li>
                <div class="custom-btn-logout">
                    <a href="#" class="dropdown-item ai-icon"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-white" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ms-2">Logout </span>
                    </a>
                </div>
            </li>
            <div class=" mt-2">
                <p class="p-2 text-center">
                    Admin Panel Version <span class="text-theme">1.0.0</span> <br>
                    Last Updated: <span class="text-theme">Dec, 2026 </span>
                </p>
            </div>
        </ul>
    </div>
</div>