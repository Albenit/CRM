<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyPersonsController;
use App\Http\Controllers\LeadDataController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// USED FOR TESTING
// route::post('update/{id}',[FamilyPersonsController::class,'updateFamilyPerson']);
// route::post('create/{leadId}/{personId}',[LeadDataController::class,'createLeadDataKK']);
// route::post('delete/{id}/{leadId}',[FamilyPersonsController::class,'deleteFamilyPerson']);

// route::get('getAllLeadDataById/{leadId}/{personId}',[LeadDataController::class,'getAllLeadDataById']);
// route::post('updateLeadDataKK/{leadId}/{personId}',[LeadDataController::class,'updateLeadDataKK']);
