<?php

use App\Http\Controllers\ActeurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreController;
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

Route::get('/', function () {
    return view('welcome');
});

defaultRoutesFor("categorie", CategorieController::class);
defaultRoutesFor("acteur", ActeurController::class);
defaultRoutesFor("livre", LivreController::class);