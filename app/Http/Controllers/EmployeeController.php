<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;
use App\Http\Resources\EmployeeResource as EmployeeResource;
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
}
