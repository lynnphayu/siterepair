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
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/articles', function () {
    return view('articles');
});
Route::get('/detail', function () {
    return view('detail');
});

Route::get('/departments/archi', 'HomeController@archi');
Route::get('/departments/ceit', 'HomeController@ceit');
Route::get('/departments/che', 'HomeController@che');
Route::get('/departments/civil', 'HomeController@civil');
Route::get('/departments/ec', 'HomeController@ec');
Route::get('/departments/eng', 'HomeController@eng');
Route::get('/departments/ep', 'HomeController@ep');
Route::get('/departments/ir', 'HomeController@ir');
Route::get('/departments/maths', 'HomeController@maths');
Route::get('/departments/mech', 'HomeController@mech');
Route::get('/departments/mecha', 'HomeController@mecha');
Route::get('/departments/myan', 'HomeController@myan');

Route::middleware('auth')->group(function () {
    Route::get('/posts', 'viewsController@index')->name('posts.index');
    Route::get('/posts/details/{id}', 'viewsController@details')->name('posts.details');
    Route::get('/posts/add', 'viewsController@add')->name('posts.add');
    Route::post('/posts/insert', 'postsController@insert')->name('posts.insert');
    Route::get('/posts/edit/{id}', 'viewsController@edit')->name('posts.edit');
    Route::post('/posts/update/{id}', 'postsController@update')->name('posts.update');
    Route::get('/posts/delete/{id}', 'postsController@delete')->name('posts.delete');
    Route::get('admin/dep/create','viewsController@createDep')->name('admin.createDep');
});

//api routes
Route::get('/postsapi', 'postsController@index');
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/dep/insert','HomeController@insertDep')->name('admin.insertDep');
app()->bind('postsPhotosController', App\Http\Controllers\postsPhotosController::class);
app()->bind('postsController', App\Http\Controllers\postsController::class);
