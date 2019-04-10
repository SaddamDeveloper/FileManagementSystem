<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResources(['case' => 'API\CaseController']);
// Route::apiResources(['employee' => 'API\EmployeeController']);
// Route::apiResources(['sendemployee' => 'API\sendToEmployeeController']);

//List cases
Route::get('cases', 'CaseController@index');

//List single case
Route::get('case/{id}', 'CaseController@show');

//Create new case
Route::post('case', 'CaseController@store');

//Update case
Route::put('case', 'CaseController@store');

//Delete case
Route::delete('case/{id}', 'CaseController@destroy');


