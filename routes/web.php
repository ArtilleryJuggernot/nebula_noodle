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

/*
 * Home
 * */

Route::get("/", [\App\Http\Controllers\AccueilController::class,'show'])
    //event(new \App\Events\IncreasePlayerLevel());
    ->middleware("not_ban")
    ->name('home');

Route::get("/home", [\App\Http\Controllers\AccueilController::class,'show'])
    //event(new \App\Events\IncreasePlayerLevel());
        ->middleware("not_ban")
    ->name('home');


Route::get("/info_nebula",function (){
    return view("accueil.info_nebula");
})->name("info_nebula");

Route::get('/mises-a-jour', [\App\Http\Controllers\MAJController::class, 'index'])->name('mises-a-jour');


/*
 * Boutique
 * */


Route::get("/boutique",[\App\Http\Controllers\BoutiqueController::class,'boutique'])
    ->middleware("auth","not_ban")
    ->name("boutique");



Route::post('/acheter-item/',[\App\Http\Controllers\BoutiqueController::class,'acheterItem'])
    ->middleware("auth","not_ban")
    ->name('acheter-item');


Route::post('/acheter-competence/',[\App\Http\Controllers\BoutiqueController::class,'acheterCompetence'])
    ->middleware("auth","not_ban")
    ->name('acheter-competence');


// Route de mapping



Route::get("/profile/{ID}",[\App\Http\Controllers\ProfilController::class,"profilJoueur"])
    ->middleware("auth","not_ban")
    ->name("profile");

Route::get("/ajouter_transaction/",[\App\Http\Controllers\MarcheeController::class,'marchee'])
    ->middleware("auth","not_ban")
    ->name("ajouter_transaction");

Route::post("/traitement_transaction/",[\App\Http\Controllers\MarcheeController::class,"traiterTransaction"])
    ->middleware("auth","not_ban")
    ->name("traitement_transaction");

Route::get('/offre_marche/{ID}', [\App\Http\Controllers\MarcheeController::class, 'afficherOffreMarche'])
    ->middleware("auth","not_ban")
    ->name('offre_marche');

Route::get("/marche/",[\App\Http\Controllers\MarcheeController::class,'listeTransactionsActives'])
    ->middleware("auth","not_ban")
    ->name("marche");

Route::post('/confirm_transaction/{ID}', [\App\Http\Controllers\MarcheeController::class, 'showConfirmation'])
    ->middleware("auth","not_ban")
    ->name('confirm_transaction');

Route::post('/transaction_complete/{ID}', [\App\Http\Controllers\MarcheeController::class, 'completeTransaction'])
    ->middleware('auth',"not_ban")
    ->name('transaction_complete');


Route::get('/ventes_terminees', [\App\Http\Controllers\MarcheeController::class, 'ventesTerminees'])
    ->middleware('auth',"not_ban")
    ->name('ventes_terminees');

Route::get('/mes_ventes', [\App\Http\Controllers\MarcheeController::class, 'mesVentes'])
    ->middleware('auth',"not_ban")
    ->name('mes_ventes');

Route::get('/confirmation_annulation/{ID}', [\App\Http\Controllers\MarcheeController::class, 'confirmationAnnulation'])
    ->middleware('auth',"not_ban")
    ->name('confirmation_annulation');

Route::post('/annuler_vente/{ID}', [\App\Http\Controllers\MarcheeController::class, 'annulerVente'])
    ->middleware('auth',"not_ban")
    ->name('annuler_vente');

Route::get('/edit-profile', [\App\Http\Controllers\ProfilController::class, 'editProfile'])
    ->middleware("auth","not_ban")
    ->name('editProfile');

Route::post('/update-profile', [\App\Http\Controllers\ProfilController::class, 'updateProfile'])->name('updateProfile');

Route::post("/updatePassword",[\App\Http\Controllers\ProfilController::class,"updatePassword"])
    ->middleware("auth","not_ban")
    ->name("updatePassword");



/*
 * Admin
 * */

Route::get('/filter_logs', [\App\Http\Controllers\AdministrationController::class, 'filterLogs'])
    ->middleware("auth","not_ban","admin")
    ->name('filter_logs');

// Route pour afficher la liste des joueurs
Route::get('/players', [\App\Http\Controllers\AdministrationController::class, 'playersList'])
    ->name('playersList')
    ->middleware('auth', 'admin',"not_ban");

// Route pour bannir ou débannir un joueur
Route::post('/players/ban/{id}', [\App\Http\Controllers\AdministrationController::class, 'banPlayer'])
    ->name('banPlayer')
    ->middleware('auth', 'admin',"not_ban");

Route::get("/banned/",function (){
    return view("admin.bannedpage");
})->name("bannedPage");



Route::post('logout', [\App\Http\Controllers\ClientController::class, 'logout'])->name('logout');
Route::get('logout', [\App\Http\Controllers\ClientController::class, 'logout'])->name('logoutGET');


// Route de fin rediret Accueil

Route::any('{any}', function () {
    return Response::view('errors.404', [], 404);
})->where('any', '.*');

