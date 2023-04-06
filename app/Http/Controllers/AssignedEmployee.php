<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\AEmployee;
use App\Http\Resources\AssignedEmployee as AssignedEmployeeResource;
use Illuminate\Http\Request;
use DB;
class AssignedEmployee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('send_to_employees')
            ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
            ->join('users', 'users.email', '=', 'employees.email')
            ->paginate(15);
        // return  AssignedEmployeeResource::collection($employees);
        return $employees;
    }
}
