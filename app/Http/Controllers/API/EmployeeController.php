<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'no' => 'required',
            'email' => 'required|string|email|max:191',
            'designation' => 'required',
            'select' => 'required',
            ]);
            // if(Employee::count() == 0){
            //     $lastOneEmployee = 'EMP000001';
            // }
            // else{
            //     $lastEmployeeId = Employee::select('empid')->orderBy('empid','desc')->first();
            //     $lastOneEmployee = $lastEmployeeId->empid;
            //     $lastOneEmployee++;
            // }
            Employee::create([
                'name' => 'saddam',
                'no' => $request['no'],
                'email' => $request['email'],
                'designation' => $request['designation'],
                'expertise' => implode(',', $request['select']),
                'address' => $request['address'],
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
