<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeseaseController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AdminController::class,'home'])->name('admin.home');
Route::post('/AdminLogin' , [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware'=>'admin_auth','prevent_back'],function(){
    Route::get('/admin-dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin-logout',[AdminController::class,'logout'])->name('admin.logout');

    //routes for disease category
    Route::get('/disease-category',[DeseaseController::class,'disease_category']);
    Route::get('/add-disease-category',[DeseaseController::class,'add_disease_cat']);
    Route::post('/save-disease-category',[DeseaseController::class,'SaveDisCat']);
    Route::get('/edit-disease-category/{id}',[DeseaseController::class,'EditDisCat'])->name('edit.discat');
    Route::post('/update-disease-category',[DeseaseController::class,'updateDisCat']);

    //routes for disease
    Route::get('/disease',[DeseaseController::class,'disease']);
    Route::get('/add-disease',[DeseaseController::class,'add_disease']);
    Route::post('/save-disease',[DeseaseController::class,'SaveDis']);
    Route::get('/edit-disease/{id}',[DeseaseController::class,'EditDis'])->name('edit.dis');
    Route::post('/update-disease',[DeseaseController::class,'updateDis']);


    Route::get('/product-disease/{id}',[DeseaseController::class,'productsdesease'])->name('productsdesease');
    Route::post('/add-dis-prod',[DeseaseController::class,'adddisprod']);
    Route::get('/delete-dis-prod/{disease_id}/{id}',[DeseaseController::class,'deleteProd'])->name('delete.prod');


    // routes for disease video
    Route::get('/dis-video/{id}',[DeseaseController::class,'DisVideo'])->name('dis.video');
    Route::get('/add-disease-video/{id}',[DeseaseController::class,'AddDiseaseVid']);
    Route::post('/save-disease-vid',[DeseaseController::class,'SaveDisVid']);
    Route::get('/edit-disease-vid/{id}',[DeseaseController::class,'EditDisVid'])->name('edit.disvid');
    Route::post('/update-disease-vid',[DeseaseController::class,'updateDisVid']);


    //routes for disease gallary
    Route::get('/dis-gallery/{id}',[DeseaseController::class,'DisGallery'])->name('dis.gallery');
    Route::get('/add-disease-gal/{id}',[DeseaseController::class,'AddDisGal']);
    Route::post('/save-disease-gal',[DeseaseController::class,'SaveDisGal']);
    Route::get('/edit-disease-gal/{id}',[DeseaseController::class,'EditDisGal'])->name('edit.disgal');
    Route::post('/update-disease-gal',[DeseaseController::class,'updateDisGal']);



    ////////////// routes for product category///////////////
    Route::get('/product-category',[ProductController::class,'ProdCat']);
    Route::get('/add-product-category',[ProductController::class,'AddProCat']);
    Route::post('/save-product-category',[ProductController::class,'SaveProdCat']);
    Route::get('/edit-product-category/{id}',[ProductController::class,'EditProdCat'])->name('edit.prodcat');
    Route::post('/update-product-category',[ProductController::class,'updateProdCat']);


    // routs for products
    Route::get('/products',[ProductController::class,'products']);
    Route::get('/add-products',[ProductController::class,'AddProducts']);
    Route::post('/save-products',[ProductController::class,'SaveProd']);
    Route::get('/edit-products/{id}',[ProductController::class,'EditProd'])->name('edit.prod');
    Route::post('/update-products',[ProductController::class,'updateProd']);
    //routefor units button
    Route::get('/units/{id}',[ProductController::class,'units'])->name('units');
    Route::get('/add-units/{id}',[ProductController::class,'AddUnits']);
    Route::post('/save-units',[ProductController::class,'SaveUnit']);
    Route::get('/edit-units/{id}',[ProductController::class,'EditUnit'])->name('edit.units');
    Route::post('/update-units',[ProductController::class,'updateUnit']);



    //details
    Route::get('/dc-details/{id}',[DetailsController::class,'discat'])->name('dcdetails');
    Route::get('/dis-details/{id}',[DetailsController::class,'dis'])->name('disdetails');
    Route::get('/disvid-details/{id}',[DetailsController::class,'disvid'])->name('disvisdetails');
    Route::get('/disgal-details/{id}',[DetailsController::class,'disgal'])->name('disgaldetails');
    Route::get('/prodcat-details/{id}',[DetailsController::class,'prodcat'])->name('prodcatdetails');
    Route::get('/products-details/{id}',[DetailsController::class,'prod'])->name('proddetails');

    // routes for banner
    Route::get('/banner',[DetailsController::class,'banner'])->name('banner');
    Route::post('/save-banner',[DetailsController::class,'savebanner']);
    Route::get('/delete-banner/{id}',[DetailsController::class,'deletebanner'])->name('delete.banner');

});

