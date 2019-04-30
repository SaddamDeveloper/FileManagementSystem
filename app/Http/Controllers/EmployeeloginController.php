<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeloginController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee-web');
    }
    public function index(){
        return view('employee');
    }
}
