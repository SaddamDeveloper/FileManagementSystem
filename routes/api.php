<?php

Route::group(['middleware' => 'jwt'], function () {
    Route::get('cases', ['uses' =>  'CaseController@index']);
    Route::get('casesgovtnall', ['uses' =>  'CaseController@casesgovtnall']);
    //Govt and All
    Route::get('govtnallcases', ['uses' => 'CaseController@govtnAll']);
    Route::post('case', [
        'uses'  =>  'CaseController@store',
        'middleware'    => 'jwt'
    ]);
    //Update case
    Route::put('case', ['uses' => 'CaseController@store']);
    //Delete case
    Route::delete('cases/{id}', ['uses'  =>  'CaseController@destroy', 'middleware'    =>  'jwt']);
    //Route for Employee Crud
    //Showw all Empoyees
    Route::get('employees', ['uses' => 'EmployeeController@index']);
    Route::get('employeesfetch', ['uses' => 'EmployeeController@employeeFetch']);
    //List single case
    Route::get('employee/{id}', 'EmployeeController@show');
    //Create new employee
    Route::post('employee', 'EmployeeController@store');
    //Update new Employee
    Route::put('employee', 'EmployeeController@store');
    //Delete Employee
    Route::delete('employee/{id}', 'EmployeeController@destroy');
    //Send To Employee
    Route::post('sendemployee', ['uses' => 'EmployeeController@send']);
    //send to db by employee
    Route::post('sendtodb', ['uses' => 'EmployeeController@toDb']);
    //send to admin
    Route::post('sendtoadmin', ['uses' => 'EmployeeController@toAdmin']);
    Route::post('sendtoadminagain', 'EmployeeController@sendToadminAgain');
    Route::delete('sendtoadmin/{id}', 'EmployeeController@deleteToAdmin');

    //Show all AssignedEmpoyees
    Route::get('assignedemployees', ['uses' => 'AssignedEmployee@index']);
    //List single case
    Route::get('assignedemployee/{id}', 'AssignedEmployee@show');
    //Create new employee
    Route::post('assignedemployee', 'AssignedEmployee@store');
    //Update new Employee
    Route::put('assignedemployee', 'AssignedEmployee@store');
    //Delete Employee
    Route::delete('assignedemployee/{id}', 'AssignedEmployee@destroy');

    //Employee
    Route::get('employeeassignedemployees/', ['uses' => 'EmployeeAssigned@index']);
    Route::get('showuploadedfile/{id}', ['uses' => 'EmployeeAssigned@showUploadedFile']);

    //For Approval project API
    Route::get('aprovedcases', ['uses' => 'EmployeeController@fetchApproveCase']);
    Route::post('sendapproval', ['uses' => 'EmployeeController@AprovedCase']);
    Route::delete('sendapproval/{id}', ['uses' => 'EmployeeController@DeleteAprovedCase']);
    Route::get('completedcases', ['uses' => 'EmployeeController@CompletedCase']);
    Route::get('admincompletedcases', ['uses' => 'EmployeeController@AdminCompletedCase']);
    Route::get('fetchcompletedcaseemployee', ['uses' => 'EmployeeController@CompletedCaseEmp']);
    Route::get('approvedcaseemployee', ['uses' => 'EmployeeController@ApprovedCaseEmp']);
    Route::post('rejectcase', ['uses' => 'EmployeeController@RejectCase']);
    Route::get('fetchrejectedcase', ['uses' => 'EmployeeController@FetchRejectCase']);
    Route::get('fetchrejectedcaseemployee', ['uses' => 'EmployeeController@FetchRejectCaseEmployee']);
    Route::delete('rejectcase/{id}', ['uses' => 'EmployeeController@DeleteRejectCase']);
    Route::get('approving', ['uses' => 'EmployeeController@fetchApproving']);
    Route::get('counter', ['uses' => 'EmployeeController@countingNewlyRegisterd']);
    Route::get('employeecounter', 'EmployeeController@EmployeeCounter');
    Route::delete('sendtoadminagain/{id}', 'EmployeeController@deleteSendToAdmin');
    Route::get('search', ['uses' => 'CaseController@search']);
    Route::get('searchperson', ['uses' => 'CaseController@searchPerson']);
    Route::get('caseid', ['uses' => 'CaseController@showCaseId']);
    Route::get('searchphone', 'CaseController@searchPhone');
    Route::get('empcompletedcase', ['uses' => 'EmployeeController@empCompletedCase']);
    Route::get('searchusingdate', ['uses' => 'CaseController@searchUsingDate']);
    Route::post('sendforapprovalagain', ['uses' => 'EmployeeController@sendApprovalAgain']);
    Route::get('fetchtransferedcaseemployee', ['uses' => 'EmployeeController@fetchTransferCaseEmp']);
    Route::get('fetchsendemployees', ['uses' => 'EmployeeController@fetchSendToEmployees']);
    Route::put('updateemployee/{id}', ['uses' => 'EmployeeController@UpdateEmp']);
    Route::post('transfertoonprocess', ['uses' => 'EmployeeController@TransferToOnprocess']);
    Route::delete('deleteempnewcase/{id}', ['uses' => 'EmployeeController@DeleteEmpNewCase']);
    Route::get('checksendtoemployees', ['uses' => 'EmployeeController@checkSendEmployees']);
    Route::post('tobill', ['uses' => 'EmployeeController@toBill']);
    Route::delete('deleteapprovedcase/{id}', ['uses' => 'EmployeeController@deleteApprovedCase']);
    Route::delete('deletebilledcase/{id}', ['uses' => 'EmployeeController@deleteBilledCase']);
    Route::get('billedcase', ['uses' => 'EmployeeController@fetchBilledCase']);
    Route::post('checkwheathersentornot/{id}', ['uses' => 'EmployeeController@checkIfSent']);
    Route::post('paymentbycash', ['uses' => 'EmployeeController@paymentByCash']);
    Route::get('fetchcollectionregister', ['uses' => 'EmployeeController@fetchCollectionRegister']);
    Route::get('invoice', ['uses' => 'EmployeeController@getInvoice']);
    Route::get('fetchfiles', ['uses' => 'EmployeeController@fetchFiles']);
    Route::get('status', ['uses' => 'EmployeeController@status']);
    Route::get('verifyemployee', ['uses' => 'EmployeeController@VerifyEmployee']);
    Route::get('supportstaff', ['uses' => 'EmployeeController@SupportStaff']);
    Route::delete('deleteonprocess/{id}', ['uses' => 'EmployeeController@DeleteOnProcess']);
    Route::get('checkcaseid', ['uses' => 'EmployeeAssigned@checkcaseid']);
    Route::post('amountreassign/', ['uses' => 'EmployeeController@AmountReassign']);
    Route::get('searchanything', ['uses' => 'CaseController@searchAnything']);
    Route::get('searchusingdaterange', ['uses' => 'CaseController@searchUsingDateRange']);
    Route::post('caseupdate', ['uses' => 'EmployeeController@caseUpdate']);
    Route::get('fetchcaseupdate/{id}', ['uses' => 'EmployeeController@fetchCaseUpdate']);
    Route::get('fetchcaseupdateall', ['uses' => 'EmployeeController@fetchCaseUpdateAll']);
});
//List cases




Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
});

Route::post('user', [
    'uses'  =>  'AuthController@signup',
]);

Route::post('admin', [
    'uses'  =>  'AuthController@signupadmin',
]);
