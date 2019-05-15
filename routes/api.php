<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//List cases
Route::get('cases', 'CaseController@index');

//Govt and All
Route::get('govtnallcases', 'CaseController@govtnAll');

//List single case
Route::get('case/{id}', 'CaseController@show');

//Create new case
Route::post('case', 'CaseController@store');

//Update case
Route::put('case', 'CaseController@store');

//Delete case
Route::delete('case/{id}', 'CaseController@destroy');


//Route for Employee Crud
//Showw all Empoyees
Route::get('employees', 'EmployeeController@index');

//List single case
Route::get('employee/{id}', 'EmployeeController@show');

//Create new employee
Route::post('employee', 'EmployeeController@store');

//Update new Employee
Route::put('employee', 'EmployeeController@store');

//Delete Employee
Route::delete('employee/{id}', 'EmployeeController@destroy');

//Send To Employee
Route::post('sendemployee', 'EmployeeController@send');

//send to db by employee
Route::post('sendtodb', 'EmployeeController@toDb');

//send to admin
Route::post('sendtoadmin', 'EmployeeController@toAdmin');

Route::post('sendtoadminagain', 'EmployeeController@sendToadminAgain');

Route::delete('sendtoadmin/{id}', 'EmployeeController@deleteToAdmin');


//Show all AssignedEmpoyees
Route::get('assignedemployees', 'AssignedEmployee@index');

//List single case
Route::get('assignedemployee/{id}', 'AssignedEmployee@show');

//Create new employee
Route::post('assignedemployee', 'AssignedEmployee@store');

//Update new Employee
Route::put('assignedemployee', 'AssignedEmployee@store');

//Delete Employee
Route::delete('assignedemployee/{id}', 'AssignedEmployee@destroy');


//Employee
Route::get('employeeassignedemployees/{id}', 'EmployeeAssigned@index');


//For Approval project API
Route::get('aprovedcases', 'EmployeeController@fetchApproveCase');

Route::post('sendapproval', 'EmployeeController@AprovedCase');

Route::delete('sendapproval/{id}', 'EmployeeController@DeleteAprovedCase');

Route::get('completedcases', 'EmployeeController@CompletedCase');

Route::post('rejectcase', 'EmployeeController@RejectCase');

Route::get('fetchrejectedcase/{id}', 'EmployeeController@FetchRejectCase');

Route::delete('rejectcase/{id}', 'EmployeeController@DeleteRejectCase');

Route::get('approving/{id}', 'EmployeeController@fetchApproving');

Route::get('counter', 'EmployeeController@countingNewlyRegisterd');

Route::get('employeecounter/{id}', 'EmployeeController@EmployeeCounter');

Route::delete('sendtoadminagain/{id}', 'EmployeeController@deleteSendToAdmin');

Route::get('search', 'CaseController@search');

Route::get('caseid', 'CaseController@showCaseId');

Route::get('searchphone', 'CaseController@searchPhone');

Route::get('empcompletedcase/{id}', 'EmployeeController@empCompletedCase');





//Receptionist
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
