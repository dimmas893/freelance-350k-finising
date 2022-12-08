<?php

use App\Models\Customor;
use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\Suplier;
use App\Models\Wharehouse;
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
    $suplier = Suplier::all();
    $wharehouse = Wharehouse::all();
    $customor = Customor::all();
    $inbound = Inbound::sum('volume');
    $outbound = Outbound::sum('volume');
    // $customor = Outbound::with('p')->where('customor', '!=' , null)->whereBetween('tanggal', [$request->awal, $request->akhir])->get();
    return view('dashboard', compact('suplier', 'wharehouse', 'customor', 'inbound', 'outbound'));
})->middleware(['auth'])->name('dashboard');

//suplier
Route::get('/suplier', [App\Http\Controllers\SuplierController::class, 'index'])->name('suplier');
Route::post('/suplier/store', [App\Http\Controllers\SuplierController::class, 'store'])->name('suplier-store');
Route::get('/suplier/all', [App\Http\Controllers\SuplierController::class, 'all'])->name('suplier-all');
Route::get('/suplier/edit', [App\Http\Controllers\SuplierController::class, 'edit'])->name('suplier-edit');
Route::post('/suplier/update', [App\Http\Controllers\SuplierController::class, 'update'])->name('suplier-update');
Route::delete('/suplier/delete', [App\Http\Controllers\SuplierController::class, 'delete'])->name('suplier-delete');


//wharehouse
Route::get('/wharehouse', [App\Http\Controllers\WharehouseController::class, 'index'])->name('wharehouse');
Route::post('/wharehouse/store', [App\Http\Controllers\WharehouseController::class, 'store'])->name('wharehouse-store');
Route::get('/wharehouse/all', [App\Http\Controllers\WharehouseController::class, 'all'])->name('wharehouse-all');
Route::get('/wharehouse/edit', [App\Http\Controllers\WharehouseController::class, 'edit'])->name('wharehouse-edit');
Route::post('/wharehouse/update', [App\Http\Controllers\WharehouseController::class, 'update'])->name('wharehouse-update');
Route::delete('/wharehouse/delete', [App\Http\Controllers\WharehouseController::class, 'delete'])->name('wharehouse-delete');


//customor
Route::get('/customor', [App\Http\Controllers\CustomorController::class, 'index'])->name('customor');
Route::post('/customor/store', [App\Http\Controllers\CustomorController::class, 'store'])->name('customor-store');
Route::get('/customor/all', [App\Http\Controllers\CustomorController::class, 'all'])->name('customor-all');
Route::get('/customor/edit', [App\Http\Controllers\CustomorController::class, 'edit'])->name('customor-edit');
Route::post('/customor/update', [App\Http\Controllers\CustomorController::class, 'update'])->name('customor-update');
Route::delete('/customor/delete', [App\Http\Controllers\CustomorController::class, 'delete'])->name('customor-delete');


//inbound
Route::get('/inbound', [App\Http\Controllers\InboundController::class, 'index'])->name('inbound');
Route::post('/inbound/store', [App\Http\Controllers\InboundController::class, 'store'])->name('inbound-store');
Route::get('/inbound/all', [App\Http\Controllers\InboundController::class, 'all'])->name('inbound-all');
Route::get('/inbound/total', [App\Http\Controllers\InboundController::class, 'total'])->name('inbound-total');
Route::get('/inbound/edit', [App\Http\Controllers\InboundController::class, 'edit'])->name('inbound-edit');
Route::post('/inbound/update', [App\Http\Controllers\InboundController::class, 'update'])->name('inbound-update');
Route::delete('/inbound/delete', [App\Http\Controllers\InboundController::class, 'delete'])->name('inbound-delete');



//outbound
Route::get('/outbound/customor_cari', [App\Http\Controllers\OutboundController::class, 'customor_cari'])->name('outbound-customor_cari');
Route::get('/outbound/wharehouse_cari', [App\Http\Controllers\OutboundController::class, 'wharehouse_cari'])->name('outbound-wharehouse_cari');
Route::get('/outbound/customor', [App\Http\Controllers\OutboundController::class, 'customor'])->name('outbound-customor');
Route::get('/outbound/all', [App\Http\Controllers\OutboundController::class, 'all'])->name('outbound-all');
Route::get('/outbound/total', [App\Http\Controllers\OutboundController::class, 'total'])->name('outbound-total');
Route::get('/outbound', [App\Http\Controllers\OutboundController::class, 'index'])->name('outbound');
Route::post('/outbound/store', [App\Http\Controllers\OutboundController::class, 'store'])->name('outbound-store');
Route::get('/outbound/edit', [App\Http\Controllers\OutboundController::class, 'edit'])->name('outbound-edit');
Route::get('/outbound/editcustomor', [App\Http\Controllers\OutboundController::class, 'editcustomor'])->name('outbound-editcustomor');
Route::post('/outbound/update', [App\Http\Controllers\OutboundController::class, 'update'])->name('outbound-update');
Route::post('/outbound/updatecustomor', [App\Http\Controllers\OutboundController::class, 'updatecustomor'])->name('outbound-updatecustomor');
Route::delete('/outbound/delete', [App\Http\Controllers\OutboundController::class, 'delete'])->name('outbound-delete');


require __DIR__.'/auth.php';
