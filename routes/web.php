<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileCompletionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegistrationCompletionController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseScheduleController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccount\ChangePasswordController;
use App\Http\Controllers\MyAccount\ProfileController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\Resource\CourseController;
use App\Http\Controllers\Resource\DepartmentController;
use App\Http\Controllers\Resource\EducationLevelController;
use App\Http\Controllers\Resource\LecturerController;
use App\Http\Controllers\Resource\ParticipantController;
use App\Http\Controllers\Resource\TopicController;
use App\Http\Controllers\TermOfServiceController;
use App\Http\Controllers\UserGuideController;
use Illuminate\Support\Facades\Route;
use App\Jobs\CourseStartMailJob;
use App\Models\Course;
use App\Models\User;

Route::post('/course-schedule/{courseId}/open-zoom', [CourseScheduleController::class, 'openZoom'])
    ->name('course-schedule.open-zoom');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama diarahkan ke jadwal pembelajaran
Route::get('/jadwal-pembelajaran', [CourseScheduleController::class, 'guestList'])->name('course-schedule.public');
Route::get('/', HomeController::class)->name('home');
Route::get('/privacy-policy', PrivacyPolicyController::class)->name('privacy-policy');
Route::get('/term-of-service', TermOfServiceController::class)->name('term-of-service');
Route::get('/contact-us', ContactUsController::class)->name('contact-us');
Route::get('/forgot-password', ForgotPasswordController::class)->name('auth.forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submit'])->name('auth.forgot.password.submit');
Route::get('/reset-password/{token}', ResetPasswordController::class)->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'submit'])->name('password.update');

// Course Schedule Routes (Guest) - URUTAN PENTING!
Route::get('/course-schedule', [CourseScheduleController::class, 'guestList'])->name('course-schedule.guest-list');
Route::get('/course-schedule/search', [CourseScheduleController::class, 'search'])->name('course-schedule.search');
Route::get('/course-schedule/{slug}', [CourseScheduleController::class, 'guestDetail'])->name('course-schedule.guest-detail');

Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware(['auth'])
    ->name('verification.notice');
Route::put('/email/{user}/verify', [VerificationController::class, 'manualVerification'])
    ->middleware(['auth'])
    ->name('verification.manual');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', LoginController::class)->name('login');
        Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');

        Route::get('/register', RegisterController::class)->name('register');
        Route::post('/register', [RegisterController::class, 'submit'])->name('register.submit');

        Route::get('google', [GoogleController::class, 'redirect'])->name('google');
        Route::get('google/callback', [GoogleController::class, 'callback']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/logout', LogoutController::class)->name('logout');

        Route::get('/registration-completion', RegistrationCompletionController::class)
            ->name('registration-completion');
        Route::put('/registration-completion', [RegistrationCompletionController::class, 'submit'])
            ->name('registration-completion.submit');

        Route::middleware(['verified', 'registration.check'])->group(function () {
            Route::get('/profile-completion', ProfileCompletionController::class)
                ->name('profile-completion');
            Route::put('/profile-completion', [ProfileCompletionController::class, 'submit'])
                ->name('profile-completion.submit');
        });
    });
});

Route::middleware(['auth', 'verified', 'registration.check', 'profile.check'])->group(function () {
    // Course Schedule Actions (Authenticated)
    Route::post('/course-schedule/{course}/register', [CourseScheduleController::class, 'register'])->name('course-schedule.register');
    Route::delete('/course-schedule/{course}/cancel', [CourseScheduleController::class, 'cancel'])->name('course-schedule.cancel');

    Route::prefix('app')->group(function () {
        Route::get('/home', MyHomeController::class)->name('my-home');
        Route::get('/my-course', [MyCourseController::class, 'list'])->name('my-course.list');
        Route::get('/my-course/{slug}', [MyCourseController::class, 'detail'])->name('my-course.detail');
        Route::get('/user-guide', UserGuideController::class)->name('user-guide');
        Route::get('/course-schedule', [CourseScheduleController::class, 'appList'])->name('course-schedule.app-list');
        Route::get('/course-schedule/{slug}', [CourseScheduleController::class, 'appDetail'])->name('course-schedule.app-detail');

        Route::resource('course', CourseController::class);
        Route::put('course/{course}/cancel', [CourseController::class, 'cancel'])->name('course.cancel');
        Route::put('course/{course}/continue', [CourseController::class, 'continue'])->name('course.continue');
        Route::put('course/{course}/complete', [CourseController::class, 'complete'])->name('course.complete');

        Route::resource('topic', TopicController::class);
        Route::resource('department', DepartmentController::class);
        Route::resource('education-level', EducationLevelController::class);
        Route::resource('participant', ParticipantController::class)->parameter('participant', 'user');

        Route::resource('lecturer', LecturerController::class)->parameter('lecturer', 'user');
        Route::put('lecturer/{user}/verify', [LecturerController::class, 'verify'])->name('lecturer.verify');
        Route::put('lecturer/{user}/unverified', [LecturerController::class, 'unverified'])->name('lecturer.unverified');

        Route::get('certificate/{course}/download', [CertificateController::class, 'download'])->name('certificate.download');

        Route::prefix('my-account')->name('my-account.')->group(function () {
            Route::get('/profile', ProfileController::class)->name('profile');
            Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

            Route::get('/change-password', ChangePasswordController::class)->name('change-password');
            Route::put('/change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');
        });
    });
});

Route::get('/download', DownloadController::class)->name('download');

Route::impersonate();