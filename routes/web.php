<?php

use App\Http\Controllers\pageController;
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

Route::get('/', [pageController::class, 'homePage']);

Route::get('/characters', [pageController::class, 'getCharacters']);

Route::get('/lightcones',[pageController::class, 'getLightcones']);

Route::get('/lightcone/{name}', [pageController::class, 'getLightcone']);

Route::get('/character/{name}', [pageController::class, 'getCharacter']);

Route::get('/banners', [pageController::class, 'getBanners']);

Route::get('/relics', [pageController::class, 'getRelics']);

Route::get('/materials', [pageController::class, 'getMaterials']);
