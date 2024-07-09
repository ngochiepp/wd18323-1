<?php

use Illuminate\Support\Facades\DB;
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


Route::get('/posts',function(){
    //lấy all
        // $posts=DB::table('posts')->get();
    //lấy giới hạn 10 bản ghi
        // $posts=DB::table('posts')->limit(10)->get();
    /// lấy theo cột
        // $posts=DB::table('posts')
        // ->select('id','title','view')
        // ->limit(10)->get();
    ///Lấy theo điều kiện
        // $posts=DB::table('posts')
        // ->where('view','>',800)
        // ->get();
    /// update
        DB::table('posts')
        ->where('id','=',13)
        -> update(['title'=>'Alo']);
    /// delete
        // DB::table('posts')->delete(13);

    ///Join
        $posts = DB::table('posts')
        ->join('categories','cate_id','=','categories.id')
        ->get();
        return view('list',compact('posts'));





});

