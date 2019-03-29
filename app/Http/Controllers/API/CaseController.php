<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegCase;
use App\indClientDetails;
use DB;
class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data1 = indClientDetails::with(['RegCase'])->latest()->paginate(10);
        // return $data1;
        $data = DB::table('ind_client_details')
            ->join('reg_cases', 'ind_client_details.caseid', '=', 'reg_cases.caseid')
            ->select('ind_client_details.*', 'reg_cases.caseid', 'reg_cases.clientType','reg_cases.typeofwork', 'reg_cases.time2', 'reg_cases.amount', 'reg_cases.paymentmode')
            ->latest()->paginate(10);
        return $data;
        // $data2 = RegCase::with(['clientDetails'])->latest()->paginate(10);
        // return RegCase::latest()->paginate(10);
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
        if(indClientDetails::count() == 0){
            $lastOneClient = 'CLI000001';
        }
        else{
            $lastClientId = indClientDetails::select('clientid')->orderBy('clientid','desc')->first();
            $lastOneClient = $lastClientId->clientid;
            $lastOneClient++;
        }
        if (RegCase::count() == 0){
            $lastOne = 'CASE000001';
        }
        else{
        $lastCaseId = RegCase::select('caseid')->orderBy('caseid','desc')->first();
        $lastOne = $lastCaseId->caseid;
        $lastOne++;
        }
        RegCase::create([
            'caseid' => $lastOne,
            'clientType' => $request['clientType'],
            'typeofwork' => $request['typeofwork'],
            'time2' => $request['time2'],
            'amount' => $request['amount'],
            'paymentmode' => $request['paymentmode'],
        ]);
        indClientDetails::create([
            'clientid' => $lastOneClient,
            'clientName' => $request['clientName'],
            'contactNo' => $request['contactNo'],
            'altContactNo' => $request['altContactNo'],
            'email' => $request['email'],
            'address' => $request['address'],
            'caseid' => $lastOne,
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
        $data = DB::table('ind_client_details')
            ->join('reg_cases', 'ind_client_details.caseid', '=', 'reg_cases.caseid')
            ->select('ind_client_details.*', 'reg_cases.caseid', 'reg_cases.clientType','reg_cases.typeofwork', 'reg_cases.time2', 'reg_cases.amount', 'reg_cases.paymentmode')
            ->where('id', '=', $id)
            ->latest()->paginate(10);
        return $data;
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
