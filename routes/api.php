<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*---------------------------------------------TypeServicesController----------------------------------------------------*/
// http://127.0.0.1:8000/api/rechercherServices/Serrurier
Route::get('rechercherServices/{nomservice}', 'App\Http\Controllers\TypeServicesController@rechercherServices');

/*---------------------------------------------DemandeurController----------------------------------------------------*/
/*
{
      "nom":"manel",
      "prenom":"turki",
      "adresse":"rue gabes km 7",
      "email":"manelt@gmail.com",
      "telephone":"24968555",
      "ville":"sfax",
      "password":"159"
}
*/
// http://127.0.0.1:8000/api/inscrit
Route::post('inscrit', 'App\Http\Controllers\DemandeurController@inscrit');
// http://127.0.0.1:8000/api/loginDemandeur/manelt@gmail.com/159
Route::get('loginDemandeur/{email}/{password}', 'App\Http\Controllers\DemandeurController@login');






/*---------------------------------------------DemandeServicesController----------------------------------------------------*/
/*
{
    "etat":"E",
    "date":"2023-05-22",
    "demandeur_id":1,
    "reparateur_id":2
}
*/
// http://127.0.0.1:8000/api/demanderService
Route::post('demanderService', 'App\Http\Controllers\DemandeServicesController@demanderService');
// http://127.0.0.1:8000/api/consulterDemandesServices/1
Route::get('consulterDemandesServices/{id}', 'App\Http\Controllers\DemandeServicesController@consulterDemandesServices');
Route::get('AccepterDemande/{id}','App\Http\Controllers\DemandeServicesController@AccepterDemande');
Route::get('RefuseDemande/{id}','App\Http\Controllers\DemandeServicesController@RefuseDemande');
Route::get('DSEnAttanteReparateur/{id}','App\Http\Controllers\DemandeServicesController@DSEnAttanteReparateur');
Route::get('DSAccepterReparateur/{id}','App\Http\Controllers\DemandeServicesController@DSAccepterReparateur');
Route::get('DSRefucerReparateur/{id}','App\Http\Controllers\DemandeServicesController@DSRefucerReparateur');

Route::get('NBEnAttante','App\Http\Controllers\DemandeServicesController@NBEnAttante');
Route::get('NBAccepter','App\Http\Controllers\DemandeServicesController@NBAccepter');
Route::get('NBRefuser','App\Http\Controllers\DemandeServicesController@NBRefuser');
Route::get('CountNbServiceByReparateur/{id_demandeur}/{id_reparateur}','App\Http\Controllers\DemandeServicesController@CountNbServiceByReparateur');

Route::get('getServiceByReparateur/{id}', 'App\Http\Controllers\DemandeurController@getServiceByReparateur');




    /*---------------------------------------------ReparateurController----------------------------------------------------*/
// http://127.0.0.1:8000/api/inscritReparateur
/*
        "nom": "amina",
        "prenom": "turki",
        "adresse": "rue gabes km7",
        "email": "aminaturki123@gmail.com",
        "telephone": "52099520",
        "ville": "sfax",
        "evaluation": "5",
        "password": "123"
*/
Route::post('inscritReparateur', 'App\Http\Controllers\ReparateurController@inscritReparateur');
// http://127.0.0.1:8000/api/getAllReparateur
Route::get('getAllReparateur', 'App\Http\Controllers\ReparateurController@getAllReparateur');
// http://127.0.0.1:8000/api/getAllServices
Route::get('getAllServices', 'App\Http\Controllers\TypeServicesController@getAllServices');
// http://127.0.0.1:8000/api/login/aminaturki123@gmail.com/123
Route::get('login/{email}/{password}', 'App\Http\Controllers\ReparateurController@login');
// http://127.0.0.1:8000/api/consulterProfileRéparateur/1
Route::get('consulterProfileRéparateur/{id}', 'App\Http\Controllers\ReparateurController@consulterProfileRéparateur');
// http://127.0.0.1:8000/api/choisirReparateur/1
Route::get('choisirReparateur/{id}', 'App\Http\Controllers\ReparateurController@choisirReparateur');
// http://127.0.0.1:8000/api/getReparateurByService/1
Route::get('getReparateurByService/{id}', 'App\Http\Controllers\ReparateurController@getReparateurByService');
// http://127.0.0.1:8000/api/getReparateurByID/1
Route::get('getReparateurByID/{id}', 'App\Http\Controllers\ReparateurController@getReparateurByID');
// http://127.0.0.1:8000/api/getReparateurByServiceAndVille/1/Sfax
Route::get('getReparateurByServiceAndVille/{TypeServiceID}/{ville}', 'App\Http\Controllers\ReparateurController@getReparateurByServiceAndVille');




/*********************************EVALUATION***************************************************************** */
Route::get('afficheEvaluation/{id}','App\Http\Controllers\EvaluationController@afficheEvaluation');

// http://127.0.0.1:8000/api/evaluation
Route::post('evaluation', 'App\Http\Controllers\EvaluationController@EvaluerReparateur');

// http://127.0.0.1:8000/api/getEvaluationByReparateur/1
Route::get('getEvaluationByReparateur/{id}', 'App\Http\Controllers\EvaluationController@getEvaluationByReparateur');


// http://127.0.0.1:8000/api/getAllReparateurWithEvaluation
Route::get('getAllReparateurWithEvaluation', 'App\Http\Controllers\ReparateurController@getAllReparateurWithEvaluation');

// http://127.0.0.1:8000/api/getReparateurWithEvaluationByService/1
Route::get('getReparateurWithEvaluationByService/{id}', 'App\Http\Controllers\ReparateurController@getReparateurWithEvaluationByService');

// http://127.0.0.1:8000/api/getEvaluationByReparateurByDemandeur/1
Route::get('getEvaluationByReparateurByDemandeur/{id}', 'App\Http\Controllers\EvaluationController@getEvaluationByReparateurByDemandeur');


/*********************************Contact***************************************************************** */
// http://127.0.0.1:8000/api/ContacterReparateur
Route::post('ContacterReparateur', 'App\Http\Controllers\ContactController@ContacterReparateur');
Route::get('getMessageByReparateur/{id}', 'App\Http\Controllers\ContactController@getMessageByReparateur');





// php artisan config:cache && php artisan route:cache && php artisan serve