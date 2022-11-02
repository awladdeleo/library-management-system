<?php
/**
 * Created by PhpStorm.
 * User: awlad
 * Date: 10/28/2022
 * Time: 2:42 AM
 */


use App\Http\Controllers\Backend\BookCirculationController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\LangController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'web']], function () {

    Route::post('users/active/{user}',[UserController::class,'activeUser'])->name('users.active');
    Route::post('books/active/{book}',[BookController::class,'activeBook'])->name('books.active');

    Route::resources([
        'users' => UserController::class,
        'books' => BookController::class,
    ]);

    Route::group(['prefix' => 'book-circulation','as'=>'circulation.'], function () {
        Route::get('issue',[BookCirculationController::class,'issueBook'])->name('issue.book');
        Route::get('return',[BookCirculationController::class,'returnBook'])->name('return.book');
    });

    Route::get('lang/change/{lang}', [LangController::class, 'lang_change'])->name('lang.change');

});

