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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', function() {
    return view('admin.index');
})->middleware('admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin/pages', 'Admin\PagesController', [
            'names' => [
                'index' => 'page',
                'create' => 'page.create',
                'edit' => 'page.edit',
                'store' => 'page.store',
                'update' => 'page.update',
                'destroy' => 'page.destroy',
            // etc...
            ]
        ]
);
Route::resource('/admin/users', 'Admin\UsersController', [
            'names' => [
                'index' => 'user',
                'edit' => 'user.edit',
                'update' => 'user.update',
            // etc...
            ]
        ]
);
Route::resource('/admin/blogs', 'Admin\BlogController', [
            'names' => [
                'index' => 'blog',
                'create' => 'blog.create',
                'store' => 'blog.store',
                'edit' => 'blog.edit',
                'update' => 'blog.update',
                'destroy' => 'blog.destroy',
            // etc...
            ]
        ]
);
