<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 19/06/2021
 * Time: 21:50
 */

use App\Http\Controllers\Backend\Article\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
    Route::resource('article', ArticleController::class, [
        'as' => 'backend'
    ]);
});

Route::post('article/upload', [ArticleController::class, 'upload'])->name('backend.article.upload');
