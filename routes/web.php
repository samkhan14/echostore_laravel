<?php

use App\Http\Controllers\Admin\AdminController;
use App\Models\Vendor;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controller\Admin')->group(function(){

    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function(){
        Route::get('dashboard',[AdminController::class,'dashboard']);
        Route::get('logout', [AdminController::class, 'logout']);
        Route::match(['get','post'], 'update-admin-password', [AdminController::class, 'updateAdminPassword']);
        //Route::post('update-admin-details', 'AdminController@updateAdminDetails');
        Route::match(['get','post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails']);
         Route::post('check-admin-password','AdminController@checkAdminPassword');
        //  Route::post('update-admin-details','AdminController@updateAdminDetails');
        Route::match(['get','post'], 'update-vendor-details/{slug}', [AdminController::class, 'updateVendorDetails']);

        // view admins / subadmins / Vendors
        Route::get('admins/{type?}', [AdminController::class, 'admins']);
        //view vendor details
        Route::get('view-vendor-details/{id}', [AdminController::class, 'viewVendorDetails']);
    });


});



