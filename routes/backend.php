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

    Route::group(['prefix' => 'book-circulations','as'=>'circulations.'], function () {
        Route::get('/',[BookCirculationController::class,'issueBook'])->name('issue');
        Route::get('issue-book',[BookCirculationController::class,'createIssueBook'])->name('create.issue');
        Route::post('issue-book',[BookCirculationController::class,'submitIssueBook'])->name('submit.issue');
        Route::get('return-book/{user}',[BookCirculationController::class,'returnBook'])->name('return.book');
        Route::patch('return-book/{user}/submit',[BookCirculationController::class,'submitReturnBook'])->name('submit.return.book');
        Route::get('book-details/{bookCirculation}',[BookCirculationController::class,'view'])->name('view');
    });

    Route::get('lang/change/{lang}', [LangController::class, 'lang_change'])->name('lang.change');

});

