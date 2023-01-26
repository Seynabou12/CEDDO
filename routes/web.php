<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActeurController;
use App\Http\Controllers\ActualitesController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NouveauteController;
use App\Models\Article;
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

Route::get('/welcom', function () {
    return view('welcome');
});


Route::get('/contact', function () {
    return view('acceuils.contact');
});

Route::get('/apropos', [AproposController::class, 'apropos']);
Route::get('/', [AccueilController::class, 'index']);
Route::get('/actualites', [ActualitesController::class, 'actualite']);
Route::get('/nouveautes', [NouveauteController::class, 'nouveautes']);
Route::get('/dashbord', [DashbordController::class, 'dashbord'])->name('dashbord');
Route::get("/login", [LoginController::class, 'formLogin'])->name('formLogin');
Route::post("/login", [LoginController::class, 'login'])->name('login');


defaultRoutesFor("categorie", CategorieController::class);
defaultRoutesFor("acteur", ActeurController::class);
defaultRoutesFor("livre", LivreController::class);
defaultRoutesFor("nouveaute", NouveauteController::class);
defaultRoutesFor("actualite", ActualitesController::class);

