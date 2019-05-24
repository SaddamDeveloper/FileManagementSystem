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
Route::get('cases', ['uses' =>  'CaseController@index', 'middleware'=>'jwt']);

//Govt and All
Route::get('govtnallcases', ['uses' => 'CaseController@govtnAll', 'middleware' => 'jwt']);

//List single case
Route::get('case/{id}', 'CaseController@show');

//Create new case
// Route::post('case', 'CaseController@store');

Route::post('case', [
    'uses'  =>  'CaseController@store',
    'middleware'    => 'jwt'
]);

//Update case
Route::put('case', 'CaseController@store');

//Delete case
Route::delete('case/{id}', [
    'uses'  =>  'CaseController@destroy',
    'middleware'    =>  'jwt'
]);


//Route for Employee Crud
//Showw all Empoyees
Route::get('employees', ['uses' => 'EmployeeController@index', 'middleware' => 'jwt']);

//List single case
Route::get('employee/{id}', 'EmployeeController@show');

//Create new employee
Route::post('employee', 'EmployeeController@store');

//Update new Employee
Route::put('employee', 'EmployeeController@store');

//Delete Employee
Route::delete('employee/{id}', 'EmployeeController@destroy');

//Send To Employee
Route::post('sendemployee', ['uses' => 'EmployeeController@send', 'middleware' => 'jwt']);

//send to db by employee
Route::post('sendtodb', 'EmployeeController@toDb');

//send to admin
Route::post('sendtoadmin', ['uses' => 'EmployeeController@toAdmin', 'middleware' => 'jwt']);

Route::post('sendtoadminagain', 'EmployeeController@sendToadminAgain');

Route::delete('sendtoadmin/{id}', 'EmployeeController@deleteToAdmin');


//Show all AssignedEmpoyees
Route::get('assignedemployees', ['uses' => 'AssignedEmployee@index', 'middleware' => 'jwt']);

//List single case
Route::get('assignedemployee/{id}', 'AssignedEmployee@show');

//Create new employee
Route::post('assignedemployee', 'AssignedEmployee@store');

//Update new Employee
Route::put('assignedemployee', 'AssignedEmployee@store');

//Delete Employee
Route::delete('assignedemployee/{id}', 'AssignedEmployee@destroy');


//Employee
Route::get('employeeassignedemployees/', ['uses' => 'EmployeeAssigned@index', 'middleware' => 'jwt']);


//For Approval project API
Route::get('aprovedcases', ['uses' => 'EmployeeController@fetchApproveCase', 'middleware' => 'jwt']);

Route::post('sendapproval', ['uses' => 'EmployeeController@AprovedCase', 'middleware' => 'jwt']);

Route::delete('sendapproval/{id}', ['uses' => 'EmployeeController@DeleteAprovedCase', 'middleware' => 'jwt']);

Route::get('completedcases', ['uses' => 'EmployeeController@CompletedCase', 'middleware' => 'jwt']);

Route::get('fetchcompletedcaseemployee', ['uses' => 'EmployeeController@CompletedCaseEmp', 'middleware' => 'jwt']);

Route::get( 'approvedcaseemployee', ['uses' => 'EmployeeController@ApprovedCaseEmp', 'middleware' => 'jwt']);

Route::post('rejectcase', ['uses' => 'EmployeeController@RejectCase', 'middleware' => 'jwt']);

Route::get('fetchrejectedcase', ['uses' => 'EmployeeController@FetchRejectCase', 'middleware' => 'jwt']);

Route::get('fetchrejectedcaseemployee', ['uses' => 'EmployeeController@FetchRejectCaseEmployee', 'middleware' => 'jwt']);

Route::delete('rejectcase/{id}', ['uses' => 'EmployeeController@DeleteRejectCase', 'middleware' => 'jwt']);

Route::get('approving/{id}', 'EmployeeController@fetchApproving');

Route::get('counter', ['uses' => 'EmployeeController@countingNewlyRegisterd', 'middleware' => 'jwt']);

Route::get('employeecounter', 'EmployeeController@EmployeeCounter');

Route::delete('sendtoadminagain/{id}', 'EmployeeController@deleteSendToAdmin');

Route::get('search', 'CaseController@search');

Route::get('caseid', ['uses' => 'CaseController@showCaseId', 'middleware' => 'jwt']);

Route::get('searchphone', 'CaseController@searchPhone');

Route::get('empcompletedcase/{id}', 'EmployeeController@empCompletedCase');





//Receptionist
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
});

Route::post('user',[
    'uses'  =>  'AuthController@signup',
]);

Route::post('admin', [
    'uses'  =>  'AuthController@signupadmin',
]);

Route::post( 'sendforapprovalagain', ['uses' => 'EmployeeController@sendApprovalAgain', 'middleware' => 'jwt']);

Route::get( 'fetchtransferedcaseemployee', ['uses' => 'EmployeeController@fetchTransferCaseEmp', 'middleware' => 'jwt']);
