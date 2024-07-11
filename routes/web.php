<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\select;

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
    $books_max = DB::table('books')
            ->orderBy('price', 'desc')
            ->limit(8)
            ->get();
    $books_min =  DB::table('books')
    ->orderBy('price', 'asc')
    ->limit(8)
    ->get();
    
    return view('home', compact('books_max', 'books_min')
);

});

Route::get('/detail/{id}', function ($id) {
    $books = DB::table('books')
        ->where('id', $id)
        ->first();

    return view('detail', compact('books'));
})->name('detail');
Route::get('books/{cate_id}', function ($cate_id) {
    $books = DB::table('books')
        ->where('category_id', '=', $cate_id)
        ->get();
// dd($books);
    return view('bookbycate', compact('books'));
})->name('book-cate');
// Route::get('/about', function () {
//     return view('about');
// });

Route::view('/about', 'about')->name('page.about');
Route::get('/user', function () {
    return  "List users";
});
Route::get('/user/{id}', function (int $id,) {
    return  "User id: $id";
});
Route::get('/user/{id}/comment/{comment_id}', function ($id, $comment_id) {
    return  "User id: $id - comment_id: $comment_id";
});
///Nhóm đường dẫn theo tiền tố 
Route::prefix('admin')->group(function () {
    Route::get('product', function () {
        echo 'product';
    });
    Route::get('user', function () {
        echo 'user';
    });
});
// Route::get('admin/product',function(){

// });
// Route::get('admin/user',function(){

// });
Route::get('/posts', function () {
    //  lấy dữ liệu 
    // $posts = DB::table('post')->get();
    // lấy 10 bản ghi 
    // $posts = DB::table('posts')->select('id', 'title','view')
    // ->limit(10)->get();
    // update data
    // DB::table('posts')
    // ->where('id', '=',13)
    // ->update(
    //     [
    //         'title' => 'Dữ liệu cập nhật'
    //     ]
    //     );
    // delete data
    // DB::table('post')->delete(18);
    // // lấy ra các bài viết có view > 800
    // $posts = DB::table('posts')
    // ->where('view', '>', 800)
    // ->get();
    // nối 2 bảng
    $posts = DB::table('posts')
        ->join('categories', 'cat_id', '=', 'categories.id')
        ->get();
    return view('post-list', compact('posts'));
    // return $posts;

    Route::get('/poyss', function () {
        $posts = DB::table('posts')
            ->orderBy('view', 'desc')
            ->limit(8)
            ->get();

        return view('post-list', compact('posts'));
    });



    // hiển thị bài viết theo danh mục 
    Route::get('category(id)', function ($id) {
        $posts = DB::table('books')
            ->where('cate_id', '=', $id)
            ->get();

        return view('post-list', compact('posts'));
    });
    // chi tiết bài viết 
    Route::get('/post/(id)', function ($id) {
        $posts = DB::table('posts')
            ->where('id', $id)
            ->first();

        return $posts;
    });

    // Route::get('/', function () {
        // $books_max = DB::table('books')
        //     ->orderBy('price', 'desc')
        //     ->limit(8)
        //     ->get();

    //     // dd($books_max);
    //     return view('welcome');
    // });
});
