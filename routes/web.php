<?php

use App\Post;
use Illuminate\Http\Request;

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

Route::get('/tes', function () {
    return view('show');
});

Auth::routes();

Route::get('/group/{post}/comments', function (Post $post) {
    return $post->comments;
});

Route::post('/group/{post}/comments', function (Request $request, Post $post) {
    $comment = new \Laravelista\Comments\Comment;
    $comment->commenter()->associate(auth()->user());
    $comment->commentable()->associate($post);
    $comment->comment = $request->comment;
    $comment->approved = true;
    $comment->save();

    return $comment;
});

Route::group(['middleware' => ['auth', 'admin']], function (){
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('tambah-group', [App\Http\Controllers\PostController::class, 'create'])->name('tambahGroup');
    Route::get('tambah-artikel', [App\Http\Controllers\ArtikelController::class, 'upload'])->name('tambahArtikel');
    Route::post('/dashboard', [App\Http\Controllers\PostController::class, 'post']);
    Route::post('upload/proses', [App\Http\Controllers\ArtikelController::class, 'proses_upload']);

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);

    // edit user
    Route::get('user', [App\Http\Controllers\UserController::class, 'viewUser']);
    Route::get('editUser/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::patch('updateUser/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('deleteUser/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

    
    //edit artikel
    Route::get('edit-artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'edit']);
    Route::patch('updateArtikel/{id}', [App\Http\Controllers\ArtikelController::class, 'update']);
    Route::get('delete-artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'destroy']);

    // edit group
    Route::get('/edit-group/{id}', [App\Http\Controllers\PostController::class, 'edit']);
    Route::patch('/update-group/{id}', [App\Http\Controllers\PostController::class, 'update']);
    Route::get('/delete-group/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
    // status online/offlie user
    Route::get('/check',  [App\Http\Controllers\UserController::class, 'userOnlineStatus']);
    Route::get('/checkStatus',  [App\Http\Controllers\UserController::class, 'userStatus']);

    //edit slider
    Route::get('slider', [App\Http\Controllers\SliderController::class, 'index'])->name('slider');
    Route::get('tambah-slider', [App\Http\Controllers\SliderController::class, 'createSlider'])->name('tambahSlider');
    Route::post('/slider', [App\Http\Controllers\SliderController::class, 'store'])->name('postSlider');
    Route::get('editSlider/{id}', [App\Http\Controllers\SliderController::class, 'edit'])->name('editSlider');
    Route::patch('updateSlider/{id}', [App\Http\Controllers\SliderController::class, 'update'])->name('updateSlider');
    Route::get('deleteSlider/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('deleteSlider');

    // // ========== Category Mobil
    // Route::get('/create-category-mobil', [App\Http\Controllers\CategoryMobilController::class, 'createCategory']);
    // Route::post('/upload-category-mobil', [App\Http\Controllers\CategoryMobilController::class, 'store']);

});

Route::group(['middleware' => ['auth', 'pending']], function (){
    Route::get('/pending', [App\Http\Controllers\UserController::class, 'pendingUser']);
});

Route::group(['middleware' => ['auth', 'approve']], function () {
    Route::get('/group', 'PostController@index')->name('post.index');
    Route::get('/group/{post}', 'PostController@show')->name('post.show');

    //artikel ==============================
    Route::get('/', [App\Http\Controllers\ArtikelController::class, 'view']);
    Route::get('/artikel/{artikel}', [App\Http\Controllers\ArtikelController::class, 'show']);

    //profile ======================
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::get('edit-profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('edit-password', [App\Http\Controllers\PasswordController::class, 'edit']);
    //edit profile user
    // Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('edit-profile', 'ProfileController@update')->name('profile.update');
    // Route::get('password', 'PasswordController@edit')->name('user.password.edit');
    Route::patch('edit-password', 'PasswordController@update')->name('user.password.update');

});

Route::get('/daftar', [App\Http\Controllers\CategoryController::class, 'tes']);

Route::get('dropdownlist', [App\Http\Controllers\CategoryController::class, 'getJenisMobil']);
Route::get('dropdownlist/gettipemobils/{id}',[App\Http\Controllers\CategoryController::class, 'getTipeMobil']);

