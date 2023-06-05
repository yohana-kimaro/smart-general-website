<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\BannerImageController;
use App\Http\Controllers\Admin\ContactInformationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SolutionsController;
use App\Http\Controllers\Admin\SpecializeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//FRONTEND
Route::get('/',[HomeController::class,'index'])->name('home');



// ADMIN SECTION
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    // login route
    Route::get('/', [AdminLoginController::class, 'adminLoginForm'])->name('login');
    Route::get('login', [AdminLoginController::class, 'adminLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'storeLoginInfo'])->name('login');
    Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('logout');
    Route::get('forget-password', [AdminForgotPasswordController::class, 'forgetPassword'])->name('forget.password');
    Route::post('send-forget-password', [AdminForgotPasswordController::class, 'sendForgetEmail'])->name('send.forget.password');
    Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'resetPassword'])->name('reset.password');
    Route::post('store-reset-password/{token}', [AdminForgotPasswordController::class, 'storeResetData'])->name('store.reset.password');
});


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    //admin Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    

    //MANAGE MY PROFILE
    Route::get('my-profile', [ProfileController::class, 'myprofile'])->name('my-profile');
    Route::post('update-my-profile', [ProfileController::class, 'updateMyProfile'])->name('update.my-profile');


    //  admin
    Route::resource('admin-list', AdminController::class);
    Route::get('admin-status/{id}', [AdminController::class, 'changeStatus'])->name('admin.status');

    //HOMEPAGE SLIDERS
    Route::resource('sliders', SliderController::class);
    Route::get('sliders-status/{id}', [SliderController::class, 'changeStatus'])->name('slider.status');

    // manage about us
    Route::resource('about', AboutController::class);
    Route::get('about-status/{id}', [AboutController::class, 'changeStatus'])->name('about.status');

    // manage specialize us
    Route::resource('specialize', SpecializeController::class);
    Route::get('specialize-status/{id}', [SpecializeController::class, 'changeStatus'])->name('specialize.status');

    // manage services
    Route::resource('services', ServicesController::class);
    Route::get('services-status/{id}', [ServicesController::class, 'changeStatus'])->name('services.status');

    // manage solutions
    Route::resource('solutions', SolutionsController::class);
    Route::get('solutions-status/{id}', [SolutionsController::class, 'changeStatus'])->name('solutions.status');

    // manage projects
    Route::resource('projects', ProjectsController::class);
    Route::get('projects-status/{id}', [ProjectsController::class, 'changeStatus'])->name('projects.status');

    // manage banner image
    Route::get('banner-image', [BannerImageController::class, 'bannerImage'])->name('banner.image');
    Route::post('update-image/{id}', [BannerImageController::class, 'BannerUpdate'])->name('update-image');
    Route::get('login-image', [BannerImageController::class, 'LoginImage'])->name('login.image');
    Route::post('update-login-image/{id}', [BannerImageController::class, 'updateLogin'])->name('update-login-image');
    Route::get('profile-image', [BannerImageController::class, 'profileImageIndex'])->name('profile.image');
    Route::post('update-profile-image/{id}', [BannerImageController::class, 'updateProfileImage'])->name('update-profile-image');
    Route::get('bg-image', [BannerImageController::class, 'bgIndex'])->name('bg.image');
    Route::post('update-bg-image/{id}', [BannerImageController::class, 'updateBg'])->name('update-bg-image');

    //consent modal    
    Route::post('update-comment-setting', [SettingsController::class, 'updateCommentSetting'])->name('update.comment.setting');
    Route::get('cookie-consent-setting', [SettingsController::class, 'cookieConsentSetting'])->name('cookie.consent.setting');
    Route::post('update-cookie-consent', [SettingsController::class, 'updateCookieConsentSetting'])->name('update.cookie.consent.setting');


    // setting start
    Route::resource('settings', SettingsController::class);

    //Contact Information
    Route::resource('contact-information', ContactInformationController::class);
    Route::post('topbar-contact/{id}', [ContactInformationController::class, 'topbarContact'])->name('topbar.contact');
    Route::post('footer-contact/{id}', [ContactInformationController::class, 'footerContact'])->name('footer.contact');
    Route::post('social-link/{id}', [ContactInformationController::class, 'socialLink'])->name('social.link');

    //MANAGE ADMINS
    Route::get('/administrators', [AdminController::class, 'adminList'])->name('administrators');
    Route::get('/create-administrator', [AdminController::class, 'createAdmin'])->name('create-administrator');
    Route::post('/store-administrator', [AdminController::class, 'storeAdmin'])->name('store-administrator');
    Route::get('/edit-administrator/{id}', [AdminController::class, 'editAdmin'])->name('edit_admin');
    Route::post('/update-administrator/{id}', [AdminController::class, 'updateAdmin'])->name('update-administrator');
    Route::get('/administrator-status/{id}', [AdminController::class, 'changeStatus'])->name('status_change');
    Route::delete('/delete-administrator/{id}', [AdminController::class, 'deleteAdmin'])->name('delete-administrator');


});
