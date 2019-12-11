<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@get_welcome');
Route::get('basket/add/{id}','HomeController@add_basket');
Route::get('basket/clear','HomeController@basket_clear');
Route::get('basket/checkout','HomeController@basket_checkout');
Route::get('basket/delete/{id}','HomeController@product_basket_delete');
Route::get('/email','HomeController@email_test');


//Route::get('/admin','AdminGetController@admin');
//Route::post('/admin','AdminPostController@post_admin');
//Route::get('/admin/{lang?}','HomeController@test');
//Route::get('/changelang/{lang?}','HomeController@changelang');
//Route::post('/admin','HomeController@post_test');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin/dashboard','AdminGetController@dashboard');
    Route::get('/admin/addproduct','AdminGetController@addproduct');
    Route::post('/admin/addproduct','AdminPostController@addproduct');
    Route::post('/admin/addcategory','AdminPostController@addcategory');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
