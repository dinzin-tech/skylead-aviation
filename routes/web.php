<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeroContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MaintenanceController;


use App\Http\Controllers\CourseController;
use App\Http\Controllers\DestinationController;

Route::get('/destinations/{country?}', [DestinationController::class, 'destinationCountry'])
    ->name('destinations.country');

Route::get('/flight-training/{type?}', [DestinationController::class, 'flightType'])
    ->name('flight.type');

// Optional: Add a default route
Route::get('/', function () {
    return view('welcome');
});

// For regular courses
Route::get('/course/{name}', [CourseController::class, 'show'])->name('course.details');

// Specific route for Air Asia Cadet Program (optional)
Route::get('/air-asia-cadet-pilot-program', [CourseController::class, 'show'])->name('cadet.airasia');


// public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/course-details', [HomeController::class, 'courseDetails'])->name('course.details');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/show', [HomeController::class, 'blogShow'])->name('blog.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/elements', [HomeController::class, 'elements'])->name('elements');
Route::get('/program/{id}', [HomeController::class, 'programDetails'])->name('program.details');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');



// Protected routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes with 'auth' and 'role:admin' middleware
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Posts resource
        // Route::resource('posts', PostController::class);
        
        // Blogs resource
        Route::resource('blogs', BlogController::class);

        // Volunteers resource
        // Route::resource('volunteers', App\Http\Controllers\Admin\VolunteerController::class);

        // Gallery resource
        // Route::resource('galleries', GalleryController::class);

        // Hero Content resource
        // Route::resource('hero', HeroContentController::class);

        // Events resource
        // Route::resource('events', EventController::class);

        // Contact messages
        Route::get('contacts', [ContactController::class, 'listMessages'])->name('contacts.index');
        Route::get('contacts/{id}', [ContactController::class, 'showMessage'])->name('contacts.show');

        // Donations management
        // Route::get('donations', [DonationController::class, 'adminIndex'])->name('donations.index');
        // Route::get('donations/{id}', [DonationController::class, 'adminShow'])->name('donations.show');

        // Maintenance routes
        Route::get('maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
        Route::post('maintenance/fix-storage', [MaintenanceController::class, 'fixStorage'])->name('maintenance.fix-storage');
        Route::post('maintenance/fix-symlink', [MaintenanceController::class, 'fixSymlink'])->name('maintenance.fix-symlink');
        Route::get('maintenance/status', [MaintenanceController::class, 'checkStatus'])->name('maintenance.status');

    });

require __DIR__.'/auth.php';
