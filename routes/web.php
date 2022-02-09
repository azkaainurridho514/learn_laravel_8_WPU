<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']); // contoh route model binding (tidak usah mengirim id untuk menampilkan 1 postingan tapi di belakang layar identifire post menggunakan id dan jika di kasih (:slug) maka identifire akan d ganti menjadi slug)

Route::get('/categories', function(){
    return view('categories', [
        'categories' => Category::all()
    ]);
});
// Route::get('/category/{category:slug}', function(Category $category){
//      return view('posts', [
//          'posts' => $category->posts->load('category', 'user'), //posts adalah method di model category
//          'title' => "Category : $category->name"
//      ]);
// });
// Route::get('/author/{user:username}', function(User $user){
//      return view('posts', [
//          'posts' => $user->posts->load('category', 'user'), // eager lazy loading 
//          'title' => "Posts By : $user->name"
//      ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
