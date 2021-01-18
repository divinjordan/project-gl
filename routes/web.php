<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialiteController;
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

Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google');

Route::get('/auth/redirect/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('facebook');

Route::get('/auth/callback/facebook', [SocialiteController::class,'facebook']);

Route::get('/auth/callback/google', [SocialiteController::class,'google']);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/profile',function(){
    return redirect('dashboard');
})->middleware(['auth'])->name('profile');

Route::resource('courses',CourseController::class);
Route::resource('questions',QuestionController::class);
Route::resource('responses',ResponseController::class);
Route::resource('evaluations',EvaluationController::class);
Route::resource('rooms',RoomController::class);
Route::resource('requests',RequestAlertController::class);

require __DIR__.'/auth.php';
