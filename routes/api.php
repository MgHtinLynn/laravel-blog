<?php

use App\Http\Controllers\Backend\Article\ArticleController;
use App\Http\Controllers\Frontend\Article\ArticleServer;
use App\Http\Controllers\Frontend\Article\RecommendListServer;
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

Route::name('backend.')->group(function () {
    Route::get('article-list', ArticleServer::class)->name('article.list');
});

Route::get('article-recommend-list', RecommendListServer::class)->name('article.recommend.list');
