<?php

namespace App\Http\Controllers;

use App\indClientDetails;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cases;
use App\ClientDetails;
use App\Http\Resources\Cases as CaseResource;
use App\Http\Resources\ClientDetails as ClientDetailsResource;
use DB;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
       ->orderBy('cases.id', 'DESC')
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
    //       $case = \App\ClientDetails::with('cases')
    //    ->join('cases', 'cases.caseid', '=', 'client_details.caseid')
    //     ->findOrFail($request->id);
    //     return $case;
            // $case = Cases::findOrFail($request->caseid);
          $cdetails = ClientDetails::findOrFail($request->id);
        }
        else{
            $case = new Cases;
            $cdetails = new ClientDetails;
        }

        //Generating CaseID
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

            // Generating ClientID
            $clientids = DB::table('client_details')->select(DB::raw('max(substring(clientid, 5, 5)) as client_val'))->get();
            foreach($clientids as $clientid){
                $clientid_postfix =  $clientid->client_val;
            }
            $clientidstatic = 'CL';
            $countClientId = DB::table('client_details')->select(DB::raw('max(substring(clientid, 5, 5)) as client_val'))->get()->count();
            if($countClientId == 0){
                $clientidstatic = $clientidstatic.'00001';
            }
            else{
                $clientid_postfix = $clientid_postfix + 1;
                $addValClientId=str_pad($clientid_postfix, 5, '0', STR_PAD_LEFT);
                $clientidstatic=$clientidstatic.$addValClientId;
            }

        $case->caseid = $caseid;
        $case->clientType = $request->input('clientType');
        $case->typeofwork = $request->input('typeofwork');
        $date = $request->input('time2');
        $formatedDate = substr($date, 0,10);
        $case->time2 = $formatedDate;
        $case->amount = $request->input('amount');
        $case->paymentmode = $request->input('paymentmode');
        $cdetails->clientid = $clientidstatic;
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

    public function search(){
        $queryString = Input::get('queryString');
        $clientDetails = ClientDetails::where('clientid', 'like', '%'.$queryString.'%')->get();
        return response()->json($clientDetails);
    }

    public function showCaseId(){
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
            return response()->json($caseid);
        }
    }

    public function searchPhone(){
        $queryString = Input::get('clientNo');
        $clientDetails = ClientDetails::where('contactNo', 'like', '%'.$queryString.'%')->get();
        return response()->json($clientDetails);
    }
}
