<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardcontroller;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']] , function(){
	Route::get('/dashboard',[dashboardcontroller::class,'index'])->name('dashboard');
});
Route::group(['middleware' => ['auth']] , function(){
	Route::get('/profile',[dashboardcontroller::class,'profile'])->name('profile');
});
Route::group(['prefix' => 'middleware', 'middleware' => ['role:admin']], function() {
Route::get('/notification',[dashboardcontroller::class,'notification'])->name('notification');
});
Route::get('/sampleform',[dashboardcontroller::class,'sampleform'])->name('sampleform');

require __DIR__.'/auth.php';

Route::get('{$controller}/{func?}',function($controller,$func='index'){
       $controller = '\App\Http\Controller\\'. $controller.'Controller';
       $controller = new $controller;
       return $controller->{$func}();
 
});