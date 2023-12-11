<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\EventController;


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

Route::get('/', function() {
    return view ('auth.login');
});



Route::get('/testing', [AdminController::class, 'testing']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('home');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/committee', [AdminController::class, 'committee'])->middleware(['auth', 'admin'])->name('admin.committee');
    Route::get('/judge', [AdminController::class, 'judge'])->middleware(['auth', 'admin'])->name('admin.judge');
    Route::get('/cancel', [CommitteeController::class, 'cancel'])->middleware('auth')->name('committee.cancel');
    Route::get('/event', [AdminController::class, 'event'])->middleware(['auth', 'admin'])->name('admin.event');
    Route::get('/contestant', [AdminController::class, 'contestant'])->middleware('auth')->name('admin.contestant');
});

Route::get('/committee/overview', [EventController::class, 'showEvents'])->middleware('auth')->name('committee.overview');

Route::get('/committee/event', [CommitteeController::class, 'createEvent'])->middleware('auth')->name('committee.event');
Route::match(['get', 'post'], '/create/event', [EventController::class, 'create'])->middleware('auth')->name('create.event');
Route::match(['get', 'post'], '/committee/register', [AdminController::class, 'create'])->middleware('auth')->name('committee.create');
Route::match(['get', 'post'], '/judge/create', [AdminController::class, 'createJudge'])->middleware('auth')->name('judge.create');
Route::match(['get', 'post'], '/contestant/create', [AdminController::class, 'createContestant'])->middleware(['auth', 'admin'])->name('contestant.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/committee/login', [CommitteeController::class, 'showLoginForm'])->name('committee.login');
Route::post('/committee/login', [CommitteeController::class, 'login']);

Route::get('/committee/dashboard', [CommitteeController::class, 'dashboard'])->middleware(['auth', 'committee'])->name('committee.dashboard');
// Route::get('/committee/home', [CommitteeController::class, 'overview'])->middleware(['auth'])->name('committee.home');

require __DIR__.'/auth.php';
