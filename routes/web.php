
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('home');
// })->name('home');


Route::get('/', [Controller::class, 'index'])->name('home');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified','admin'])->name('dashboard');
Route::get('/dashboard/contact', [AdminController::class, 'contact'])->middleware(['auth', 'verified','admin'])->name('dashboard.contact');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/jobboard', function () {
//     return view('jobboard');
// })->middleware(['auth', 'verified'])->name('jobboard');



Route::get('/contact', function () {
    return view('contactus');
})->name('contact');

Route::get('about', function () {
    return view('aboutus');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('jobs', JobController::class);
Route::get('job/detail/{id}', [JobController::class ,'jobDetail'])->name('job.details');
Route::get('job/seved', [JobController::class ,'savedJobs'])->name('sevedjobs');
Route::post('/jobs/save/{id}', [JobController::class, 'saveJob'])->name('saveJob');
Route::post('/remove-saved-job/{id}', [JobController::class, 'removeSavedJob'])->name('removeSavedJob');


Route::post('/createcontact',[AdminController::class ,'create'])->name('contact.create');
Route::get('/dashboardcontact',[AdminController::class ,'contact'])->name('contact.ad.view');
Route::delete('/deletcontact/{id}',[AdminController::class ,'destroy'])->name('jobs.destroy');



require __DIR__.'/auth.php';
