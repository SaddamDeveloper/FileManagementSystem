<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }
    protected function guard()
    {
        return Auth::guard('admin-web');
    }
    public function index(){
        return view('admin');
    }
}
