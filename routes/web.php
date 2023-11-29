<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", [\App\Http\Controllers\AccueilController::class,'show']
    //event(new \App\Events\IncreasePlayerLevel());
)->middleware('auth') // TODO : Remove ça et adapter le code pour que le joueur puisse accéder au menu de base + ne pas afficher les autres section dans le bandeau si le joueur n'est pas log
    ->name('home');

Route::get('/clearall',[\App\Http\Controllers\UtilsDev::class,'clearAll']);

Route::get('/mises-a-jour', [\App\Http\Controllers\MAJController::class, 'index'])->name('mises-a-jour');

Route::get("/boutique",[\App\Http\Controllers\BoutiqueController::class,'boutique'])
    ->middleware("auth")
    ->name("boutique");


Route::post('logout', [\App\Http\Controllers\ClientController::class, 'logout'])->name('logout');

Route::get("/info_nebula",function (){
    return view("accueil.info_nebula");

})->name("info_nebula");

Route::post('/acheter-item/',[\App\Http\Controllers\BoutiqueController::class,'acheterItem'])
    ->middleware("auth")
    ->name('acheter-item');

Route::post('/acheter-competence/',[\App\Http\Controllers\BoutiqueController::class,'acheterCompetence'])
    ->middleware("auth")
    ->name('acheter-competence');

Route::get("/profile/{ID}",[\App\Http\Controllers\ProfilController::class,"profilJoueur"])
    ->middleware("auth")
    ->name("profile");

Route::get("/ajouter_transaction/",[\App\Http\Controllers\MarcheeController::class,'marchee'])
    ->middleware("auth")
    ->name("ajouter_transaction");

Route::post("/traitement_transaction/",[\App\Http\Controllers\MarcheeController::class,"traiterTransaction"])
    ->middleware("auth")
    ->name("traitement_transaction");

Route::get('/offre_marche/{ID}', [\App\Http\Controllers\MarcheeController::class, 'afficherOffreMarche'])
    ->middleware("auth")
    ->name('offre_marche');

Route::get("/marche/",[\App\Http\Controllers\MarcheeController::class,'listeTransactionsActives'])
    ->middleware("auth")
    ->name("marche");

Route::post('/confirm_transaction/{ID}', [\App\Http\Controllers\MarcheeController::class, 'showConfirmation'])
    ->middleware("auth")
    ->name('confirm_transaction');

Route::post('/transaction_complete/{ID}', [\App\Http\Controllers\MarcheeController::class, 'completeTransaction'])
    ->middleware('auth')
    ->name('transaction_complete');
