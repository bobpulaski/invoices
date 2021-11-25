<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('partners', function (){
    $id = Auth::id();
    //$user = Auth::user('name');
    return ($id);
})/*->middleware(['auth'])->name('partners')*/;

require __DIR__.'/auth.php';

/*Route::resource('partners', PartnerController::class);*/
Route::get('partners', 'App\Http\Controllers\PartnerController@index')
    ->name('partners.index');
