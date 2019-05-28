<?php

namespace App\Http\Controllers;
use App\EmployeeAssign;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeAssigned as EmployeeAssignedResource;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

class EmployeeAssigned extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $id = $user['employee_id'];
        $employee = DB::table('onprocess')
            ->join('employees', 'onprocess.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->orderBy('onprocess.id', 'DESC')
            ->where('onprocess.employee_id', $id)
            ->paginate(15);
          return $employee;
        //  return CaseResource::collection($employee);
        // $employee = DB::table('send_to_employees')->where('assignedEmployee', '=', Auth::user())->paginate(15);
        // return $employee;
        // return $employee;
        // return  EmployeeAssignedResource::collection($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
