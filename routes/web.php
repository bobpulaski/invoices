<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvoiceController;
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

/*Route::get('partners', function (){
    $id = Auth::id();
    //$user = Auth::user('name');
    return ($id);
})/*->middleware(['auth'])->name('partners')*/

require __DIR__.'/auth.php';

Route::resource('partners', PartnerController::class)->middleware(['auth']);
//Route::resource('invoices', InvoiceController::class)->middleware(['auth']);
Route::get('invoices', 'App\Http\Controllers\InvoiceController@index')
    ->middleware(['auth'])
    ->name('invoices.index');

Route::get('invoices/create/for/partner/{id}', 'App\Http\Controllers\InvoiceController@createForPartners')
    ->middleware(['auth'])
    ->name('invoices.create.for.partners');

Route::get('invoices/create', 'App\Http\Controllers\InvoiceController@create')
    ->middleware(['auth'])
    ->name('invoices.create');

Route::post('invoices/store', 'App\Http\Controllers\InvoiceController@store')
    ->middleware(['auth'])
    ->name('invoices.store');

Route::get('invoices/{id}/edit', 'App\Http\Controllers\InvoiceController@edit')
    ->middleware(['auth'])
    ->name('invoices.edit');

Route::put('invoices/{id}', 'App\Http\Controllers\InvoiceController@update')
    ->middleware(['auth'])
    ->name('invoices.update');

Route::delete('invoices/{id}', 'App\Http\Controllers\InvoiceController@destroy')
    ->middleware(['auth'])
    ->name('invoices.destroy');
