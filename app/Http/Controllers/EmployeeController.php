<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;
use App\Http\Resources\EmployeeResource as EmployeeResource;
use App\sendToEmployee;
use App\sendToDb;
use App\sendToAdmin;
use App\sendToApproval;
use App\rejectCase;
use App\OnProcessCase;
use App\toBill;
use App\byCash;
use Storage;
use File;
use DB;
use App\TransferCase;
use Illuminate\Support\Facades\Input;
use App\ToComplete;
use App\byNeft;
use App\byCheque;
use Carbon\Carbon;
use App\sendFileToAdmin;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List of Employees
        // $employees = Employee::paginate(15);
        // return  EmployeeResource::collection($employees);
        $data = DB::table('users')
            ->join('employees', 'users.email', '=', 'employees.email')
            ->get();
            return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store or Update
        $employee = $request->isMethod('put') ? Employee::findOrFail
        ($request->employee_id) : new Employee;

        $sql = DB::table('employees')->select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->get();
            foreach($sql as $row_data){
                $postfix =  $row_data->max_val;
            }

            $employee_id = 'EMP';
            $count = DB::table('employees')->select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->get()->count();
            if($count == 0){
                $employee_id = $employee_id.'00001';
            }
            else{
                $postfix = $postfix + 1;
                $addVal=str_pad($postfix, 5, '0', STR_PAD_LEFT);
                $employee_id=$employee_id.$addVal;
            }

        $employee->employee_id = $employee_id;
        $employee->name = $request->input('name');
        $employee->no = $request->input('no');
        $employee->email = $request->input('email');
        $employee->designation = $request->input('designation');
        $employee->expertise = implode(",",$request->input('select'));
        $employee->address = $request->input('address');

        if($employee->save()){
            return new EmployeeResource($employee);
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
        //Get Employee
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //delete Employee
        $employee = Employee::findOrFail($id);

        if($employee->delete()){
            return new EmployeeResource($employee);
        }
    }
    public function send(Request $request){
         //send to employee
         $toEmployee = $request->isMethod('put') ? sendToEmployee::findOrFail
        ($request->employee_id) : new sendToEmployee;

         $exploded = explode(',', $request->docs);
         $decoded = base64_decode($exploded[1]);

        $fileName = $request->fileName;

        $caseId = $request->input('caseid');
        $idCheck = sendToEmployee::where('caseid', '=', Input::get('caseid'))->first();
        if ($idCheck === null) {
            Storage::put('public/'.$caseId.'/'.$fileName, $decoded);
        }
        else{
            return response()->json(['message' => 'Case is already reserved'], 200);
        }

        // $inquiries = DB::table('send_to_employees')->where('caseid', $caseId)->get();
        // foreach($inquiries as $row_data){
        //     $postfix =  $row_data->caseid;
        //     if(!$postfix){
        //     }
        // }

        $toEmployee->caseid = $request->input('caseid');;
        $toEmployee->employee_id = $request->input('employee_id');
        $toEmployee->docs = $fileName;
        $toEmployee->helper = implode(",", $request->input('helper'));
        if($toEmployee->save()){
          return new EmployeeResource($toEmployee);
        }
            // foreach ( $inquiries as $kunde ) {
            //      $existing_kunde = DB::table('send_to_employees')->where('caseid', $kunde->caseid)->first();
            //      return $existing_kunde;
            // //      return $existing_kunde;
            // //     // if ( ! $kunde_exists ) {
            // //     //     DB::connection( 'inn_db' )->table( 'customers' )->insert(
            // //     //         [ $kunde->customer_id
            // //     //              $kunde->name,
            // //     //              $kunde->email]);
            // //     //   }
            // }

    }

        public function toDb(Request $request){
        //  //send to Db
         $toDb = $request->isMethod('put') ? sendFileToAdmin::findOrFail
        ($request->docs) : new sendFileToAdmin;

         $exploded = explode(',', $request->docs);
         $decoded = base64_decode($exploded[1]);

        $fileName = $request->fileName;

        $caseId = $request->input('caseid');
        $idCheck = sendFileToAdmin::where('caseid', '=', Input::get('caseid'))->first();
        if ($idCheck === null) {
            Storage::put('public/' . $caseId . '/' . $fileName, $decoded);
        } else {
            return response()->json(['message' => 'File is already uploaded'], 200);
        }

        $toDb->caseid = $request->input('caseid');
        $toDb->remarks = $request->input('remarks');
        $toDb->assignedEmployee = $request->input('assignedEmployee');
        $toDb->docs = $fileName;
        // $toDb->helper = implode(",", $request->input('helper'));
        // return $caseId;
        if($toDb->save()){
            return new EmployeeResource($toDb);
        }

    }
    public function toAdmin(Request $request){
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail
        ($request->employee_id) : new sendToAdmin();

        // $count = DB::table('toadmin')->select('caseid')->get();
        // return $count;
        $toAdmin->caseid = $request->input('caseid');
        $toAdmin->employee_id = $request->input('employee_id');
        $toAdmin->docs = $request->input('docs');

        $dbCheck = sendToAdmin::where('caseid', '=', Input::get('caseid'))->first();
        if($dbCheck == null){
            if($toAdmin->save()){
                return response()->json(['message'=> '0'],200);
            }
        }
        else{
            return response()->json(['message'=> '1'],200);
        }
    }

    public function fetchApproveCase(){
        // $approvedCase = sendToAdmin::paginate(15);
    //     $approvedCase = \App\sendToAdmin::with('sendAdmin')
    //    ->paginate(15);

       $approvedCase = DB::table('toadmin')
            ->join('employees', 'toadmin.employee_id', '=', 'employees.employee_id')
            ->join('onprocess', 'toadmin.caseid', '=', 'onprocess.caseid')
            ->join('users', 'toadmin.employee_id', '=', 'users.employee_id')
            ->paginate(15);
            return $approvedCase;
        // return  EmployeeResource::collection($approvedCase);
    }
    public function AprovedCase(Request $request){
        $toApproval = $request->isMethod('put') ? sendToApproval::findOrFail
        ($request->employee_id) : new sendToApproval;


        //Generate INVOICE NO
        $invoice = DB::table('approvedcase')->select(DB::raw( 'max(substring(invoiceNo, 21, 3)) as max_val'))->get();
        foreach ($invoice as $row_data) {
            $postfix =  $row_data->max_val;
        }
        $now = Carbon::now();
        $month = $now->format('F');
        $reformattedMonth = substr($month, 0,3);
        $year = $now->year;
        $currentYear =  substr($year, 2, 5);
        $nextYear = $currentYear + 1;
        $finalYearSplit = $currentYear.'-'.$nextYear;
        $invoice = 'DDAS/INST/'.$finalYearSplit.'/'.$reformattedMonth.'/';
        $count = DB::table( 'approvedcase')->select(DB::raw('max(substring(invoiceNo, 5, 5)) as max_val'))->get()->count();
        if ($count == 0) {
            $invoice = $invoice . '001';
        } else {
            $postfix = $postfix + 1;
            $addVal = str_pad($postfix, 3, '0', STR_PAD_LEFT);
            $invoice = $invoice . $addVal;
        }
            $toApproval->invoiceNo = $invoice;
            $toApproval->caseid = $request->input('caseid');
            $toApproval->employee_id = $request->input('employee_id');

            if($toApproval->save()){
            return new EmployeeResource($toApproval);
        }
    }

    public function CompletedCase(){

        $completedCase = DB::table( 'approvedcase')
            ->join('amount', 'approvedcase.caseid', '=', 'amount.caseid')
            ->join('onprocess', 'approvedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'approvedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            // ->join('cases', 'approvedcase.caseid', '=', 'cases.caseid')
            // ->join('payment', 'approvedcase.caseid', '=', 'payment.caseid')
            ->paginate(15);
            return $completedCase;
              // return  EmployeeResource::collection($completedCase);
    }

    public function CompletedCaseEmp(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $CompletedCaseEmp = DB::table('completedcase')
            ->join('onprocess', 'completedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->where('users.employee_id', $id)
            ->paginate(15);
        return $CompletedCaseEmp;
    }

    public function ApprovedCaseEmp(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $ApprovedCaseEmp = DB::table('approvedcase')
            ->join('onprocess', 'approvedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'approvedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->where('users.employee_id', $id)
            ->paginate(15);
            return $ApprovedCaseEmp;
    }

    public function RejectCase(Request $request){
         $rejectCase = $request->isMethod('put') ? rejectCase::findOrFail
        ($request->employee_id) : new rejectCase;

        //  $toApproval->caseid = $request->input('caseid');
             $rejectCase->caseid = $request->input('caseid');
            $rejectCase->employee_id = $request->input('employee_id');
            $rejectCase->msg = $request->input('msg');

        if($rejectCase->save()){
            return new EmployeeResource($rejectCase);
        }
    }

    public function FetchRejectCase(){

         $rejectedCase = DB::table('rejectcase')
            ->join('onprocess', 'rejectcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'rejectcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->paginate(15);
            return $rejectedCase;
    }
    public function FetchRejectCaseEmployee(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $rejectedCaseEmployee = DB::table('rejectcase')
            ->join('onprocess', 'rejectcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'rejectcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->where('users.employee_id', $id)
            ->paginate(15);
        return $rejectedCaseEmployee;
    }

    public function DeleteAprovedCase($id){
      DB::table('toadmin')->where('caseid', '=', $id)->delete();
    }

    public function deleteToAdmin($id){

      if($id){
        DB::table('send_to_employees')->where('caseid', '=', $id)->delete();
      }
    }

    public function DeleteRejectCase($id){
      DB::table('toadmin')->where('caseid', '=', $id)->delete();
    }

    public function fetchApproving(){
        $user = auth()->user();
        $id = $user['employee_id'];
      $approving = DB::table('toadmin')
      ->join('onprocess', 'toadmin.caseid', '=', 'onprocess.caseid')
      ->join('employees', 'toadmin.employee_id', '=', 'employees.employee_id')
      ->join('users', 'toadmin.employee_id', '=', 'users.employee_id')
        ->where('toadmin.employee_id', '=', $id)
           ->paginate(15);
           return $approving;
    }

    public function countingNewlyRegisterd(){
        $newRegistered = DB::table('cases')->count();
        $waitingforapprove = DB::table('toadmin')->count();
        $assignedcase = DB::table('send_to_employees')->count();
        $completedCase = DB::table('completedcase')->count();
        $approvedCase = DB::table( 'approvedcase')->count();
        $billedCase = DB::table('billedcase')->count();
        $rejectedcase = DB::table('rejectcase')->count();
        $onprocesscase = DB::table('onprocess')->count();
      $count = array('newRegistered'=> $newRegistered, 'waitingforapprove' => $waitingforapprove, 'assignedcase' => $assignedcase, 'completedcase' => $completedCase, 'approvedCase' => $approvedCase, 'billedcase' => $billedCase, 'rejectedcase' => $rejectedcase, 'onprocess' => $onprocesscase);
      return $count;
    }

    public function EmployeeCounter(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $employeeAssignedCase = DB::table('send_to_employees')->where('employee_id', $id)->count();
        $waitingforapprove = DB::table('toadmin')->where('employee_id', $id)->count();
        $completedCase = DB::table('completedcase')->where('employee_id', $id)->count();
        $rejectedCase = DB::table('rejectcase')->where('employee_id', $id)->count();
        $billedCase = DB::table( 'billedcase')->where('employee_id', $id)->count();
        $approvedCaseEmp = DB::table('approvedcase')->where('employee_id', $id)->count();
        $count = array('employeeAssigned' => $employeeAssignedCase, 'waitingforapprove' => $waitingforapprove, 'completedcase' => $completedCase, 'rejectedcase' => $rejectedCase, 'billedcase' => $billedCase, 'approvecaseEmp' => $approvedCaseEmp);
        return $count;
    }

    public function sendToadminAgain(Request $request){
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail
        ($request->employee_id) : new sendToAdmin;
        $toAdmin->caseid = $request->input('caseid');
        // return $request->input('assignedEmployee');
        $toAdmin->employee_id = $request->input('assignedEmployee');
        $toAdmin->docs = $request->input('docs');

        if($toAdmin->save()){
            return new EmployeeResource($toAdmin);
        }
    }

    public function deleteSendToAdmin($id){
        DB::table('rejectcase')->where('caseid', '=', $id)->delete();
    }

    public function empCompletedCase(){
        $user = auth()->user();
        $id = $user['employee_id'];
         $completedCase = DB::table('completedcase')
            ->join('onprocess', 'completedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'completedcase.employee_id', '=', 'users.employee_id')
            ->where('completedcase.employee_id', $id)
            ->paginate(15);
            return $completedCase;
    }

    public function sendApprovalAgain(Request $request){
        $toAprrovalAgain = $request->isMethod('put') ? TransferCase::findOrFail($request->employee_id) : new TransferCase;
        $toAprrovalAgain->caseid = $request->input('caseid');
        // return $request->input('assignedEmployee');
        $toAprrovalAgain->employee_id = $request->input('employee_id');
        $toAprrovalAgain->docs = $request->input('docs');
        $toAprrovalAgain->helper = $request->input('helper');
        if ($toAprrovalAgain->save()) {
            return new EmployeeResource($toAprrovalAgain);
        }
    }

    public function fetchTransferCaseEmp(){
        $user = auth()->user();
        $id = $user['employee_id'];
         $completedCase = DB::table('transfercase')
            // ->join('send_to_employees', 'completedcase.caseid', '=', 'send_to_employees.caseid')
            ->join('employees', 'transfercase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'transfercase.employee_id', '=', 'users.employee_id')
            ->where('transfercase.employee_id', $id)
            ->paginate(15);
            return $completedCase;
    }

    public function fetchSendToEmployees(){

        // $sendEmployees = DB::table('send_to_employees')
        // ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
        // ->join('users', 'send_to_employees.employee_id', '=', 'users.employee_id')
        // ->paginate(15);

        $onprocess = DB::table('onprocess')
            ->join('employees', 'onprocess.employee_id', '=', 'employees.employee_id')
            ->join('users', 'onprocess.employee_id', '=', 'users.employee_id')
            ->paginate(15);
        $all = DB::table("onprocess")->union(DB::table('send_to_employees'))->paginate(15);






        // $users = DB::table( 'onprocess')->where('employee_id')->union($sendEmployees)->get();
        return $onprocess;
        // if($sendEmployees){
        //     return $sendEmployees;
        // }
        // else{
        //     return $onprocess;
        // }

    }

    public function UpdateEmp( Request $request, $id){
        // $idCheck = sendToEmployee::where('caseid', '=', Input::get('caseid'))->first();
        // if ($idCheck === null) {
        //     Storage::put('public/' . $caseId . '/' . $fileName, $decoded);
        // }
       DB::statement( "UPDATE onprocess SET employee_id = '$request->employee_id' WHERE caseid = '$id'");

       DB::statement( "UPDATE send_to_employees SET employee_id = '$request->employee_id' WHERE caseid = '$id'");
    }

    public function TransferToOnprocess(Request $request){
        $OnProcessCase = $request->isMethod('put') ? OnProcessCase::findOrFail($request->employee_id) : new OnProcessCase;
        $OnProcessCase->caseid = $request->input('caseid');
        // return $request->input('assignedEmployee');
        $OnProcessCase->employee_id = $request->input('employee_id');
        $OnProcessCase->docs = $request->input('docs');
        $OnProcessCase->helper = $request->input('helper');
        if ($OnProcessCase->save()) {
            return new EmployeeResource($OnProcessCase);
        }

    }

    public function DeleteEmpNewCase($id){
        DB::table('send_to_employees')->where('caseid', '=', $id)->delete();
    }

    public function checkSendEmployees(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $employee = DB::table('send_to_employees')
            ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->orderBy('send_to_employees.id', 'DESC')
            ->where('send_to_employees.employee_id', $id)
            ->paginate(15);
        return $employee;
    }

    public function toBill(Request $request){
        $toBill = $request->isMethod('put') ? toBill::findOrFail($request->employee_id) : new toBill;

        $toBill->caseid = $request->input('caseid');
        $toBill->employee_id = $request->input('employee_id');
        $toBill->invoiceNo = $request->input('invoiceNo');

        if ( $toBill->save()) {
            return new EmployeeResource($toBill);
        }
    }

    public function deleteApprovedCase($id){
        DB::table('approvedcase')->where('caseid', '=', $id)->delete();
    }

    public function fetchBilledCase(){
        $BilledCase = DB::table('billedcase')
            ->join('onprocess', 'billedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'billedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            ->join('amount', 'billedcase.caseid', '=', 'amount.caseid')
            ->paginate(15);
        return $BilledCase;
    }

    public function paymentByCash(Request $request){
        $toComplete = $request->isMethod('put') ? ToComplete::findOrFail($request->employee_id) : new ToComplete();
        $byCash = $request->isMethod('put') ? byCash::findOrFail($request->employee_id) : new byCash();
        // $byNeft = $request->isMethod('put') ? byNeft::findOrFail($request->employee_id) : new byNeft();
        // $byCheque = $request->isMethod('put') ? byCheque::findOrFail($request->employee_id) : new byCheque();

        $toComplete->caseid = $request->input('caseid');
        $toComplete->employee_id = $request->input('employee_id');
        $toComplete->paidamount = $request->input('paidamount');

        $toComplete->gstamount = $request->input('gstAmount');


        $toComplete->method = $request->input('selected');
        $toComplete->date = $request->input('date');

        if( $request->input('selected') == 1){
            $byCash->name = "By Cash";
        }
        else if( $request->input('selected') == 2){
            $byCash->name = "By Cheque";
        }
        else{
            $byCash->name = "By RTGS";
        }
        $byCash->caseid = $request->input('caseid');
        $byCash->method = $request->input('selected');

        // $byCash->name = "By NEFT";
        // $byCash->method = $request->input('selected');

        // $byNeft->transactionNo = $request->input('transactionNo');
        // $byNeft->BankName = $request->input('BankName');

        // $byCash->name = "By Cheque";
        // $byCash->method = $request->input('selected');

        // $byCheque->chequeNo = $request->input('chequeNo');
        // $byCheque->bankName = $request->input('bankNamec');

        $dbCheck = ToComplete::where('caseid', '=', Input::get('caseid'))->first();
        if($dbCheck == null){
            if($toComplete->save() && $byCash->save()){
                return response()->json(['message' => '0'], 200);
            }
            else{
                return response()->json(['message' => '1'], 200);
            }
        }
        else{
            return response()->json(['message' => '2'], 200);
        }
        // if ( $request->input('selected') == 1) {
        //     $dbCheck = ToComplete::where('caseid', '=', Input::get('caseid'))->first();
        //     if ($dbCheck === null) {
        //         if($toComplete->save() && $byCash->save()){
        //         }
        //     }
        //     else{
        //         return response()->json(['message' => '1'], 200);
        //     }
        // }

        // else if( $request->input('selected') == 3){
        //     $dbCheck = ToComplete::where('caseid', '=', Input::get('caseid'))->first();
        //     if ($dbCheck === null) {
        //         if ( $toComplete->save() && $byNeft->save()) {
        //             return response()->json(['message' => '0'], 200);
        //         }
        //     } else {
        //         return response()->json(['message' => '1'], 200);
        //     }
        // }
        // else{
        //     $dbCheck = ToComplete::where('caseid', '=', Input::get('caseid'))->first();
        //     if ($dbCheck === null) {
        //         if ( $toComplete->save() && $byCheque->save()) {
        //             return response()->json(['message' => '0'], 200);
        //         }
        //     } else {
        //         return response()->json(['message' => '1'], 200);
        //     }

        // }
        // else if( $toComplete->save() && $byCheque->save()){
        //     return response()->json(['message' => '2']);
        // }
    }

    public function fetchCollectionRegister(){
        $cash = DB::table('completedcase')
            ->join('bycash', 'completedcase.method', '=', 'bycash.method')
            ->join('client_details', 'completedcase.caseid', '=', 'client_details.caseid')
            ->paginate(15);

        $todaysDailyCollection = DB::table('payment')->sum('advamount');
        $todaysDailyCollectionCheque = DB::table('cheque')->sum('advamount');
        $todaysDailyCollectionRtgs = DB::table('rtgs')->sum('advamount');
        $OveralltotalAmount =  DB::table('completedcase')->sum('paidamount');
        $OverallgstAmount =  DB::table('completedcase')->sum('gstamount');
        $date = substr(Carbon::today(), 0, 10);
        $todaystotalAmount =  DB::table('completedcase')->where('date', $date)->sum('paidamount');
        $todaysgstamount =  DB::table('completedcase')->where('date', $date)->sum('gstamount');
        $todaystotalAmountByCash =  DB::table('completedcase')->where('date', $date)->where('method', '1')->sum('paidamount');
        $todaystotalAmountByCheque =  DB::table('completedcase')->where('date', $date)->where('method', '2')->sum('paidamount');
        $todaystotalAmountByRtgs =  DB::table('completedcase')->where('date', $date)->where('method', '3')->sum('paidamount');
        $custom = collect(['todaystotalAmount' => $todaystotalAmount, 'todaysgstAmount' => $todaysgstamount, 'TodaysTotalAmountByCash' => $todaystotalAmountByCash, 'TodaysTotalAmountByCheque' => $todaystotalAmountByCheque, 'TodaysTotalAmountByRtgs' => $todaystotalAmountByRtgs, 'OverallTotalAmount' => $OveralltotalAmount, 'OverallgstAmount' => $OverallgstAmount, 'totalDailyCollection' => $todaysDailyCollection, 'todayscollectionByCheque' => $todaysDailyCollectionCheque, 'todaysCollectionByRtgs' => $todaysDailyCollectionRtgs]);
        $data = $custom->merge($cash);
        return response()->json($data);
        // $data =

        // $cheque = DB::table('completedcase')
        //         ->join('bycheque', 'completedcase.method', '=', 'bycheque.method')->get();

        $cheque = DB::table( "completedcase")
        // ->join('bycash', 'completedcase.method', '=', 'bycash.method')
        ->join('byneft', 'completedcase.method', '=', 'byneft.method')
        ->get();

        // $data = array($cash);
        // $totalAmount =  DB::table('completedcase')->sum('paidamount');
        // array_push($data, $totalAmount);
        // return $data;
        /*foreach ($data as $d)
        $d->push($totalAmount);
        return $d;*/
        // $this->totalAmount = array_push($data, $totalAmount);
        // return $totalAmount;
        // $cash = $cheque->union(DB::table('completedcase')->join('bycash', 'completedcase.method', '=', 'bycash.method')->get());
        // ->join('bycash', 'completedcase.method', '=', 'bycash.method')

        // $cheque = DB::table('completedcase')->unionAll($cash)->get();

            // return $cash;

        // else if ($data->method == 2) {
        //     $data1 = DB::table('completedcase')
        //         ->join('bycheque', 'completedcase.method', '=', 'bycheque.method')->paginate(15);
        //     return $data1;
        // }
    }

    public function getInvoice(){
       $data = DB::table('approvedcase')->paginate(15);
       return $data;
    }

    public function fetchFiles(){
        $data = DB::table('sendfiletoadmin')->paginate(15);
        return $data;
    }

    public function status(){
        $data = DB::table('toadmin')->paginate(15);
        return $data;
    }

    public function VerifyEmployee(){
        $verifyEmployee = DB::table( 'transfercase')
            ->join('cases', 'transfercase.caseid', '=', 'cases.caseid')
            ->join('employees', 'transfercase.employee_id', '=', 'employees.employee_id')
            ->paginate(15);
        return $verifyEmployee;
    }

    public function SupportStaff(){
        $data = DB::table('users')->where('users.selected', 2)->pluck('users.name');
        return $data;
    }

}
