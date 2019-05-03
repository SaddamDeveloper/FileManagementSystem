<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;
use App\Http\Resources\EmployeeResource as EmployeeResource;
use App\sendToEmployee;
use App\sendToDb;
use App\sendToAdmin;
use Storage;
use File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List of Employees
        $employees = Employee::paginate(15);
        return  EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store or Update
        $employee = $request->isMethod('put') ? Employee::findOrFail
        ($request->employee_id) : new Employee;


        $employee->id = $request->input('employee_id');
        $employee->name = $request->input('name');
        $employee->no = $request->input('no');
        $employee->email = $request->input('email');
        $employee->designation = $request->input('designation');
        $employee->expertise = implode(",",$request->input('select'));
        $employee->address = $request->input('address');

        if($employee->save()){
            return new EmployeeResource($employee);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Employee
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //delete Employee
        $employee = Employee::findOrFail($id);

        if($employee->delete()){
            return new EmployeeResource($employee);
        }
    }
    public function send(Request $request){
         //send to employee
         $toEmployee = $request->isMethod('put') ? sendToEmployee::findOrFail
        ($request->employee_id) : new sendToEmployee;

         $exploded = explode(',', $request->docs);
         $decoded = base64_decode($exploded[1]);

        $fileName = $request->fileName;

         $caseId = $request->input('caseid');

        Storage::put('public/'.$caseId.'/'.$fileName, $decoded);

        $toEmployee->caseid = $request->input('caseid');
        $toEmployee->assignedEmployee = $request->input('assignedEmployee');
        $toEmployee->docs = $fileName;
        $toEmployee->helper = implode(",", $request->input('helper'));

        if($toEmployee->save()){
            return new EmployeeResource($toEmployee);
        }

    }

        public function toDb(Request $request){
        //  //send to Db
         $toDb = $request->isMethod('put') ? sendToEmployee::findOrFail
        ($request->employee_id) : new sendToEmployee;

         $exploded = explode(',', $request->docs);
         $decoded = base64_decode($exploded[1]);

        $fileName = $request->fileName;

         $caseId = $request->input('caseid');
         return $caseId;
        // Storage::putFile('public/'.$caseId.'/'.$fileName, $decoded);

        // $toEmployee->caseid = $request->input('caseid');
        // $toEmployee->assignedEmployee = $request->input('assignedEmployee');
        // $toDb->docs = $fileName;
        // $toEmployee->helper = implode(",", $request->input('helper'));

        // if($toDb->save()){
        //     return new EmployeeResource($toDb);
        // }

    }
    public function toAdmin(Request $request){
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail
        ($request->employee_id) : new sendToAdmin;

        $toAdmin->caseid = $request->input('caseid');
        // $toAdmin->assignedEmployee = $request->input('assignedEmployee');
        // $toAdmin->helper = $request->input('helper');
        $toAdmin->docs = $request->input('docs');

        if($toAdmin->save()){
            return new EmployeeResource($toAdmin);
        }
    }
    public function fetchApproveCase(){
        // $approvedCase = sendToAdmin::paginate(15);
        $approvedCase = \App\sendToAdmin::with('sendAdmin')
       ->paginate(15);
        return  EmployeeResource::collection($approvedCase);
    }
}