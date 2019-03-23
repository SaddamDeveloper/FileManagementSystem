<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegCase;
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
            'clientTypeSelection' => 'required',
            'typeofwork' => 'required|string|max:191',
            'amount' => 'required',
            'clientname' => 'required|string|max:191',
            'contactno' => 'required',
            'email' => 'required|string|email|max:191',
            'time2' => 'required'

        ]);
        return RegCase::create([
            'clientTypeSelection' => $request['clientTypeSelection'],
            'typeofwork' => $request['typeofwork'],
            'amount' => $request['amount'],
            'clientname' => $request['clientname'],
            'contactno' => $request['contactno'],
            'email' => $request['email'],
            'time2' => $request['time2'],
            'altno' => $request['altno'],
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
        $case = RegCase::findOrfail($id);
        $case->delete();
        return ['message' => 'Case Deleted'];
    }
}
