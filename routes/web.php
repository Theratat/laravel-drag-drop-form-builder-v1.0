<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

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
    return redirect()->route('survey.index');
});

Route::resource('survey',SurveyController::class);
Route::controller(SurveyController::class)->group(function () {
    Route::get('survey/delete/{id}', 'destroy')->name('survey.delete');
    Route::get('survey/qr/{id}', 'qr')->name('survey.qr');
    Route::get('survey/formCreatePage', 'formCreatePage')->name('survey.formCreatePage');
    Route::post('survey/storeform', 'storeform')->name('survey.storeform');
    Route::get('survey/SurveyGeneratePage/{id}', 'SurveyGeneratePage')->name('survey.SurveyGeneratePage');
    Route::get('survey/entryShow/{id}', 'entryShow')->name('survey.entryShow');
    Route::post('survey/storeresult', 'storeresult')->name('survey.storeresult');
});

Route::get('/surveyThanks', function () {
    return view('surveys.thanks');
})->name('survey.thanks');
