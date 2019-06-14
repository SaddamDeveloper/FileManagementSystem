<?php

namespace App\Http\Controllers;

use App\indClientDetails;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cases;
use App\ClientDetailsAnother;
use App\ClientDetails;
use App\Amount;
use App\Http\Resources\Cases as CaseResource;
use App\Http\Resources\ClientDetails as ClientDetailsResource;
use App\Http\Resources\AmountResource as AmountsResource;
use DB;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use App\Test;
use Tymon\JWTAuth\Facades\JWTAuth as TymonJWTAuth;
use App\chequenrtgs;
use App\Cheque;
use App\Rtgs;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if($request->input('clientType') != 2 ){

        // }

        $cases = DB::table('cases')
            ->join('client_details', 'cases.caseid', '=', 'client_details.caseid')
            // ->join('clientdetails2', 'cases.clientType', '=', 'clientdetails2.clientType')
            ->paginate(15);
        return $cases;

            // $cases = \App\ClientDetails::with(['cases'])
            // ->join('cases', 'cases.caseid', '=', 'client_details.caseid')
            // ->join('cases', 'cases.caseid', '=', 'client_details.caseid')
            // ->orderBy('cases.id', 'DESC')
            // ->paginate(15);

            // return  $cases->clientType;
    //    return $cases;
        // foreach($cases2 as $case2)
        //     $caseCollection->push($case2);

        // foreach($cases as $case)
        //     $caseCollection->push($case);




            // return $caseCollection;

        // return $cases && $cases2;

        //  return CaseResource::collection($cases);
    }

    public function casesgovtnall(){
        $cases = DB::table('cases')
            // ->join('client_detsails', 'cases.caseid', '=', 'client_details.caseid')
            ->join('clientdetails2', 'cases.clientType', '=', 'clientdetails2.clientType')
            ->paginate(15);
        return $cases;
    }

    public function govtnAll(){
         $cases2 = \App\ClientDetailsAnother::with('cases')
        ->join('cases', 'cases.caseid', '=', 'clientdetails2.caseid')
        ->orderBy('cases.id', 'DESC')
        ->paginate(15);

        return CaseResource::collection($cases2);
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
          $case = \App\ClientDetails::with('cases')
        ->join('cases', 'cases.caseid', '=', 'client_details.caseid')
        ->findOrFail($request->id);
        return $case;
            // $case = Cases::findOrFail($request->caseid);
        //   $cdetails = ClientDetails::findOrFail($request->id);
        }
        else{
            $case = new Cases;
            $cdetails = new ClientDetails;
            $cdetails2 = new ClientDetailsAnother;
            $amount = new Amount;
            $chequenrtgs = new chequenrtgs;
            $check = new Cheque;
            $rtgs = new Rtgs;
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
        //individual
        if($request->input('clientType') == 2){
            $case->clientType = $request->input('clientType');
            $case->typeofwork = $request->input('typeofwork');
            $date = $request->input('time2');
            $formatedDate = substr($date, 0,10);
            $case->time2 = $formatedDate;
            $case->amount = $request->input('amount');
            $case->paymentmode = $request->input('selected');
            $cdetails->clientid = $clientidstatic;

            $cdetails->clientName = $request->input('clientName');
            $cdetails->contactNo = $request->input('contactNo');
            $cdetails->altContactNo = $request->input('altContactNo');
            $cdetails->email = $request->input('email');
            $cdetails->address = $request->input('address');
            $cdetails->clientType = $request->input('clientType');
            $cdetails->caseid = $caseid;

            if ($request->input('selected') == 2) {
                $amount->caseid = $caseid;
                $amount->paymentmode = $request->input('selected');
                $amount->clientid = $clientidstatic;
                $amount->amount = $request->input('amount');
                $amount->advamount = $request->input('advamount');
            }
            else if ($request->input('selected') == 3) {
                $chequenrtgs->method = $request->input('selected');
                //for cash
                if($request->input('selected') == 3){
                    $check->methodId = $request->input('selected');
                    $check->ChequeNo = $request->input('chequeNo');
                    $check->caseid = $caseid;
                    $check->amount = $request->input('amount');
                    $check->advamount = $request->input('advamount');
                }
                $chequenrtgs->caseid = $caseid;
                $chequenrtgs->bankname = $request->input('bankName');
                $chequenrtgs->phoneno = $request->input('bankersPhone');
            }
            else if( $request->input('selected') == 4){
                $chequenrtgs->method = $request->input('selected');
                //for rtgs/neft
                if ($request->input('selected') == 4) {
                    $rtgs->methodId = $request->input('selected');
                    $rtgs->transactionNo = $request->input('rtgsNo');
                    $rtgs->caseid = $caseid;
                    $rtgs->amount = $request->input('amount');
                    $rtgs->advamount = $request->input('advamount');
                }
                $chequenrtgs->caseid = $caseid;
                $chequenrtgs->bankname = $request->input('bankName');
                $chequenrtgs->phoneno = $request->input('bankersPhone');
            }
            // $amount->caseid = $caseid;
            // $amount->paymentmode = $request->input('selected');
            // $amount->clientid = $clientidstatic;
            // $amount->amount = $request->input('amount');
            // $amount->advamount = $request->input('advamount');

            // if($case->save() && $cdetails->save() && $amount->save()){
            //     return new CaseResource($case);
            //     return new ClientDetailsResource($cdetails);
            //     return new AmountsResource($amount);
            // }
            if ($request->input('selected') == 2) {
                if ($case->save() && $cdetails->save() && $amount->save()) {
                return new CaseResource($case);
                return new ClientDetailsResource($cdetails);
                return new AmountsResource($amount);
            }
            } else if ($request->input('selected') == 3) {
                if ($case->save() && $cdetails->save() && $chequenrtgs->save() && $check->save()) {
                    return new CaseResource($case);
                    // return new ClientDetailsResource($cdetails);
                }
            }
            else if( $request->input('selected') == 4){
                if ($case->save() && $cdetails->save() && $chequenrtgs->save() && $rtgs->save()) {
                    return new CaseResource($case);
                    // return new ClientDetailsResource($cdetails);
                }
            }
        }
        //Govtnall
        else if($request->input('clientType') == 3 || $request->input('clientType') == 4 || $request->input('clientType') == 5 ){
            $case->clientType = $request->input('clientType');
            $case->typeofwork = $request->input('typeofwork');
            $date = $request->input('time2');
            $formatedDate = substr($date, 0, 10);
            $case->time2 = $formatedDate;
            $case->amount = $request->input('amount');
            $case->paymentmode = $request->input('selected');
            if( $request->input('selected') == 2){
                $amount->caseid = $caseid;
                $amount->paymentmode = $request->input('selected');
                $amount->clientid = $clientidstatic;
                $amount->amount = $request->input('amount');
                $amount->advamount = $request->input('advamount');
            }
            else if( $request->input('selected') == 3){
                $chequenrtgs->method = $request->input('selected');
                //for cash
                if ($request->input('selected') == 3) {
                    $check->methodId = $request->input('selected');
                    $check->ChequeNo = $request->input('chequeNo');
                    $check->caseid = $caseid;
                    $check->amount = $request->input('amount');
                    $check->advamount = $request->input('advamount');
                }
                $chequenrtgs->caseid = $caseid;
                $chequenrtgs->bankname = $request->input('bankName');
                $chequenrtgs->phoneno = $request->input('bankersPhone');
            }
            else if( $request->input('selected') == 4){
                $chequenrtgs->method = $request->input('selected');
                //for rtgs/neft
                if ($request->input('selected') == 4) {
                    $rtgs->methodId = $request->input('selected');
                    $rtgs->transactionNo = $request->input('rtgsNo');
                    $rtgs->caseid = $caseid;
                    $rtgs->amount = $request->input('amount');
                    $rtgs->advamount = $request->input('advamount');
                }
                $chequenrtgs->caseid = $caseid;
                $chequenrtgs->bankname = $request->input('bankName');
                $chequenrtgs->phoneno = $request->input('bankersPhone');
            }
            $cdetails2->clientid = $clientidstatic;
            $cdetails2->contactPersonName = $request->input('clientPersonName');
            $cdetails2->contactNo = $request->input('contactNo');
            $cdetails2->contactNo = $request->input('personContactNo');
            $cdetails2->orgName = $request->input('orgName');
            $cdetails2->orgTel = $request->input('telNo');
            $cdetails2->dept = $request->input('dept');
            $cdetails2->address = $request->input('addr');
            $cdetails2->clientType = $request->input('clientType');
            $cdetails2->caseid = $caseid;

            // if($request->input('selected') == 2){
            //     $amount->caseid = $caseid;
            //     $amount->paymentmode = $request->input('selected');
            //     $amount->clientid = $clientidstatic;
            //     $amount->amount = $request->input('amount');
            //     $amount->advamount = $request->input('advamount');
            // }
            // else if( $request->input('selected') == 3){
            //     $amount->caseid = $caseid;
            //     $amount->paymentmode = $request->input('selected');
            //     $amount->clientid = $clientidstatic;
            //     $amount->chequeno = $request->input('chequeno');
            //     $amount->bankname = $request->input('bankname');
            //     $amount->phoneno = $request->input('phoneno');
            // }
            // else if ($request->input('selected') == 4) {

            // }
            if( $request->input('selected') == 2){
                if ($case->save() && $cdetails2->save() && $amount->save()) {
                    return new CaseResource($case);
                    return new ClientDetailsResource($cdetails2);
                    return new AmountsResource($amount);
                }
            }
            else if( $request->input('selected') == 3){
                if ($case->save() && $cdetails2->save() && $chequenrtgs->save() && $check->save()) {
                    return new CaseResource($case);
                    return new ClientDetailsResource($cdetails2);
                }
            }
            else if( $request->input('selected') == 4){
                if ($case->save() && $cdetails2->save() && $chequenrtgs->save() && $rtgs->save()) {
                    return new CaseResource($case);
                    return new ClientDetailsResource($cdetails2);
                }
            }
        }

        else{
            return "sorry prblem";
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
        // $case = Cases::findOrFail($id);
        $case = DB::table('cases')->where('caseid', $id);

        if($case->delete()){
            return '1';
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

    public function pushToDb(Request $request){
        $user = JWTAuth::parseToken()->toUser();
        $test = new Test();
        $test->content = $request->input('content');
        $test->save();
        return response()->json(['content'  =>  $test, 'user'   =>  $user]);
    }


}
