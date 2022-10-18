<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home page
Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('index');

Route::get('/login', [App\Http\Controllers\HomePageController::class, 'login'])->name('login');
// Sign In
Route::get('/signup', [App\Http\Controllers\HomePageController::class, 'signup'])->name('signup');
// Email Verification
Route::get('/emailverification', [App\Http\Controllers\HomePageController::class, 'emailverification'])->name('emailverification');
// Forgot Password
Route::get('/forgot', [App\Http\Controllers\HomePageController::class, 'forgot'])->name('forgot');
// Reset Password
Route::get('/reset/password', [App\Http\Controllers\HomePageController::class, 'resetpassword'])->name('resetpassword');
// Reset Password
Route::get('/emailverify', [App\Http\Controllers\HomePageController::class, 'emailverify'])->name('emailverify');

//User Authentications
Route::prefix('auth')->group(function () {
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
    Route::post('/emailverify', [App\Http\Controllers\Auth\RegisterController::class, 'emailverify'])->name('emailverify');

    Route::post('/userlogin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('userlogin');
});

// User Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::prefix('/email-marketing')->group(function () {
        Route::get('/email-checker', [App\Http\Controllers\DashboardController::class, 'email_checker'])->name('user.email.checker');
        Route::get('/email-campaign', [App\Http\Controllers\DashboardController::class, 'email_campaign'])->name('user.email.campaign');
        Route::get('/email-campaign/email-campaign', [App\Http\Controllers\DashboardController::class, 'email_Ecampaign'])->name('user.email.Ecampaign');
        Route::get('/email-campaign/email-campaign/email-layout', [App\Http\Controllers\DashboardController::class, 'email_layout'])->name('user.email.layout');
        Route::get('/email-campaign/email-campaign/email-code', [App\Http\Controllers\DashboardController::class, 'email_code'])->name('user.email.code');
        Route::get('/email-campaign/email-preview', [App\Http\Controllers\DashboardController::class, 'email_preview'])->name('user.email.preview');
        Route::get('/email-campaign/email-design', [App\Http\Controllers\DashboardController::class, 'email_design'])->name('user.email.design');
        Route::get('/email-campaign/email-layout', [App\Http\Controllers\DashboardController::class, 'email_layout'])->name('user.email.layout');
        Route::get('/email-campaign/email-code', [App\Http\Controllers\DashboardController::class, 'email_code'])->name('user.email.code');
        Route::get('/email-automation', [App\Http\Controllers\DashboardController::class, 'email_automation'])->name('user.email.automation');
        Route::get('/automation-campaign', [App\Http\Controllers\DashboardController::class, 'automation_campaign'])->name('user.automation.campaign');
        Route::get('/edittemplate', [App\Http\Controllers\DashboardController::class, 'edit_template'])->name('user.edit.template');
    });
    Route::prefix('/subscribers')->group(function () {
        Route::get('/mailing-list', [App\Http\Controllers\DashboardController::class, 'mailing_list'])->name('user.mailing.list');
        Route::get('/mailing-list/add-contact', [App\Http\Controllers\DashboardController::class, 'add_contact'])->name('user.add.contact');
        Route::get('/mailing-list/copypaste', [App\Http\Controllers\DashboardController::class, 'copy_paste'])->name('user.copy.paste');
        Route::get('/mailing-list/upload', [App\Http\Controllers\DashboardController::class, 'upload'])->name('user.up.load');
    });
    Route::prefix('/messages')->group(function () {
        Route::get('/create-message', [App\Http\Controllers\DashboardController::class, 'create_message'])->name('user.create.message');
        Route::get('/view-message', [App\Http\Controllers\DashboardController::class, 'view_message'])->name('user.view.message');
    });
    Route::get('/page-builder', [App\Http\Controllers\DashboardController::class, 'page_builder'])->name('user.page.builder');
    Route::prefix('/chat-automation')->group(function () {
        Route::get('/sms-automation', [App\Http\Controllers\DashboardController::class, 'sms_automation'])->name('user.sms.automation');
        Route::get('/sms-automation/newsms', [App\Http\Controllers\DashboardController::class, 'newsms'])->name('user.new.sms');
        Route::get('/whatsapp-automation', [App\Http\Controllers\DashboardController::class, 'whatsapp_automation'])->name('user.whatsapp.automation');
        Route::get('/whatsapp-automation/sendbroadcast', [App\Http\Controllers\DashboardController::class, 'sendbroadcast'])->name('user.send.broadcast');
    });
    Route::prefix('/ecommerce')->group(function () {
        Route::get('/my-store', [App\Http\Controllers\DashboardController::class, 'my_store'])->name('user.my.store');
        Route::get('/my-store/viewstore', [App\Http\Controllers\DashboardController::class, 'viewstore'])->name('user.check.store');
        Route::get('/my-store/storee', [App\Http\Controllers\DashboardController::class, 'store'])->name('user.store');
        Route::get('/create-course', [App\Http\Controllers\DashboardController::class, 'create_course'])->name('user.create.course');
        Route::get('/create-course/course-content', [App\Http\Controllers\DashboardController::class, 'course_content'])->name('user.course.content');
        Route::get('/create-course/get-quiz', [App\Http\Controllers\DashboardController::class, 'get_quiz'])->name('user.get.quiz');
        Route::get('/create-course/course-summary', [App\Http\Controllers\DashboardController::class, 'course_summary'])->name('user.course.summary');
        Route::get('/create-course/enroll-now', [App\Http\Controllers\DashboardController::class, 'enroll_now'])->name('user.enroll.now');
        Route::get('/create-course/enroll-cur', [App\Http\Controllers\DashboardController::class, 'enroll_cur'])->name('user.enroll.cur');
    });
    Route::get('/affiliate-marketing', [App\Http\Controllers\DashboardController::class, 'affiliate_marketing'])->name('user.affiliate.marketing');
    Route::get('/integration', [App\Http\Controllers\DashboardController::class, 'integration'])->name('user.integration');
    Route::get('/reports-analysis', [App\Http\Controllers\DashboardController::class, 'reports_analysis'])->name('user.reports.analysis');
    Route::get('/help', [App\Http\Controllers\DashboardController::class, 'help'])->name('user.help');
    Route::prefix('/settings')->group(function () {
        Route::get('/general', [App\Http\Controllers\DashboardController::class, 'general'])->name('user.general');
        Route::get('/security', [App\Http\Controllers\DashboardController::class, 'security'])->name('user.security');
    });
});
