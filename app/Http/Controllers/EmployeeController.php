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
use Storage;
use File;
use DB;
use App\TransferCase;
use Illuminate\Support\Facades\Input;

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
         $toDb = $request->isMethod('put') ? sendToEmployee::findOrFail
        ($request->employee_id) : new sendToEmployee;

         $exploded = explode(',', $request->docs);
         $decoded = base64_decode($exploded[1]);

        $fileName = $request->fileName;

         $caseId = $request->input('caseid');
         return $caseId;
        // Storage::putFile('public/'.$caseId.'/'.$fileName, $decoded);

        // $toEmployee->caseid = $request->input('caseid');
        // $toEmployee->assignedEmployee = $request->input('assignedEmployee');
        // $toDb->docs = $fileName;
        // $toEmployee->helper = implode(",", $request->input('helper'));

        // if($toDb->save()){
        //     return new EmployeeResource($toDb);
        // }

    }
    public function toAdmin(Request $request){
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail
        ($request->employee_id) : new sendToAdmin;
        $toAdmin->caseid = $request->input('caseid');
        $toAdmin->employee_id = $request->input('employee_id');
        $toAdmin->docs = $request->input('docs');

        if($toAdmin->save()){
            return new EmployeeResource($toAdmin);
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

        //  $toApproval->caseid = $request->input('caseid');
             $toApproval->caseid = $request->input('caseid');
            $toApproval->employee_id = $request->input('employee_id');

            if($toApproval->save()){
            return new EmployeeResource($toApproval);
        }
    }

    public function CompletedCase(){
        $completedCase = DB::table('completedcase')
            ->join('onprocess', 'completedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            ->join('cases', 'completedcase.caseid', '=', 'cases.caseid')
            ->join('payment', 'completedcase.caseid', '=', 'payment.caseid')
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
        $ApprovedCaseEmp = DB::table('completedcase')
            ->join('onprocess', 'completedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
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
            ->join('send_to_employees', 'rejectcase.caseid', '=', 'send_to_employees.caseid')
            ->join('employees', 'rejectcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->paginate(15);
            return $rejectedCase;
    }
    public function FetchRejectCaseEmployee(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $rejectedCaseEmployee = DB::table('rejectcase')
            ->join('send_to_employees', 'rejectcase.caseid', '=', 'send_to_employees.caseid')
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
      $count = array('newRegistered'=> $newRegistered, 'waitingforapprove' => $waitingforapprove, 'assignedcase' => $assignedcase, 'completedcase' => $completedCase);
      return $count;
    }

    public function EmployeeCounter(){
        $user = auth()->user();
        $id = $user['employee_id'];
        $employeeAssignedCase = DB::table('send_to_employees')->where('employee_id', $id)->count();
        $waitingforapprove = DB::table('toadmin')->where('employee_id', $id)->count();
        $completedCase = DB::table('completedcase')->where('employee_id', $id)->count();
        $rejectedCase = DB::table('rejectcase')->where('employee_id', $id)->count();
        $count = array('employeeAssigned' => $employeeAssignedCase, 'waitingforapprove' => $waitingforapprove, 'completedcase' => $completedCase, 'rejectedcase' => $rejectedCase);
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
        $sendEmployees = DB::table('send_to_employees')
            ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
            ->join('users', 'send_to_employees.employee_id', '=', 'users.employee_id')
            ->paginate(15);
            return $sendEmployees;
    }

    public function UpdateEmp( Request $request, $id){
        // $idCheck = sendToEmployee::where('caseid', '=', Input::get('caseid'))->first();
        // if ($idCheck === null) {
        //     Storage::put('public/' . $caseId . '/' . $fileName, $decoded);
        // }
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
}
