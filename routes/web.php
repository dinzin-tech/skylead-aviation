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
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\ProgramController;


use App\Http\Controllers\CourseController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ForeignCplConversionController;
use App\Http\Controllers\MedicalFitnessController;
use App\Http\Controllers\FlightTrainingController;
use App\Http\Controllers\TypeRatingController;


// all program related routes
Route::get('/a320', [TypeRatingController::class, 'a320TypeRating'])->name('type-rating.a320');
Route::get('/b737', [TypeRatingController::class, 'b737TypeRating'])->name('type-rating.b737');
Route::get('/flight-training-cpl', [App\Http\Controllers\FlightTrainingController::class, 'index'])->name('flight-training');
Route::get('/medical-fitness-requirements', [App\Http\Controllers\MedicalFitnessController::class, 'index'])->name('medical-fitness');
Route::get('/foreign-cpl-conversion', [App\Http\Controllers\ForeignCplConversionController::class, 'index'])->name('foreign-cpl-conversion');
Route::get('/dgca-ground-classes', [App\Http\Controllers\DgcaGroundClasses::class, 'index'])->name('dgca.ground.classes');

// Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
// Route::get('/program/{id}', [HomeController::class, 'programDetails'])->name('program.details');

// Show all programs/courses
Route::get('/courses', [ProgramController::class, 'index'])->name('programs');
// Show individual course details
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

// Route::get('/destinations/{country?}', [DestinationController::class, 'destinationCountry'])
//     ->name('destinations.country');

// Public destination route (update existing)
Route::get('/destination/{slug}', [App\Http\Controllers\DestinationController::class, 'destinationCountry'])->name('destination.country');

// Public route for global destinations
Route::get('/global-destinations/{slug}', [App\Http\Controllers\GlobalDestinationController::class, 'show'])->name('global.destination');
Route::get('/global-destinations', [App\Http\Controllers\GlobalDestinationController::class, 'index'])->name('global.destinations');

// Route::get('/flight-training/{type?}', [DestinationController::class, 'flightType'])->name('flight.type');

// Optional: Add a default route
Route::get('/', function () {
    return view('welcome');
});

// For regular courses
Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.details');

// Specific route for Air Asia Cadet Program (optional)
// Route::get('/air-asia-cadet-pilot-program', [CourseController::class, 'show'])->name('cadet.airasia');


// public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
// Route::get('/course-details', [HomeController::class, 'courseDetails'])->name('course.details');

// Route::get('/blog', [HomeController::class, 'blogs'])->name('blog');
// Route::get('/blogs/show', [HomeController::class, 'blogShow'])->name('blog.show');

// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [HomeController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/elements', [HomeController::class, 'elements'])->name('elements');
Route::get('/program/{id}', [HomeController::class, 'programDetails'])->name('program.details');
// Route::get('/programs', [HomeController::class, 'programs'])->name('programs');

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'listBlogs'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'showBlogDetail'])->name('blog.showBlogDetail');
});

// Frontend route to display pages
// Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'show'])
//     ->where('slug', '[a-z0-9-]+')
//     ->name('page.show');


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

        // Course Management Routes
        Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
        Route::get('/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('courses.edit');
        Route::put('/courses/{course}', [AdminCourseController::class, 'update'])->name('courses.update');
        Route::delete('/courses/{course}', [AdminCourseController::class, 'destroy'])->name('courses.destroy');
        
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

        // Countries resource
        Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
        Route::resource('aircrafts', \App\Http\Controllers\Admin\AircraftController::class);
        Route::resource('flying-schools', \App\Http\Controllers\Admin\FlyingSchoolController::class);
        Route::resource('destinations', \App\Http\Controllers\Admin\DestinationController::class);
        Route::resource('global-destinations', \App\Http\Controllers\Admin\GlobalDestinationController::class);

        Route::resource('dgca-syllabus', \App\Http\Controllers\Admin\DgcaSyllabusController::class);
        Route::post('dgca-syllabus/{dgcaSyllabus}/update-topic-status', [\App\Http\Controllers\Admin\DgcaSyllabusController::class, 'updateTopicStatus'])
         ->name('dgca-syllabus.update-topic-status');

        // Page Sections
        Route::resource('page-builder', \App\Http\Controllers\Admin\PageBuilderController::class);
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        
        // Section Elements
        Route::prefix('page-builder/{pageSection}')->group(function () {
            Route::resource('elements', \App\Http\Controllers\Admin\SectionElementController::class)
                ->except(['index', 'show'])
                ->names([
                    'create' => 'section-elements.create',
                    'store' => 'section-elements.store',
                    'edit' => 'section-elements.edit',
                    'update' => 'section-elements.update',
                    'destroy' => 'section-elements.destroy'
                ]);
                
            // Reorder elements
            Route::post('elements/reorder', [\App\Http\Controllers\Admin\SectionElementController::class, 'reorder'])
                ->name('section-elements.reorder');
        });
        

        // Maintenance routes
        Route::get('maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
        Route::post('maintenance/fix-storage', [MaintenanceController::class, 'fixStorage'])->name('maintenance.fix-storage');
        Route::post('maintenance/fix-symlink', [MaintenanceController::class, 'fixSymlink'])->name('maintenance.fix-symlink');
        Route::get('maintenance/status', [MaintenanceController::class, 'checkStatus'])->name('maintenance.status');

        // Route::resource('courses', AdminCourseController::class);

    });

require __DIR__.'/auth.php';

 