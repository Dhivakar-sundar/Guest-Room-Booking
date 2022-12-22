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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Admin Routes

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //load admin loginpage
    Route::get('/login',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin_login'); 
    Route::POST('/login',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store'])->name('login_POST'); 
         //load admin register page
    Route::get('/Register',[App\Http\Controllers\Admin\Auth\RegisteredUserController::class, 'create'])->name('admin_register'); 
    Route::post('/Register',[App\Http\Controllers\Admin\Auth\RegisteredUserController::class, 'store'])->name('register_POST'); 
    });
Route::middleware('admin')->group(function(){
         //load admin dashboard
    Route::get('/dashboard',[App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin_dashboard'); 

    Route::get('/profile',[App\Http\Controllers\AdminHomecontroller::class, 'profile'])->name('admin_profile'); 

        //load individual room list
    Route::get('/view_room/{id}',[App\Http\Controllers\AdminHomeController::class, 'view_room'])->name('admin_view_room'); 
        //load  room
    Route::get('/room',[App\Http\Controllers\AdminHomeController::class, 'room'])->name('admin_room'); 
         //load add room form
    Route::get('/Add_room',[App\Http\Controllers\AdminHomeController::class, 'addroom'])->name('admin_addroom'); 
        //load add room submit
    Route::POST('/Add_room/p',[App\Http\Controllers\Admin\roomcontroller::class, 'addroom_create'])->name('admin_addroom_create'); 
          //load add room form
    Route::GET('/edit_room/{id}',[App\Http\Controllers\Admin\roomController::class, 'editroom'])->name('admin_editroom'); 
          //load add room submit
    Route::POST('/edit_room/p',[App\Http\Controllers\Admin\roomcontroller::class, 'editroom_create'])->name('admin_editroom_create'); 
        //delete added room from list
    Route::POST('/delete_room',[App\Http\Controllers\Admin\roomcontroller::class, 'room_delete'])->name('admin_room_delete'); 
         //booking confirm request
    Route::POST('/mybooking/confirm',[App\Http\Controllers\AdminHomeController::class, 'mybooking_confirm'])->name('mybooking_confirm'); 
        //booking pending request
    Route::POST('/mybooking/pending',[App\Http\Controllers\AdminHomeController::class, 'mybooking_pending'])->name('mybooking_pending'); 
       //customer check-out request
    Route::POST('/mybooking/checkout',[App\Http\Controllers\AdminHomeController::class, 'checkout'])->name('mybooking_check-out'); 
         //load customer list
    Route::get('/customers',[App\Http\Controllers\AdminHomeController::class, 'customer'])->name('admin_customer'); 


});
  //admin logout request
Route::POST('/logout',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin_logout'); 
    });


                //Customer routes
        Route::namespace('/')->prefix('/')->middleware('auth')->group(function(){
            //customer room list
        Route::get('/rooms',[App\Http\Controllers\usercontroller::class, 'index'])->name('rooms'); 
             //individual rooms details
        Route::get('rooms/interior/{id}',[App\Http\Controllers\usercontroller::class, 'interior'])->name('room_image'); 
             //customer booking request
        Route::POST('rooms/interior/booking',[App\Http\Controllers\usercontroller::class, 'booking'])->name('booking'); 
            //customer booking list
        Route::get('/mybooking',[App\Http\Controllers\usercontroller::class, 'mybooking'])->name('mybooking'); 
            //customer profile page
        Route::get('/profile',[App\Http\Controllers\usercontroller::class, 'profile'])->name('profile'); 



    });