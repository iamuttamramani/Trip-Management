<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addNewBusController;
use App\Http\Controllers\addBusDetailsController;
use App\Http\Controllers\busesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\tripsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\bookingController;

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
Route::middleware(['checkuser'])->group(function () {

    Route::get('/ex', function () {
        return view('ex');
    });

    /* ----- */



    Route::get('/staff', function () {
        return view('staff');
    });



    Route::get('/add/bus', function () {
        return view('add-new-bus');
    });

    Route::get('/normal/bus/details', function () {
        return view('add-a-bus-details-normal');
    })->name('add-normal-bus-detail');

    Route::get('/DoubleDecker/bus/details', function () {
        return view('add-a-bus-details-dd');
    });

    Route::get('/NormalBus/NormalSeats', function () {
        return view('bus-layout-normal-seats');
    });

    Route::get('/NormalBus/BerthSeats', function () {
        return view('bus-layout-berth-seats');
    });

    // --------------------------------------------------
    // Dashboard Controller

    Route::get('/',[dashboardController::class,'home'])->name('home');

    // buses Controller

    Route::get('/bus',[busesController::class,'buses'])->name('buses');
    Route::get('/bus/update',[busesController::class,'updateBus'])->name('bus.update');

    // addNewBusController

    Route::get('/insert-data',[addNewBusController::class,'insertData'])->name('insert.data');
    Route::get('/normal/bus/details/page',[addNewBusController::class,'goToBusDetailPage'])->name('go-to-bus-detail-page');
        // - bus Layout
        Route::post('/submit-seats', [addNewBusController::class, 'store'])->name('seats.store');
        // Route::get('/seats', function () {
        //     return view('seats');
        // });

    // addBusDetailsController

    Route::POST('add/bus/details/{username}/{busUsername}',[addNewBusController::class,'addDetails'])->name('submit.add-a-bus-details');

 

    // Trips Controller


    Route::get('/routes',[tripsController::class,'routesPage'])->name('routes');
    Route::get('/trip/create',[tripsController::class,'tripCreate'])->name('trip.create');
    Route::POST('/trip/store',[tripsController::class,'tripStore'])->name('trip.store');
    Route::get('/Booking/manage/data/{trip_id}',[tripsController::class,'bookingManage'])->name('booking.manage');
    // Route::get('/Bookings/manage/{bus}',[tripsController::class,'bookingManagePage'])->name('booking.manage.page');

    Route::get('/Booking/manage/{trip}',function ($bus) {
        dd($busa);
    })->name('booking.manage.page');

    //Booking Controller

    // Route::get('book/{trip_id}',function () {
    //     echo "Booking Page is Called";
    // });

    Route::get('/book/{trip_id}',[bookingController::class,'bookingPage'])->name('booking.page');
    Route::POST('/booking',[bookingController::class,'bookingStore'])->name('booking.store');

    // Profile Controller

    Route::get('/profile',[profileController::class,'profilePage'])->name('profile.page');
    Route::POST('/profile/update',[profileController::class,'profileUpdate'])->name('profile.update');
    Route::get('/logout', function () {
        session()->flush(); // Destroy all session data
        return redirect()->route('login.page'); // Redirect to login page
    })->name('logout');

    // --------------------------------------------------------------------------------
    // TEMP ROUTES

});

// Login | Register

   // login | Register Page

   Route::get('/register',[usersController::class,'registrationPage'])->name('registration.page');
   Route::get('/login',[usersController::class,'loginPage'])->name('login.page');
   Route::get('/register/submit',[usersController::class,'submitRegister'])->name('submit.register');
   Route::get('/login/submit',[usersController::class,'submitLogin'])->name('submit.login');