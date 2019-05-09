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
use Storage;
use File;
use DB;
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
        $employees = Employee::paginate(15);
        return  EmployeeResource::collection($employees);
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
        Storage::put('public/'.$caseId.'/'.$fileName, $decoded);

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
              ->join('send_to_employees', 'toadmin.caseid', '=', 'send_to_employees.caseid')
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
            ->join('send_to_employees', 'completedcase.caseid', '=', 'send_to_employees.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
            ->paginate(15);
            return $completedCase;
              // return  EmployeeResource::collection($completedCase);
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

    public function FetchRejectCase($id){
         $completedCase = DB::table('rejectcase')
            ->join('send_to_employees', 'rejectcase.caseid', '=', 'send_to_employees.caseid')
            ->join('employees', 'rejectcase.employee_id', '=', 'employees.employee_id')
            ->where('rejectcase.employee_id', $id)
            ->paginate(15);
            return $completedCase;
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

    public function fetchApproving($id){
      $approving = DB::table('toadmin')
           ->join('employees', 'toadmin.employee_id', '=', 'employees.employee_id')
           ->join('send_to_employees', 'toadmin.caseid', '=', 'send_to_employees.caseid')
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

    public function EmployeeCounter($id){
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
}
