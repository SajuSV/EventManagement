<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//------------------------- Admin Routes ----------------------------
// Index Page 
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Add New Event 
Route::get('/addevent', [HomeController::class, 'addevent']);
Route::post('/submitevent', [HomeController::class, 'submitevent']);
// View Event Details 
Route::get('/view/{x}', [HomeController::class, 'view']);
// Update Event Details 
Route::get('/update/{x}', [HomeController::class, 'update']);
Route::post('/change/{x}', [HomeController::class, 'change']);
// Delete Event 
Route::get('/delete/{x}', [HomeController::class, 'delete']);

//------------------------- User Routes ----------------------------
// Index Page 
Route::get('/', [UserController::class, 'index']);
// Event Registeration 
Route::get('/register/{x}', [UserController::class, 'register']);
Route::post('/submitregister/{x}', [UserController::class, 'submitregister']);
