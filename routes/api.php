<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 
 Route::get('esqueletos',[App\Http\Controllers\EsqueletoController::class,'index'])->middleware(['check.auth'])->name('get.esqueletos');
 Route::get('esqueletos/{id}',[App\Http\Controllers\EsqueletoController::class,'show'])->middleware(['check.auth']);
 Route::post('esqueletos',[App\Http\Controllers\EsqueletoController::class,'store'])->middleware(['check.auth']);
 Route::put('esqueletos/{id}',[App\Http\Controllers\EsqueletoController::class,'update'])->middleware(['check.auth']);
 Route::delete('esqueletos/{id}',[App\Http\Controllers\EsqueletoController::class,'delete'])->middleware(['check.auth']);

 
 Route::get('tipodealunos',[App\Http\Controllers\TipoDeAlunoController::class,'index'])->middleware(['check.auth']);
 Route::get('tipodealunos/{id}',[App\Http\Controllers\TipoDeAlunoController::class,'show'])->middleware(['check.auth']);
 Route::post('tipodealunos',[App\Http\Controllers\TipoDeAlunoController::class,'store']);
 Route::put('tipodealunos/{id}',[App\Http\Controllers\TipoDeAlunoController::class,'update'])->middleware(['check.auth']);
 Route::delete('tipodealunos/{id}',[App\Http\Controllers\TipoDeAlunoController::class,'delete'])->middleware(['check.auth']);
 
 Route::get('tipo_de_escolas',[App\Http\Controllers\Tipo_de_escolaController::class,'index'])->middleware(['check.auth']);
 Route::get('tipo_de_escolas/{id}',[App\Http\Controllers\Tipo_de_escolaController::class,'show'])->middleware(['check.auth']);
 Route::post('tipo_de_escolas',[App\Http\Controllers\Tipo_de_escolaController::class,'store'])->middleware(['check.auth']);
 Route::put('tipo_de_escolas/{id}',[App\Http\Controllers\Tipo_de_escolaController::class,'update'])->middleware(['check.auth']);
 Route::delete('tipo_de_escolas/{id}',[App\Http\Controllers\Tipo_de_escolaController::class,'delete'])->middleware(['check.auth']);
 
 Route::get('salas',[App\Http\Controllers\SalaController::class,'index'])->middleware(['check.auth']);
 Route::get('salas/{id}',[App\Http\Controllers\SalaController::class,'show'])->middleware(['check.auth']);
 Route::post('salas',[App\Http\Controllers\SalaController::class,'store'])->middleware(['check.auth']);
 Route::put('salas/{id}',[App\Http\Controllers\SalaController::class,'update'])->middleware(['check.auth']);
 Route::delete('salas/{id}',[App\Http\Controllers\SalaController::class,'delete'])->middleware(['check.auth']);

 
 Route::apiResource('casas',App\Http\Controllers\CasaController::class)->middleware(['check.auth']);
 
 Route::apiResource('bolos',App\Http\Controllers\BoloController::class)->middleware(['check.auth']);   

  
 
 Route::apiResource('grupotabelas',App\Http\Controllers\GrupoTabelaController::class)->middleware(['check.auth']);

 
 Route::apiResource('tipodocumentos',App\Http\Controllers\TipoDocumentoController::class)->middleware(['check.auth']);

 
 Route::apiResource('tipocontratos',App\Http\Controllers\TipoContratoController::class)->middleware(['check.auth']);

 
 Route::apiResource('tipodocumentos',App\Http\Controllers\TipoDocumentoController::class)->middleware(['check.auth']);
 

 
 Route::apiResource('grupotabgenerics',App\Http\Controllers\GrupoTabGenericController::class)->middleware(['check.auth']);

 
 Route::apiResource('tabelagenericas',App\Http\Controllers\TabelaGenericaController::class)->middleware(['check.auth']);
 
 Route::apiResource('tabelagenericas',App\Http\Controllers\TabelaGenericaController::class)->middleware(['check.auth']);
 
 Route::apiResource('grupotabelatabelagenericas',App\Http\Controllers\GrupoTabelaTabelaGenericaController::class)->middleware(['check.auth']);