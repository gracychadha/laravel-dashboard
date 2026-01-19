<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\WebsiteSetting;
use App\Http\Controllers\SystemSetting;
use App\Http\Controllers\CaptchaSettingController;
use App\Http\Controllers\HealthRiskController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutSectionTwoController;
use App\Models\Gallery;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\SubparameterController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\SiteImagesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\SliderImageController;
use App\Http\Controllers\WhyChooseUsSectionController;
use App\Http\Controllers\JobCareerController;
use App\Http\Controllers\CorporateBenefitController;
use App\Http\Controllers\CorporateServiceController;
use App\Http\Controllers\AboutMakeController;
use App\Http\Controllers\PartnerAboutController;
use App\Http\Controllers\WhyPartnerController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\SeoPageController;
use App\Http\Controllers\SearchController;
use App\Models\Parameter;
use App\Models\Test;
use App\Models\PopularTests;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\JobCareerApplicationController;
use App\Http\Controllers\PopularTestController;
use App\Http\Controllers\StaffController;




// for search
Route::get('/search-all', [SearchController::class, 'searchAll'])->name('search.all');




// FOR FETCH DATA IN FRONTEND
Route::get('/doctors', [DoctorController::class, 'frontendDoctors'])->name('doctors');
Route::get('/', [GalleryController::class, 'frontendGallery'])->name('welcome');



// ALL THE ROUTES FOR BACKEND DASHBOARD


Route::get('/dashboard', function () {

    $totalLeads = \App\Models\Contact::count();
    $appointmentLeads = \App\Models\Appointment::count();
    $doctorCount = \App\Models\Doctor::count();
    $applicationLeads = \App\Models\JobCareerApplication::count();
    $doctors = \App\Models\Doctor::all();
    $users = \App\Models\User::all();

    // CONTACT LEADS MONTHLY
    $contact = \App\Models\Contact::select(
        DB::raw('COUNT(id) as count'),
        DB::raw('MONTHNAME(created_at) as month'),
        DB::raw('MONTH(created_at) as month_no')
    )
        ->groupBy('month', 'month_no')
        ->orderBy('month_no')
        ->get();

    // APPOINTMENT MONTHLY
    $appointment = \App\Models\Appointment::select(
        DB::raw('COUNT(id) as count'),
        DB::raw('MONTHNAME(created_at) as month'),
        DB::raw('MONTH(created_at) as month_no')
    )
        ->groupBy('month', 'month_no')
        ->orderBy('month_no')
        ->get();

    // JOB APPLICATION MONTHLY
    $jobs = \App\Models\JobCareerApplication::select(
        DB::raw('COUNT(id) as count'),
        DB::raw('MONTHNAME(created_at) as month'),
        DB::raw('MONTH(created_at) as month_no')
    )
        ->groupBy('month', 'month_no')
        ->orderBy('month_no')
        ->get();
    // BOOKING APPLICATION MONTHLY
    $booking = \App\Models\Booking::select(
        DB::raw('COUNT(id) as count'),
        DB::raw('MONTHNAME(created_at) as month'),
        DB::raw('MONTH(created_at) as month_no')
    )
        ->groupBy('month', 'month_no')
        ->orderBy('month_no')
        ->get();
    // DAILY APPOINTMENT COUNT FOR CURRENT MONTH
    $dailyAppointments = \App\Models\Appointment::select(
        DB::raw('COUNT(id) as count'),
        DB::raw('DAY(created_at) as day')
    )
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->groupBy('day')
        ->orderBy('day')
        ->get();


    // Extract labels (from one dataset — they are all sorted the same)
    $months = $appointment->pluck('month');
    // extract days + counts
    $days = $dailyAppointments->pluck('day');
    $dailyAppointmentData = $dailyAppointments->pluck('count');

    return view('admin.pages.dashboard', [
        'months' => $months,
        'contactData' => $contact->pluck('count'),
        'appointmentData' => $appointment->pluck('count'),
        'jobData' => $jobs->pluck('count'),
        'bookingData' => $booking->pluck('count'),
        'totalLeads' => $totalLeads,
        'appointmentLeads' => $appointmentLeads,
        'applicationLeads' => $applicationLeads,
        'doctorCount' => $doctorCount,
        'days' => $days,
        'dailyAppointmentData' => $dailyAppointmentData,
        'doctors' => $doctors,
        'users' => $users
    ]);
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {



    // ────────────── Tests Details ──────────────
    Route::get('/tests', [TestController::class, 'index'])->name('admin.pages.test');
    Route::post('/tests', [TestController::class, 'store'])->name('admin.tests.store');
    Route::put('/tests/{test}', [TestController::class, 'update'])->name('admin.tests.update');
    Route::delete('/tests/{test}', [TestController::class, 'destroy'])->name('admin.tests.destroy');
    Route::post('/tests/delete-selected', [TestController::class, 'deleteSelected'])
        ->name('tests.delete-selected');

    // ────────────── PARAMETERS ──────────────

    Route::get('/parameters', [ParameterController::class, 'index'])
        ->name('admin.pages.parameter');
    Route::post('/parameters', [ParameterController::class, 'store'])
        ->name('admin.parameters.store');
    Route::put('/parameters/{parameter}', [ParameterController::class, 'update'])
        ->name('admin.parameters.update');
    Route::delete('/parameters/{parameter}', [ParameterController::class, 'destroy'])
        ->name('admin.parameters.destroy');
    Route::post('/parameters/delete-selected', [ParameterController::class, 'deleteSelected'])
        ->name('parameters.delete-selected');

    // ────────────── Health Risks ──────────────
    Route::get('/health-risks', [HealthRiskController::class, 'index'])
        ->name('health-risks.index');

    Route::post('/health-risks', [HealthRiskController::class, 'store'])
        ->name('health-risks.store');

    Route::put('/health-risks/{healthRisk}', [HealthRiskController::class, 'update'])
        ->name('health-risks.update');

    Route::delete('/health-risks/{healthRisk}', [HealthRiskController::class, 'destroy'])
        ->name('health-risks.destroy');
    Route::post('/health-risks/delete-selected', [HealthRiskController::class, 'deleteSelected'])
        ->name('health-risks.delete-selected');


    // ────────────── Health Package/ sub parameter ──────────────
    Route::get('/admin-subparameters', [SubparameterController::class, 'index'])
        ->name('admin-subparameters.index');

    Route::post('/admin-subparameters', [SubparameterController::class, 'store'])
        ->name('admin-subparameters.store');

    Route::put('/admin-subparameters/{subparameter}', [SubparameterController::class, 'update'])
        ->name('admin-subparameters.update');

    Route::delete('/admin-subparameters/{subparameter}', [SubparameterController::class, 'destroy'])
        ->name('admin-subparameters.destroy');

    Route::post('/admin-subparameters/delete-selected', [SubparameterController::class, 'deleteSelected'])
        ->name('admin-subparameters.delete-selected');

    // ────────────── faqs for the health packages ──────────────


    Route::get('/faqspackages', [FaqsController::class, 'index'])->name('faqspackages.index');
    Route::post('/faqspackages', [FaqsController::class, 'store'])->name('faqspackages.store');
    Route::put('/faqspackages/{faqspackage}', [FaqsController::class, 'update'])->name('faqspackages.update');
    Route::delete('/faqspackages/{faqspackage}', [FaqsController::class, 'destroy'])->name('faqspackages.destroy');



    // ────────────── Blog Category ──────────────
    Route::get('/blog-categories', [BlogCategoryController::class, 'index'])
        ->name('blog-categories.index');

    Route::post('/blog-categories', [BlogCategoryController::class, 'store'])
        ->name('blog-categories.store');

    Route::put('/blog-categories/{blogCategory}', [BlogCategoryController::class, 'update'])
        ->name('blog-categories.update');

    Route::delete('/blog-categories/{blogCategory}', [BlogCategoryController::class, 'destroy'])
        ->name('blog-categories.destroy');


    // ────────────── Blog Posts ──────────────
    Route::get('/blogs', [BlogController::class, 'index'])
        ->name('blogs.index');

    Route::post('/blogs', [BlogController::class, 'store'])
        ->name('blogs.store');

    Route::put('/blogs/{blog}', [BlogController::class, 'update'])
        ->name('blogs.update');

    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])
        ->name('blogs.destroy');


    // ────────────── Testimonials ──────────────
    Route::get('/testimonials', [TestimonialController::class, 'index'])
        ->name('testimonials.index');

    Route::post('/testimonials', [TestimonialController::class, 'store'])
        ->name('testimonials.store');

    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])
        ->name('testimonials.update');

    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
        ->name('testimonials.destroy');


    // ────────────── FAQs ──────────────
    Route::get('/faqs', [FaqController::class, 'index'])
        ->name('faqs.index');

    Route::post('/faqs', [FaqController::class, 'store'])
        ->name('faqs.store');

    Route::put('/faqs/{faq}', [FaqController::class, 'update'])
        ->name('faqs.update');

    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])
        ->name('faqs.destroy');


    // ────────────── Partners ──────────────
    Route::get('/partners', [PartnerController::class, 'index'])
        ->name('partners.index');

    Route::post('/partners', [PartnerController::class, 'store'])
        ->name('partners.store');

    Route::put('/partners/{partner}', [PartnerController::class, 'update'])
        ->name('partners.update');

    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])
        ->name('partners.destroy');

    // ────────────── Counter ──────────────
    Route::get('/counters', [CounterController::class, 'index'])->name('counters.index');
    Route::put('/counters', [CounterController::class, 'update'])->name('counters.update');

    // ────────────── Ads and Popup image ──────────────

    Route::get('/site-images', [SiteImagesController::class, 'index'])
        ->name('site-images.index');

    Route::put('/site-images/popup', [SiteImagesController::class, 'updatePopup'])
        ->name('site-images.update-popup');

    Route::put('/site-images/ads', [SiteImagesController::class, 'updateAds'])
        ->name('site-images.update-ads');

    // ────────────── Gallery ──────────────
    Route::get('/gallery', [GalleryController::class, 'index'])
        ->name('gallery.index');

    Route::post('/gallery', [GalleryController::class, 'store'])
        ->name('gallery.store');

    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])
        ->name('gallery.update');

    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])
        ->name('gallery.destroy');



    // ────────────── About Section ──────────────
    Route::get('/about-section', [AboutSectionController::class, 'index'])->name('about-section.index');
    Route::put('/about-section', [AboutSectionController::class, 'update'])->name('about-section.update');


    // ────────────── SLIDER IMAGES ──────────────
    Route::get('/sliderimage', [SliderImageController::class, 'index'])
        ->name('sliderimage.index');
    Route::post('/sliderimage', [SliderImageController::class, 'store'])
        ->name('sliderimage.store');
    Route::put('/sliderimage/{sliderImage}', [SliderImageController::class, 'update'])
        ->name('sliderimage.update');
    Route::delete('/sliderimage/{sliderImage}', [SliderImageController::class, 'destroy'])
        ->name('sliderimage.destroy');

    // ────────────── WHY CHOOSE US SECTION ──────────────
    Route::get('/whychooseus-section', [WhyChooseUsSectionController::class, 'index'])
        ->name('whychooseus.section');

    Route::put('/whychooseus-section/{section}', [WhyChooseUsSectionController::class, 'update'])
        ->name('whychooseus.section.update');


    // ────────────── JOB CAREER (Job Openings) ──────────────
    Route::get('/jobcareer', [JobCareerController::class, 'index'])
        ->name('jobcareer.index');

    Route::get('/jobcareer/create', [JobCareerController::class, 'create'])
        ->name('jobcareer.create');

    Route::post('/jobcareer', [JobCareerController::class, 'store'])
        ->name('jobcareer.store');

    Route::get('/jobcareer/{jobCareer}/edit', [JobCareerController::class, 'edit'])
        ->name('jobcareer.edit');

    Route::put('/jobcareer/{jobCareer}', [JobCareerController::class, 'update'])
        ->name('jobcareer.update');

    Route::delete('/jobcareer/{jobCareer}', [JobCareerController::class, 'destroy'])
        ->name('jobcareer.destroy');

    // ────────────── ACCREDITATIONS SECTION ──────────────
    Route::get('/accreditations', [AccreditationController::class, 'index'])
        ->name('accreditations.index');

    Route::get('/accreditations/edit', [AccreditationController::class, 'edit'])
        ->name('accreditations.edit');

    Route::put('/accreditations', [AccreditationController::class, 'update'])
        ->name('accreditations.update');

    // ────────────── ABOUT SECTION TWO (Know Us Better) ──────────────
    Route::get('/about-section-two', [AboutSectionTwoController::class, 'index'])
        ->name('about-section-two.index');

    Route::get('/about-section-two/edit', [AboutSectionTwoController::class, 'edit'])
        ->name('about-section-two.edit');

    Route::put('/about-section-two', [AboutSectionTwoController::class, 'update'])
        ->name('about-section-two.update');


    Route::post('/services/delete/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');


    // ────────────── Profile ──────────────  
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile');

    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profile/password', [App\Http\Controllers\Auth\PasswordController::class, 'update'])
        ->name('profile.password.update');


    // ────────────── Roles & Permissions Page ──────────────    
    // Separate pages for Roles and Permissions
    Route::get('/roles', [RolePermissionController::class, 'rolesIndex'])
        ->name('roles.index');

    Route::get('/permissions', [RolePermissionController::class, 'permissionsIndex'])
        ->name('permissions.index');

    // Permissions CRUD
    Route::post('/permissions', [RolePermissionController::class, 'storePermission'])
        ->name('permissions.store');

    Route::put('/permissions/{permission}', [RolePermissionController::class, 'updatePermission'])
        ->name('permissions.update');

    Route::delete('/permissions/{permission}', [RolePermissionController::class, 'destroyPermission'])
        ->name('permissions.destroy');

    // Roles CRUD
    Route::post('/roles', [RolePermissionController::class, 'storeRole'])
        ->name('roles.store');

    Route::put('/roles/{role}', [RolePermissionController::class, 'updateRole'])
        ->name('roles.update');

    Route::delete('/roles/{role}', [RolePermissionController::class, 'destroyRole'])
        ->name('roles.destroy');

    // Assign permissions to role
    Route::put('/roles/{role}/permissions', [RolePermissionController::class, 'updateRolePermissions'])
        ->name('roles.permissions.update');

    // ────────────── user page ──────────────   
    // User Management Routes
    Route::get('/users', [UserRegisterController::class, 'index'])
        ->name('admin-register.index');

    Route::post('/users', [UserRegisterController::class, 'store'])
        ->name('admin-register.store');

    Route::put('/users/{user}', [UserRegisterController::class, 'update'])
        ->name('admin-register.update');

    Route::delete('/users/{user}', [UserRegisterController::class, 'destroy'])
        ->name('admin-register.destroy');

    Route::put('/users/{user}/role', [UserRegisterController::class, 'updateRole'])
        ->name('admin-register.role.update');

    Route::get('/users/{user}', [UserRegisterController::class, 'show'])
        ->name('admin-register.show');




    //test services 


    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::post('/services/update', [ServiceController::class, 'update'])->name('services.update');


    // FOR DOCTOR
    Route::post('/doctors/store', [DoctorController::class, 'store'])->name('admin-doctor.store');
    Route::get('/admin-doctors', [DoctorController::class, 'index'])->name('admin-doctors.index');
    Route::get('/doctors/view/{id}', [DoctorController::class, 'view']);
    Route::post('/doctors/update', [DoctorController::class, 'update']);
    Route::delete('/doctors/delete/{id}', [DoctorController::class, 'delete']);


    // FOR APPOINTMENT
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin-appointment.index');
    Route::get('/appointment/view/{id}', [AppointmentController::class, 'view']);
    Route::post('/appointment/update', [AppointmentController::class, 'update']);
    Route::delete('/appointment/delete/{id}', [AppointmentController::class, 'delete']);
    Route::post('/appointments/delete-selected', [AppointmentController::class, 'deleteSelected'])
        ->name('appointments.delete-selected');

    // FOR PACKAGES 
    Route::get('/admin-packages', [PackageController::class, 'index'])->name('packages.index');
    Route::post('/admin-packages/store', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/admin-packages/view/{id}', [PackageController::class, 'view']);


    // FOR CONTACT 
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin-contact.index');
    Route::get('/contacts/view/{id}', [ContactController::class, 'view']);
    Route::post('/contacts/update', [ContactController::class, 'update']);
    Route::delete('/contacts/delete/{id}', [ContactController::class, 'delete']);

    // FOR BOOKING FORM
    Route::get('/booking-lead', [BookingController::class, 'index'])->name('admin-booking.index');
    Route::delete('/booking-lead/delete/{id}', [BookingController::class, 'delete']);


    // FOR CORPORATE 
    Route::get('/corporate-benefit', [CorporateBenefitController::class, 'index'])
        ->name('admin-corporate.index');
    Route::put('/corporate-benefit', [CorporateBenefitController::class, 'update'])->name('admin-corporate.update');

    // FOR CORPORATE 
    Route::get('/corporate-services', [CorporateServiceController::class, 'index'])
        ->name('admin-corporate-service.index');
    Route::put('/corporate-services', [CorporateServiceController::class, 'update'])->name('admin-corporate-service.update');


    // WHAT MAKES US DIFFERENT ABOUT SECTION
    Route::get('/About-makes-us-different', [AboutMakeController::class, 'index'])
        ->name('admin-about-makes.index');
    Route::put('/About-makes-us-different', [AboutMakeController::class, 'update'])->name('admin-about-makes.update');

    // PARTNER ABOUT SECTION
    Route::get('/partner-about', [PartnerAboutController::class, 'index'])
        ->name('admin-partner-about.index');
    Route::put('/partner-about', [PartnerAboutController::class, 'update'])->name('admin-partner-about.update');

    //WHY PARTNER  SECTION
    Route::get('/why-partner', [WhyPartnerController::class, 'index'])
        ->name('admin-why-partner.index');
    Route::put('/why-partner', [WhyPartnerController::class, 'update'])->name('admin-why-partner.update');

    // PRIVACY POLICY CONTENT
    Route::get('/privacy-policy-content', [PrivacyPolicyController::class, 'index'])
        ->name('admin-privacy-policy.index');

    Route::put('/privacy-policy/update', [PrivacyPolicyController::class, 'update'])
        ->name('admin-privacy-policy.update');

    // TERMS CONDITION POLICY CONTENT
    Route::get('/terms-condition-content', [TermsConditionController::class, 'index'])
        ->name('admin-terms-condition.index');

    Route::put('/terms-condition/update', [TermsConditionController::class, 'update'])
        ->name('admin-terms-condition.update');

    // SEO Pages
    Route::post('/seo-pages/store', [SeoPageController::class, 'store'])->name('seo-pages.store');
    Route::get('/seo-pages', [SeoPageController::class, 'index'])->name('seo-pages.index');
    Route::post('/seo-pages/update', [SeoPageController::class, 'update']);
    Route::delete('/seo-pages/delete/{id}', [SeoPageController::class, 'delete']);


    // SEO SETTING
    Route::post('/seo-setting/store', [SeoSettingController::class, 'store'])->name('seo-setting.store');
    Route::get('/seo-setting', [SeoSettingController::class, 'index'])->name('seo-setting.index');
    Route::get('/seo-setting/view/{id}', [SeoSettingController::class, 'view']);
    Route::post('/seo-setting/update', [SeoSettingController::class, 'update']);
    Route::delete('/seo-setting/delete/{id}', [SeoSettingController::class, 'delete']);


    // For CAREER
    Route::get('/applications', [JobCareerApplicationController::class, 'index'])->name('admin-applications.index');
    Route::get('/applications/view/{id}', [JobCareerApplicationController::class, 'view']);
    Route::post('/applications/update', [JobCareerApplicationController::class, 'update']);
    Route::delete('/applications/delete/{id}', [JobCareerApplicationController::class, 'delete']);
    Route::post('/applications/delete-selected', [JobCareerApplicationController::class, 'deleteSelected'])
        ->name('applications.delete-selected');


    // FOR POPULAR TEST
    Route::post('/popularTest/store', [PopularTestController::class, 'store'])->name('admin-popularTest.store');
    Route::get('/admin-popularTest', [PopularTestController::class, 'index'])->name('admin-popularTest.index');
    Route::get('/popularTest/view/{id}', [PopularTestController::class, 'view']);
    Route::post('/popularTest/update', [PopularTestController::class, 'update']);
    Route::delete('/popularTest/delete/{id}', [PopularTestController::class, 'delete']);
    Route::post('/popularTest/delete-selected', [PopularTestController::class, 'deleteSelected']);




    // ────────────── Website Setting ──────────────

    Route::get('/website-setting', [WebsiteSetting::class, 'index'])
        ->name('website-setting');

    Route::put('/website-setting', [WebsiteSetting::class, 'update'])
        ->name('website-setting.update');



    // ────────────── Website Setting ──────────────

    Route::get('/system-setting', [SystemSetting::class, 'index'])
        ->name('system-setting');

    Route::put('/system-setting', [SystemSetting::class, 'update'])
        ->name('system-setting.update');


    // ────────────── General/ Captcha Setting ──────────────

    Route::get('/general-setting', [CaptchaSettingController::class, 'index'])
        ->name('general-setting');

    Route::put('/general-setting', [CaptchaSettingController::class, 'update'])
        ->name('general-setting.update');





    Route::get('/appointments/search', [AppointmentController::class, 'search']);
    Route::get('/contacts/search', [ContactController::class, 'search']);
    Route::get('/applications/search', [JobCareerApplicationController::class, 'search']);
    Route::get('/booking-lead/search', [BookingController::class, 'search']);
    Route::get('/tests/search', [TestController::class, 'search']);
    Route::get('/parameters/search', [ParameterController::class, 'search']);
    Route::get('/admin-subparameters/search', [SubparameterController::class, 'search']);
    Route::get('/health-risks/search', [HealthRiskController::class, 'search']);


    // for staff crud
    Route::post('/staff/store', [StaffController::class, 'store'])->name('admin-staff.store');
    Route::get('/staff', [StaffController::class, 'index'])->name('admin-staff.index');
    Route::get('/staff/view/{id}', [StaffController::class, 'view']);
    Route::post('/staff/update', [StaffController::class, 'update']);
    Route::delete('/staff/delete/{id}', [StaffController::class, 'delete']);
    Route::post('/staff/deleteSelected', [StaffController::class, 'deleteSelected']);
});




require __DIR__ . '/auth.php';
