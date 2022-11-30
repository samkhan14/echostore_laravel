<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SectionController;
use App\Models\Section;
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
        //update admin status using ajax
        Route::post('update-admin-status', [AdminController::class, 'updateAdminStatus']);
        //sections
        Route::get('sections', [SectionController::class, 'sections']);
        // update section status
        Route::post('update-section-status', [SectionController::class, 'updateSectionStatus']);
        //delete section
        Route::get('delete-section/{id}', [SectionController::class, 'deleteSection']);
        //Add / Edit Section
        Route::match(['get','post'], 'add-edit-section/{id?}', [SectionController::class, 'addOrEditSection']);
        //categories
        Route::get('categories', [CategoryController::class, 'getCategories']);
        // update category status
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
          //Add / Edit Category
        Route::match(['get','post'], 'add-edit-category/{id?}', [CategoryController::class, 'addOrEditCategory']);
        Route::get('append-get-categories-level', [CategoryController::class, 'appendCategoryLevel']);
        Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory']);
        Route::get('delete-category-image/{id}', [CategoryController::class, 'deleteCategoryImage']);

    });


});



