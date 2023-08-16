<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
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

/* HOME */
Route::get('/', [HomeController::class, 'login'])->middleware("isLogin")->name("login");
Route::post('/login', [HomeController::class, 'authenticate'])->name("login.proses");
Route::get('/logout', [HomeController::class, 'logout'])->name("logout");
Route::get('/forbidden', [HomeController::class, 'forbidden'])->name("forbidden");


// Yang Sudah Login Admin
Route::group(["middleware" => ["isAdminOrUser"]], function(){
    Route::get('/dashboard',[DashboardController::class, 'index']);
});
// routes/web.php

Route::get('/search', [SearchController::class, 'showSearchForm'])->name('search');
Route::post('/search', [SearchController::class, 'search'])->name('search.submit');
Route::post('/pencarian/favorite/{kata}', [SearchController::class, 'markFavorite'])->name('mark.favorite');
Route::get('/history', [SearchController::class, 'showHistory'])->name('history');
Route::get('/history/{kata}', [SearchController::class, 'showHistoryMeaning'])->name('history.meaning');
Route::get('/favorit', [SearchController::class, 'showFavorites'])->name('favorites');
Route::get('/favorite/{kata}', [SearchController::class, 'showFavoriteMeaning'])->name('favorite.meaning');




