<?php

use App\Http\Controllers\CartController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',[ServiceController::class,'homepage'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(RoleMiddleware::class)->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categorydashboard', 'index')->name('categorydashboard.show');
        Route::get('/addcategory', 'showaddform')->name('categorydashboard.showaddform');
        Route::post('/addcategory', 'createcategory')->name('categorydashboard.addcategory');
        Route::get('/updatecategory/{id}','showupdateform')->name('categorydashboard.showupdateform');
        Route::put('/updatecategory/{id}', 'udpatecategory')->name('categorydashboard.update');
        Route::get('/deletecategory/{id}','confirmdelete')->name('categorydashboard.confirmdelete');
        Route::delete('deletecategory/{id}','deletecategory')->name('categorydashboard.deletecategory');
    });

    Route::controller(ServiceController::class)->group(function(){
        Route::get('/servicesdashboard','index')->name('services.show');
        Route::get('/addserviceform','showaddform')->name('services.showaddform');
        Route::post('/addservice','addservice')->name('services.addservice');
        Route::get('/updateservice/{id}','showupdateform');
        Route::put('/updateservice/{id}','updateservice');
        Route::get('/servicedelete/{id}','showconfirmdelete');
        Route::delete('/deleteservice/{id}','deleteservice');
    });

});

Route::controller(CartController::class)->group(function(){
    Route::get('/cart','index');
    Route::post("/addtocart/{id}",'store');
    Route::delete("/deletefromcart/{id}",'destroy');
    Route::delete("/deletefromcartpage/{id}",'deletefrompage');
});




Route::controller(FavouriteController::class)->group(function(){
    Route::get('/favourites','index');
    Route::post("/addtofav/{id}",'store');
    Route::delete("/deletefromfav/{id}",'destroy');
    Route::delete("/deletefromfavpage/{id}",'deletefrompage');});
require __DIR__ . '/auth.php';
