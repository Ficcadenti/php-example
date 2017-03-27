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
Route::get('/', function () { //nomino la rotta 'home'
       return "Benvenuti in esempio_01";
});

Route::get('/home', function () {
        return view('welcome');
});

Route::any('/any', function() {
    return redirect('index.html');
});

Route::get('/post/{id?}', function($id = 1) {
      return "You requested post with ID = " . $id;
});
