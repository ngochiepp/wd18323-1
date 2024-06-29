<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::view('/about','about')->name('page.about');
Route::get('/user',function () {
    return  "List users";
});
Route::get('/user/{id}',function (int $id,)
 {
    return  "User id: $id";
 
 });
 Route::get('/user/{id}/comment/{comment_id}',function($id,$comment_id)
 {
    return  "User id: $id - comment_id: $comment_id";
 });
///Nhóm đường dẫn theo tiền tố 
Route::prefix('admin')->group(function(){
    Route::get('product',function(){
        echo 'product';
    });
    Route::get('user',function(){
        echo 'user';
    });
});
// Route::get('admin/product',function(){

// });
// Route::get('admin/user',function(){
    
// });