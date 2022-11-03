<?php

use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\Api\BookCirculationApiController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\UserApiController;
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

Route::post('api/login', [PassportAuthController::class,'login']);

Route::prefix('api')->name('api.')->middleware(['auth:api','lang'])->group(function () {
    Route::apiResource('/users', UserApiController::class);
    Route::apiResource('/books', BookApiController::class);

    Route::group(['prefix'=>'book-circulations'], function(){
        Route::get('/',[BookCirculationApiController::class,'issueBookList']);
        Route::post('/issue-book',[BookCirculationApiController::class,'submitIssueBook']);
        Route::patch('/return-book/{user}/submit',[BookCirculationApiController::class,'submitReturnBook']);
    });

});