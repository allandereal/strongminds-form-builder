<?php

use App\Exports\ExportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('home');
});

Route::get('/export-forms/{form}', function (Request $request, $form){
    return Excel::download(new ExportForm($form), 'form_'.$form.'.'.$request->file_type ?? 'csv');
});
