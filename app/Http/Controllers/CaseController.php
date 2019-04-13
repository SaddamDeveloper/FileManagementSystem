<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cases;
use App\ClientDetails;
use App\Http\Resources\Cases as CaseResource;
use App\Http\Resources\ClientDetails as ClientDetailsResource;
use DB;
use Response;
class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cases = \App\ClientDetails::with('cases')
       ->join('cases', 'cases.caseid', '=', 'client_details.caseid')
       ->paginate(15);
         return CaseResource::collection($cases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('put')){
          $case = Cases::findOrFail($request->id);
          $cdetails = ClientDetails::findOrFail($request->id);
        }
        else{
            $case = new Cases;
            $cdetails = new ClientDetails;
        }

            $sql = DB::table('cases')->select(DB::raw('max(substring(caseid, 5, 5)) as max_val'))->get();
            foreach($sql as $row_data){
                $postfix =  $row_data->max_val;
            }
            $caseid = 'CASE';
            $count = DB::table('cases')->select(DB::raw('max(substring(caseid, 5, 5)) as max_val'))->get()->count();
            if($count == 0){
                $caseid = $caseid.'00001';
            }
            else{
                $postfix = $postfix + 1;
                $addVal=str_pad($postfix, 5, '0', STR_PAD_LEFT);
                $caseid=$caseid.$addVal;
            }

        $case->caseid = $caseid;
        $case->clientType = $request->input('clientType');
        $case->typeofwork = $request->input('typeofwork');
        $case->time2 = $request->input('time2');
        $case->amount = $request->input('amount');
        $case->paymentmode = $request->input('paymentmode');

        $cdetails->clientid = $request->input('clientid');
        $cdetails->clientName = $request->input('clientName');
        $cdetails->contactNo = $request->input('contactNo');
        $cdetails->altContactNo = $request->input('altContactNo');
        $cdetails->email = $request->input('email');
        $cdetails->address = $request->input('address');
        $cdetails->caseid = $caseid;

        if($case->save() && $cdetails->save()){
            return new CaseResource($case);
            return new ClientDetailsResource($cdetails);
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
        //Get Article
        $case = \App\ClientDetails::findOrFail($id);
        // $case = Cases::findOrFail($id);
        return $case;

        // return new CaseResource($case);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Delete Article
        $case = Cases::findOrFail($id);

        if($case->delete()){
            return new CaseResource($case);
        }
    }
}
