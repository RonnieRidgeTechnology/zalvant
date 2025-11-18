<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutUsWeInController;
use App\Http\Controllers\AppointmentUpdateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingFormLabelController;
use App\Http\Controllers\BlogUpdateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUpdateController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeUpdateController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioUpdateController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceUpdateController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TermsAndConditionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WebsettingController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CountlessController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\WelcomController;
use App\Http\Controllers\AdminWelcomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/cookie-test', function () {
    session(['test' => 'hello']);
    return response()->json(['session_value' => session('test')]);
});
Route::view('/form-test', 'form');
Route::post('/form-test', function () {
    return 'Form submitted OK';
});
// Language Switcher
Route::middleware(['web'])->group(function () {
Route::get('/language/{locale}', [BasicController::class, 'switchLanguage'])->name('language.switch');
// Admin login
Route::get('/login', [AuthController::class, 'loginform'])->name('login');
Route::post('/admin-login', [AuthController::class, 'login'])->name('loginform');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin middleware
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    //admin profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'changePassword'])->name('profile.password.update');

    // technologies
    Route::get('/technology', [TechnologyController::class, 'index'])->name('new-technology.index');
    Route::post('/technology', [TechnologyController::class, 'store'])->name('technology.store');
    Route::get('/technology/{id}/edit', [TechnologyController::class, 'edit'])->name('new-technology.edit');
    Route::put('/technology/{id}', [TechnologyController::class, 'update'])->name('new-technology.update');
    Route::delete('/technology/{id}', [TechnologyController::class, 'destroy'])->name('technology.destroy');
    Route::put('/technology/status/{id}/{status}', [TechnologyController::class, 'changeStatus'])->name('technology.status');
    // Faq
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::get('/faqs/search', [FaqController::class, 'search'])->name('faqs.search');
    Route::put('/faq/status/{id}/{status}', [FaqController::class, 'changeStatus'])->name('faq.status');
    // Testimonial
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::put('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::put('/testimonials/status/{id}/{status}', [TestimonialController::class, 'changeStatus'])->name('testimonials.status');
    //About us update
    Route::get('/about-us', [AboutUsController::class, 'edit'])->name('about-us.edit');
    Route::post('/about-us', [AboutUsController::class, 'updateOrCreate'])->name('about-us.update');
    //Blog Category
    Route::get('/blog-categories', [BlogCategoryController::class, 'index'])->name('blog-categories.index');
    Route::post('/blog-categories/store', [BlogCategoryController::class, 'store'])->name('blog-categories.store');
    Route::put('/blog-categories/{id}', [BlogCategoryController::class, 'update'])->name('blog-categories.update');
    Route::delete('/blog-categories/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blog-categories.destroy');
    Route::get('/blog-categories/{id}', [BlogCategoryController::class, 'show'])->name('blog-categories.show');
    Route::put('/blog-categories/status/{id}/{status}', [BlogCategoryController::class, 'changeStatus'])->name('blog-categories.status');
    //blog
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::put('/blogs/status/{id}/{status}', [BlogController::class, 'changeStatus'])->name('blogs.status');
    // About Us Crud
    Route::get('/Ai-deail', [AboutUsWeInController::class, 'index'])->name('Ai-deail.index');
    Route::post('/Ai-deail', [AboutUsWeInController::class, 'store'])->name('Ai-deail.store');
    Route::get('/Ai-deail/{id}/edit', [AboutUsWeInController::class, 'edit'])->name('Ai-deail.edit');
    Route::put('/Ai-deail/{id}', [AboutUsWeInController::class, 'update'])->name('Ai-deail.update');
    Route::delete('/Ai-deail/{id}', [AboutUsWeInController::class, 'destroy'])->name('Ai-deail.destroy');
    Route::put('/Ai-deail/status/{id}/{status}', [AboutUsWeInController::class, 'changeStatus'])->name('Ai-deail.status');
    // Core Value
    Route::get('/Coure-value', [CoreValueController::class, 'index'])->name('Coure-value.index');
    Route::post('/Coure-value', [CoreValueController::class, 'store'])->name('Coure-value.store');
    Route::get('/Coure-value/{id}/edit', [CoreValueController::class, 'edit'])->name('Coure-value.edit');
    Route::put('/Coure-value/{id}', [CoreValueController::class, 'update'])->name('Coure-value.update');
    Route::delete('/Coure-value/{id}', [CoreValueController::class, 'destroy'])->name('Coure-value.destroy');
    Route::put('/Coure-value/status/{id}/{status}', [CoreValueController::class, 'changeStatus'])->name('Coure-value.status');
    // Why Choose Us
    Route::get('/Why-choose-us', [WhyChooseUsController::class, 'index'])->name('Why-choose-us.index');
    Route::post('/Why-choose-us', [WhyChooseUsController::class, 'store'])->name('Why-choose-us.store');
    Route::get('/Why-choose-us/{id}/edit', [WhyChooseUsController::class, 'edit'])->name('Why-choose-us.edit');
    Route::put('/Why-choose-us/{id}', [WhyChooseUsController::class, 'update'])->name('Why-choose-us.update');
    Route::delete('/Why-choose-us/{id}', [WhyChooseUsController::class, 'destroy'])->name('Why-choose-us.destroy');
    Route::put('/Why-choose-us/status/{id}/{status}', [WhyChooseUsController::class, 'changeStatus'])->name('Why-choose-us.status');
    // service
    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service');
    Route::post('/service', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/service/delete/{id}', [ServiceController::class, 'delete'])->name('services.destroy');
    Route::put('/service/status/{id}/{status}', [ServiceController::class, 'changeStatus'])->name('service.status');

    //Portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio');
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::put('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/destory/{id}', [PortfolioController::class, 'delete'])->name('portfolio.destroy');
    Route::post('/portfolio/delete-image', [PortfolioController::class, 'deleteImage'])->name('portfolio.deleteImage');
    //Contact Update
    Route::get('/contact-update/edit', [ContactUpdateController::class, 'edit'])->name('contact-update.edit');
    Route::post('/contact-update/update', [ContactUpdateController::class, 'updateOrCreate'])->name('contact-update.update');
    //Serice Update
    Route::get('/service-update/edit', [ServiceUpdateController::class, 'edit'])->name('service-update.edit');
    Route::post('/service-update/update', [ServiceUpdateController::class, 'updateOrCreate'])->name('service-update.update');
    //Websetting
    Route::get('/websetting/edit', [WebsettingController::class, 'edit'])->name('websetting.edit');
    Route::post('/websetting/update', [WebsettingController::class, 'updateOrCreate'])->name('websetting.update');
    //Home Update
    Route::get('/homeupdate', [HomeUpdateController::class, 'edit'])->name('homeupdate.edit');
    Route::post('/homeupdate', [HomeUpdateController::class, 'updateOrCreate'])->name('homeupdate.update');
    //blog-update
    Route::get('/blog-update/edit', [BlogUpdateController::class, 'edit'])->name('blog.update.edit');
    Route::post('/blog-update/update', [BlogUpdateController::class, 'updateOrCreate'])->name('blog-update.update');
    //Comment
    Route::get('/comments/{id}', [BlogController::class, 'allComment'])->name('comments.index');
    Route::post('/comments/{id}/toggle-status', [BlogController::class, 'toggleCommentStatus'])->name('comments.toggle-status');
    Route::delete('/comments/{id}', [BlogController::class, 'deleteComment'])->name('admin.comments.destroy');
    //Portfolio Update
    Route::get('/portfolio-update/edit', [PortfolioUpdateController::class, 'edit'])->name('portfolio-update.edit');
    Route::post('/portfolio-update/update', [PortfolioUpdateController::class, 'updateOrCreate'])->name('portfolio-update.update');
    //Appointment Update
    Route::get('/appointment-update/edit', [AppointmentUpdateController::class, 'edit'])->name('appointment-update.edit');
    Route::post('/appointment-update/update', [AppointmentUpdateController::class, 'updateOrCreate'])->name('appointment-update.update');
    //Appointment Setting
    Route::get('/appointment-settings', [AppointmentUpdateController::class, 'index'])->name('appointment-settings.index');
    Route::post('/appointment-settings/update', [AppointmentUpdateController::class, 'updateStatus'])->name('appointment-settings.update');

    //Appointment Calendar
    Route::get('/appointment-calendar', [AppointmentUpdateController::class, 'appointmentIndex'])->name('appointment.index');
    Route::get('/bookings/events', [AppointmentUpdateController::class, 'getEvents'])->name('appointments.events');
    Route::get('/appointment-list', [AppointmentUpdateController::class, 'appointmentList'])->name('appointment.list');
    Route::get('/appointment-search', [AppointmentUpdateController::class, 'appointmentSearch'])->name('appointment.search');

    //Privacy Policy
    Route::get('/privacy-policy/edit', [PrivacyPolicyController::class, 'edit'])->name('privacy-policy.edit');
    Route::post('/privacy-policy/update', [PrivacyPolicyController::class, 'updateOrCreate'])->name('privacy-policy.updateOrCreate');

    //Terms and Conditions
    Route::get('/terms-and-conditions/edit', [TermsAndConditionController::class, 'edit'])->name('terms-and-conditions.edit');
    Route::post('/terms-and-conditions/update', [TermsAndConditionController::class, 'updateOrCreate'])->name('terms-and-conditions.updateOrCreate');

    //Contact
    Route::get('/contact-list', [ContactController::class, 'contactlist'])->name('contact.list');
    Route::delete('/contact-delete/{id}', [ContactController::class, 'contactdelete'])->name('contact.delete');
    Route::get('/contact/search', [ContactController::class, 'contactSearch'])->name('contact.search');
//landing 
    Route::get('/landing-list', [LandingController::class, 'landinglist'])->name('landing.index');
    Route::delete('/landing-delete/{id}', [LandingController::class, 'landingdelete'])->name('landing.delete');
    Route::get('/landing/search', [LandingController::class, 'landingSearch'])->name('landing.search');
    Route::get('actions', [ActionController::class, 'index'])->name('actions.index');
    Route::post('/action-save',[ActionController::class,'store'])->name('action-store');
    Route::get('/action-countless',[CountlessController::class,'index'])->name('action-countless');
    Route::post('/admin/countless/save', [CountlessController::class, 'save'])->name('admin.countless.save');
    Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::post('/admin/banner/save', [BannerController::class, 'save'])->name('admin.banner.save');
    Route::get('/admin/welcome', [AdminWelcomeController::class, 'index'])->name('admin.welcome');
    Route::post('/admin/welcome/save', [AdminWelcomeController::class, 'save'])->name('admin.welcome.save');
    
    // Landing Form Labels
    Route::get('/landing-form-labels/edit', [LandingFormLabelController::class, 'edit'])->name('landing-form-labels.edit');
    Route::post('/landing-form-labels/update', [LandingFormLabelController::class, 'updateOrCreate'])->name('landing-form-labels.update');
});

Route::get('/', [BasicController::class, 'index'])->name('home.index');
Route::get('/book-a-form', [BasicController::class, 'landingPage'])->name('home.landing');
Route::get('/about-us', [BasicController::class, 'about'])->name('about-us');
Route::get('/contact-us', [BasicController::class, 'contact'])->name('contact-us');
Route::get('/sitemap', [BasicController::class, 'sitemap'])->name('sitemap');
Route::post('/landing-submit', [LandingController::class, 'submitForm'])->name('landing.submit');
Route::get('/thank-you',[WelcomController::class,'index'])->name('welcome');

Route::post('/contact-submit', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/services/{type?}', [BasicController::class, 'services'])->name('service');
Route::get('/blogs', [BasicController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [BasicController::class, 'blogDetails'])->name('blog.details');
Route::get('/blog/search', [BasicController::class, 'blogSearch'])->name('blog.search');
Route::post('/comments/store', [BlogController::class, 'comment'])->name('comments.store');
Route::post('/comments/reply', [BlogController::class, 'reply'])->name('comments.reply');
Route::get('/appointment', [BasicController::class, 'appointment'])->name('appointment');
Route::get('/portfolio', [BasicController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [BasicController::class, 'portfolioDetails'])->name('portfolio.details');
Route::post('/appointments', [AppointmentUpdateController::class, 'store'])->name('appointments.store');
Route::get('/appointment-settings', [AppointmentUpdateController::class, 'getSettings']);
Route::get('/privacy-policy', [BasicController::class, 'privacy'])->name('privacy');
Route::get('/terms-condition', [BasicController::class, 'term'])->name('term');
Route::get('/service/{slug}', [BasicController::class, 'serviceDetails'])->name('service.details');
Route::get('/service/ai-development/{slug}', [BasicController::class, 'serviceDetails'])->name('service.ai-development');

