<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegCase;
use App\indClientDetails;
class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RegCase::latest()->paginate(10);
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
            'clientType' => 'required',
            'typeofwork' => 'required|string|max:191',
            'amount' => 'required',
            'clientName' => 'required|string|max:191',
            'contactNo' => 'required',
            'email' => 'required|string|email|max:191',
            'time2' => 'required'

        ]);
        return RegCase::create([
            'caseid' => $request['caseid'],
            'clientType' => $request['clientType'],
            'typeofwork' => $request['typeofwork'],
            'time2' => $request['time2'],
            'amount' => $request['amount'],
            'paymentmode' => $request['paymentmode'],
        ]);
        return indClientDetails::create([
            'clientid' => $request['clientid'],
            'clientName' => $request['clientName'],
            'contactNo' => $request['contactNo'],
            'altContactNo' => $request['altContactNo'],
            'email' => $request['email'],
            'address' => $request['address'],
            'caseid' => $request['caseid'],
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
        $case = RegCase::findOrfail($id);
        $case->delete();
        return ['message' => 'Case Deleted'];
    }
}
