<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\CandidatureController;




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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// }); 

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::get('/formation', [FormationController::class, 'index']);
 

Route::middleware(['auth:api','admin'])->group(function (){
    //CRUD des formations
Route::post('/formation/create', [FormationController::class, 'store']);
Route::delete('formation/{formation}', [FormationController::class, 'destroy']);
Route::put('formation/edit/{formation}', [FormationController::class, 'update']);
   //Candidatures
Route::get('candidature/lister', [CandidatureController::class, 'index']);
Route::post('candidature/statut',[CandidatureController::class,'statut']);
Route::post('candidature/accepter',[CandidatureController::class,'AccepterCandidature']);
Route::post('candidature/refuser',[CandidatureController::class,'RefuserCandidature']);
Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:api','user'])->group(function (){
//Candidatures
Route::post('candidature/enregistrer', [CandidatureController::class, 'store']);
Route::post('logout', [AuthController::class, 'logout']);
});
