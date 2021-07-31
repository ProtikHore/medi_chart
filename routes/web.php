<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PositionController;
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

Route::get('clear', function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('medicine_list', [MedicineController::class, 'index']);

Route::get('position', [PositionController::class, 'addPosition']);
Route::post('save/position', [PositionController::class, 'savePosition']);
Route::get('get/position/edit/data/{id}', [PositionController::class, 'getEditData']);

Route::get('medicine_chart', [MedicineController::class, 'medicineChart']);
Route::post('medicine/add/to/chart', [MedicineController::class, 'addToChart']);
Route::get('get/medicine/chart/edit/data/{id}', [MedicineController::class, 'getMedicineChartData']);
