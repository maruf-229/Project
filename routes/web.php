<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthinticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Multipic;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


//email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $images=Multipic::all();
    return view('home',compact('brands','abouts','images'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users=User::all();
//    $users=DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout',[AuthinticateController::class,'logout'])->name('user.logout');

//  ========================
//  |   Admin All Routes   |
//  ========================

//categories
Route::get('/category/all',[CategoryController::class,'index'])->name('all.category');
Route::post('/store-category',[CategoryController::class,'storeCategory'])->name('store.category');
Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
Route::get('/softDelete-category/{id}',[CategoryController::class,'softDeleteCategory'])->name('softDelete.category');
Route::get('/restore-category/{id}',[CategoryController::class,'restoreCategory'])->name('restore.category');
Route::get('/p_delete-category/{id}',[CategoryController::class,'p_deleteCategory'])->name('p_delete.category');

//brands
Route::get('/brand/all',[BrandController::class,'index'])->name('all.brand');
Route::post('/store-brand',[BrandController::class,'storeBrand'])->name('store.brand');
Route::get('/edit-brand/{id}',[BrandController::class,'editBrand'])->name('edit.brand');
Route::post('/update-brand/{id}',[BrandController::class,'updateBrand'])->name('update.brand');
Route::get('/delete-brand/{id}',[BrandController::class,'deleteBrand'])->name('delete.brand');

//multi image
Route::get('/multi/image',[BrandController::class,'multiPic'])->name('multi.image');
Route::post('/store-m_image',[BrandController::class,'storeM_image'])->name('store.m_image');

//home slider
Route::get('/home/slider',[HomeController::class,'homeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'addSlider'])->name('add.slider');
Route::post('/store-slider',[HomeController::class,'storeSlider'])->name('store.slider');
Route::get('/edit-slider/{id}',[HomeController::class,'editSlider'])->name('edit.slider');
Route::post('/update-slider/{id}',[HomeController::class,'updateSlider'])->name('update.slider');
Route::get('/delete-slider/{id}',[HomeController::class,'deleteSlider'])->name('delete.slider');

//home about
Route::get('/home/about',[AboutController::class,'homeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'addAbout'])->name('add.about');
Route::post('/store-about',[AboutController::class,'storeAbout'])->name('store.about');
Route::get('/edit-about/{id}',[AboutController::class,'editAbout'])->name('edit.about');
Route::post('/update-about/{id}',[AboutController::class,'updateAbout'])->name('update.about');
Route::get('/delete-about/{id}',[AboutController::class,'deleteAbout'])->name('delete.about');


//Portfolio
Route::get('/portfolio',[AboutController::class,'portfolio'])->name('portfolio');

//Admin contact page
Route::get('/admin/contact',[ContactController::class,'adminContact'])->name('admin.contact');
Route::get('/add/contact',[ContactController::class,'addContact'])->name('add.contact');
Route::post('/store-contact',[ContactController::class,'storeContact'])->name('store.contact');
Route::get('/edit-contact/{id}',[ContactController::class,'editContact'])->name('edit.contact');
Route::post('/update-contact/{id}',[ContactController::class,'updateContact'])->name('update.contact');
Route::get('/delete-contact/{id}',[ContactController::class,'deleteContact'])->name('delete.contact');
Route::get('/admin/message',[ContactController::class,'adminMessage'])->name('admin.message');
Route::get('/delete-message/{id}',[ContactController::class,'deleteMessage'])->name('delete.message');
//home contact
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'contactForm'])->name('contact.form');


//change user profile and password
Route::get('/user/password',[ChangePass::class,'changePass'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'updatePass'])->name('password.update');

Route::get('/user/profile',[ChangePass::class,'userProfile'])->name('profile.update');
Route::post('/update/update.user/profile',[ChangePass::class,'updateUser_profile'])->name('update.user_profile');
