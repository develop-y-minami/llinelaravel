<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webs\LineController;

/*
|--------------------------------------------------------------------------
| Top Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * １対１トークページ
 * HTTP Method Get
 * https://{host}/line/one-to-one
 * 
 * @param Request request リクエスト
 * @return View
 */
Route::get('/one-to-one', [LineController::class, 'oneToOne'])->name('line.oneToOne');

/**
 * LINE情報ページ
 * HTTP Method Get
 * https://{host}/line/info/{id}
 * 
 * @param Request request リクエスト
 * @param string  id      ID
 * @return View
 */
Route::get('/info/{id}', [LineController::class, 'info'])->whereNumber('id')->name('line.info');