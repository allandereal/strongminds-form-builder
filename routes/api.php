<?php

use App\Http\Controllers\FieldCalculationController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FieldOptionController;
use App\Http\Controllers\FieldValidationController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormFieldController;
use App\Models\FieldValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('forms', FormController::class)->only(['index', 'store']);
Route::resource('fields', FieldController::class)->only(['index', 'store']);
Route::resource('form-fields', FormFieldController::class)
    ->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);
Route::resource('field-options', FieldOptionController::class)->only(['store', 'update', 'destroy']);

Route::post('field-validations/crud', [FieldValidationController::class, 'crud']);
Route::resource('field-validations', FieldValidationController::class)->only(['store', 'update', 'destroy']);
Route::resource('field-calculations', FieldCalculationController::class)->only(['store', 'update']);
