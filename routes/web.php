<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\owner\PropertyController;
use App\Http\Controllers\owner\RoomController;
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Guest\BookingController;
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

Route::get('/', function () {
    return view('master');
});


// GET Routes for loggin in
Route::get('/owner-login', [LoginController::class, 'ownerLogin'])->name('owner-login');
Route::get('/guest-login', [LoginController::class, 'guestLogin'])->name('guest-login');

// GET Routes for Registerting
Route::get('/owner-register', [LoginController::class, 'ownerRegister'])->name('owner-register');
Route::get('/guest-register', [LoginController::class, 'guestRegister'])->name('guest-register');


//POST routes for logging and registerting for House owners
Route::post('/login-owner', [LoginController::class, 'loginOwner'])->name('login-owner');
Route::post('/register-owner', [LoginController::class, 'registerOwner'])->name('register-owner');

//POST routes for logging and registerting for guests
Route::post('/login-guest', [LoginController::class, 'loginGuest'])->name('login-guest');
Route::post('/register-guest', [LoginController::class, 'registerGuest'])->name('register-guest');

//Owner - Routes for properties
Route::get('/list-property', [PropertyController::class, 'listProperty'])->name('list-property');
Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
Route::post('/create-property', [PropertyController::class, 'createProperty'])->name('create-property');
Route::put('/update-property/{id}', [PropertyController::class, 'updateProperty'])->name('update-property');
Route::delete('/delete-property/{id}', [PropertyController::class, 'deleteProperty'])->name('delete-property');

//Owner - Routes for rooms
Route::get('/list-room/{id}', [RoomController::class, 'listRoom'])->name('list-room');
Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
Route::get('/room/view/{id}', [RoomController::class, 'viewRoom'])->name('room.view');
Route::get('/history/{id}', [RoomController::class, 'history'])->name('history');

Route::post('/create-room', [RoomController::class, 'createRoom'])->name('create-room');
Route::put('/update-room/{id}', [RoomController::class, 'updateRoom'])->name('update-room');
Route::delete('/delete-room/{id}', [RoomController::class, 'deleteRoom'])->name('delete-room');

//Guest Routes
Route::get('/property', [MainController::class, 'listProperty'])->name('list-property');
Route::get('/view-property/{id}', [MainController::class, 'viewProperty'])->name('view-property');
Route::get('/room-details/{id}', [MainController::class, 'roomDetails'])->name('room-details');
Route::get('/book/{id}', [MainController::class, 'book'])->name('book');
Route::get('/history/{id}', [MainController::class, 'history'])->name('history');

Route::post('/book-room/{id}', [MainController::class, 'bookRoom'])->name('book-room'); //book room for guest

// Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('alreadyLogged');
// Route::post('/register', [LoginController::class, 'register'])->name('register')->middleware('alreadyLogged'); //worked

Route::get('/admin', [LoginController::class, 'ownerDashboard']); //diplays owner dashboard
Route::get('/dashboard', [LoginController::class, 'guestDashboard']); //displays guest dhashboard

Route::get('/logout', [LoginController::class, 'logout']);  //loggin out

