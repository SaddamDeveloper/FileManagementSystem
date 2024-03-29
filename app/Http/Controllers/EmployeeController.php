<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\EmployeeResource as EmployeeResource;
use App\sendToEmployee;
use App\sendToAdmin;
use App\sendToApproval;
use App\rejectCase;
use App\OnProcessCase;
use App\toBill;
use App\byCash;
use Storage;
use DB;
use App\TransferCase;
use Illuminate\Support\Facades\Input;
use App\ToComplete;
use Carbon\Carbon;
use App\UploadedFile;
use App\ToInvoice;
use App\caseUpdate;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::paginate(15);
    }

    public function store(Request $request)
    {
        //Store or Update
        $employee = $request->isMethod('put') ? Employee::findOrFail($request->employee_id) : new Employee;
        $employee->employee_id = $this->generateEmployeeId();
        $employee->name = $request->input('name');
        $employee->no = $request->input('no');
        $employee->email = $request->input('email');
        $employee->designation = $request->input('designation');
        $employee->expertise = implode(",", $request->input('select'));
        $employee->address = $request->input('address');
        $employee->save();
        return new EmployeeResource($employee);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->noContent();
    }
    public function send(Request $request)
    {
        //send to employee
        $toEmployee = $request->isMethod('put') ? sendToEmployee::findOrFail($request->employee_id) : new sendToEmployee;

        $toEmployee->caseid = $request->input('caseid');
        $toEmployee->employee_id = $request->input('employee_id');



        if ($request->input('docs') == null) {
            $toEmployee->docs = '';
        } else {
            $exploded = explode(',', $request->docs);
            $decoded = base64_decode($exploded[1]);

            $fileName = $request->fileName;
            $caseId = $request->input('caseid');
            $idCheck = sendToEmployee::where('caseid', '=', Input::get('caseid'))->first();
            if ($idCheck === null) {
                Storage::put('public/' . $caseId . '/' . $fileName, $decoded);
            } else {
                return response()->json(['message' => 'Case is already reserved'], 200);
            }
            $toEmployee->docs = $fileName;
        }

        if ($request->input('helper') == null) {
            $toEmployee->helper = '';
        } else {
            $helper = implode(",", $request->input('helper'));
            $toEmployee->helper = $helper;
        }

        if ($toEmployee->save() &&  DB::statement("UPDATE status SET status = 'newassigned' WHERE caseid = '$toEmployee->caseid'")) {
            return new EmployeeResource($toEmployee);
        }

        // $inquiries = DB::table('send_to_employees')->where('caseid', $caseId)->get();
        // foreach($inquiries as $row_data){
        //     $postfix =  $row_data->caseid;
        //     if(!$postfix){
        //     }
        // }

        // $toEmployee->docs = $fileName ? $fileName : '';
        // if($request->input('docs') === null){
        //     return "null";
        // }
        // else{
        //     $toEmployee->docs = $fileName;
        // }

        // $helper = implode(",", $request->input('helper'));
        // if( $$toEmployee->helper != null){
        //     $toEmployee->helper = $helper;
        // }
        // else{
        //     $toEmployee->helper = '';
        // }
        // if($toEmployee->save()){
        //   return new EmployeeResource($toEmployee);
        // }
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

    public function toDb(Request $request)
    {
        //  //send to Db
        $toDb = $request->isMethod('put') ? UploadedFile::findOrFail($request->docs) : new UploadedFile;
        $exploded = explode(',', $request->docs);
        $decoded = base64_decode($exploded[1]);
        $fileName = $request->fileName;
        $caseId = $request->input('caseid');
        // $idCheck = UploadedFile::where('caseid', '=', Input::get('caseid'))->first();
        // if ($idCheck === null) {
        $store = Storage::put('public/' . $caseId . '/' . $fileName, $decoded);

        // } else {
        // }
        $toDb->caseid = $request->input('caseid');
        $toDb->employee_id = $request->input('assignedEmployee');
        $toDb->docs = $fileName;
        // $toDb->helper = implode(",", $request->input('helper'));
        // return $caseId;
        if ($store && $toDb->save()) {
            return response()->json(['message' => '0'], 200);
        } else {
            return response()->json(['message' => '1'], 200);
        }
    }
    public function toAdmin(Request $request)
    {
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail($request->employee_id) : new sendToAdmin();

        // $count = DB::table('toadmin')->select('caseid')->get();
        // return $count;
        if ($request->input('docs') == null) {
            $toAdmin->docs = '';
        } else {
            $toAdmin->docs = $request->input('docs');
        }
        $toAdmin->helper = $request->input('helper');
        $toAdmin->caseid = $request->input('caseid');
        $toAdmin->employee_id = $request->input('employee_id');

        // if( $request->input('docs') == null){
        //     $toAdmin->docs = '';
        // }
        // else{
        //     $toAdmin->docs = $request->input('docs');
        // }

        $dbCheck = sendToAdmin::where('caseid', '=', Input::get('caseid'))->first();
        if ($dbCheck == null) {
            if ($toAdmin->save() &&  DB::statement("UPDATE status SET status = 'waitingforapprove' WHERE caseid = '$toAdmin->caseid'")) {
                return response()->json(['message' => '0'], 200);
            }
        } else {
            return response()->json(['message' => '1'], 200);
        }
    }

    public function fetchApproveCase()
    {
        // $approvedCase = sendToAdmin::paginate(15);
        //     $approvedCase = \App\sendToAdmin::with('sendAdmin')
        //    ->paginate(15);

        $approvedCase = DB::table('toadmin')
            ->join('employees', 'toadmin.employee_id', '=', 'employees.employee_id')
            // ->join('onprocess', 'toadmin.caseid', '=', 'onprocess.caseid')
            ->join('users', 'toadmin.employee_id', '=', 'users.employee_id')
            ->paginate(15);
        return $approvedCase;
        // return  EmployeeResource::collection($approvedCase);
    }
    public function AprovedCase(Request $request)
    {
        $toApproval = $request->isMethod('put') ? sendToApproval::findOrFail($request->employee_id) : new sendToApproval;

        $toInvoice = new ToInvoice;

        //Generate INVOICE NO
        $invoice = DB::table('invoice')->select(DB::raw('max(substring(invoice_no, 21, 3)) as max_val'))->get();
        foreach ($invoice as $row_data) {
            $postfix =  $row_data->max_val;
        }
        $now = Carbon::now();
        $month = $now->format('F');
        $reformattedMonth = substr($month, 0, 3);
        $year = $now->year;
        $currentYear =  substr($year, 2, 5);
        $nextYear = $currentYear + 1;
        $finalYearSplit = $currentYear . '-' . $nextYear;
        $invoice = 'DDAS/INST/' . $finalYearSplit . '/' . $reformattedMonth . '/';
        $count = DB::table('invoice')->select(DB::raw('max(substring(invoice_no, 5, 5)) as max_val'))->get()->count();
        if ($count == 0) {
            $invoice = $invoice . '001';
        } else {
            $postfix = $postfix + 1;
            $addVal = str_pad($postfix, 3, '0', STR_PAD_LEFT);
            $invoice = $invoice . $addVal;
        }
        $toApproval->invoiceNo = $invoice;
        $toInvoice->invoice_no = $invoice;
        $toInvoice->caseid = $request->input('caseid');
        $toApproval->caseid = $request->input('caseid');
        $toApproval->employee_id = $request->input('employee_id');

        if ($toApproval->save() && $toInvoice->save() &&  DB::statement("UPDATE status SET status = 'approved' WHERE caseid = '$toApproval->caseid'")) {
            return new EmployeeResource($toApproval);
        }
    }

    public function AdminCompletedCase()
    {
        $completedCase = DB::table('completedcase')
            ->join('amount', 'completedcase.caseid', '=', 'amount.caseid')
            ->join('onprocess', 'completedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'completedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            // ->join('cases', 'approvedcase.caseid', '=', 'cases.caseid')
            // ->join('payment', 'approvedcase.caseid', '=', 'payment.caseid')
            ->paginate(15);
        return $completedCase;
    }
    public function CompletedCase()
    {

        $completedCase = DB::table('approvedcase')
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

    public function CompletedCaseEmp()
    {
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

    public function ApprovedCaseEmp()
    {
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

    public function RejectCase(Request $request)
    {
        $rejectCase = $request->isMethod('put') ? rejectCase::findOrFail($request->employee_id) : new rejectCase;

        //  $toApproval->caseid = $request->input('caseid');
        $rejectCase->caseid = $request->input('caseid');
        $rejectCase->employee_id = $request->input('employee_id');
        $rejectCase->msg = $request->input('msg');

        if ($rejectCase->save()) {
            return new EmployeeResource($rejectCase);
        }
    }

    public function FetchRejectCase()
    {

        $rejectedCase = DB::table('rejectcase')
            ->join('onprocess', 'rejectcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'rejectcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.email', '=', 'users.email')
            ->paginate(15);
        return $rejectedCase;
    }
    public function FetchRejectCaseEmployee()
    {
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

    public function DeleteAprovedCase($id)
    {
        DB::table('toadmin')->where('caseid', '=', $id)->delete();
    }

    public function deleteToAdmin($id)
    {

        if ($id) {
            DB::table('send_to_employees')->where('caseid', '=', $id)->delete();
        }
    }

    public function DeleteRejectCase($id)
    {
        DB::table('toadmin')->where('caseid', '=', $id)->delete();
    }

    public function fetchApproving()
    {
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

    public function countingNewlyRegisterd()
    {
        $user = auth()->user();
        $id = $user['employee_id'];

        $newRegistered = DB::table('cases')->count();
        $newRegisteredEmp = DB::table('send_to_employees')->where('employee_id', '=', $id)->count();
        $onprocessEmp = DB::table('onprocess')->where('employee_id', '=', $id)->count();
        $waitingforapprove = DB::table('toadmin')->count();
        $waitingforapproveEmp = DB::table('toadmin')->where('employee_id', '=', $id)->count();
        $assignedcase = DB::table('send_to_employees')->count();
        $completedCase = DB::table('completedcase')->count();
        $completedCaseEmp = DB::table('completedcase')->where('employee_id', '=', $id)->count();

        $approvedCase = DB::table('approvedcase')->count();
        $approvedCaseEmp = DB::table('approvedcase')->where('employee_id', '=', $id)->count();

        $billedCase = DB::table('billedcase')->count();
        $rejectedcase = DB::table('rejectcase')->count();
        $rejectedcaseEmp = DB::table('rejectcase')->where('employee_id', '=', $id)->count();
        $onprocesscase = DB::table('onprocess')->count();
        $count = array(
            'newRegistered' => $newRegistered,
            'waitingforapprove' => $waitingforapprove,
            'assignedcase' => $assignedcase,
            'completedcase' => $completedCase,
            'approvedCase' => $approvedCase,
            'billedcase' => $billedCase,
            'rejectedcase' => $rejectedcase,
            'onprocess' => $onprocesscase,
            'newRegisteredEmp' => $newRegisteredEmp,
            'onprocessEmp' => $onprocessEmp,
            'waitingforapproveEmp' => $waitingforapproveEmp,
            'completedCaseEmp'  =>  $completedCaseEmp,
            'approvedCaseEmp'   => $approvedCaseEmp,
            'rejectedcaseEmp'   => $rejectedcaseEmp
        );
        return $count;
    }

    public function EmployeeCounter()
    {
        $user = auth()->user();
        $id = $user['employee_id'];
        $employeeAssignedCase = DB::table('send_to_employees')->where('employee_id', $id)->count();
        $waitingforapprove = DB::table('toadmin')->where('employee_id', $id)->count();
        $completedCase = DB::table('completedcase')->where('employee_id', $id)->count();
        $rejectedCase = DB::table('rejectcase')->where('employee_id', $id)->count();
        $billedCase = DB::table('billedcase')->where('employee_id', $id)->count();
        $approvedCaseEmp = DB::table('approvedcase')->where('employee_id', $id)->count();
        $count = array('employeeAssigned' => $employeeAssignedCase, 'waitingforapprove' => $waitingforapprove, 'completedcase' => $completedCase, 'rejectedcase' => $rejectedCase, 'billedcase' => $billedCase, 'approvecaseEmp' => $approvedCaseEmp);
        return $count;
    }

    public function sendToadminAgain(Request $request)
    {
        $toAdmin = $request->isMethod('put') ? sendToAdmin::findOrFail($request->employee_id) : new sendToAdmin;
        $toAdmin->caseid = $request->input('caseid');
        // return $request->input('assignedEmployee');
        $toAdmin->employee_id = $request->input('assignedEmployee');
        // $toAdmin->docs = $request->input('docs');

        if ($toAdmin->save()) {
            return new EmployeeResource($toAdmin);
        }
    }

    public function deleteSendToAdmin($id)
    {
        DB::table('rejectcase')->where('caseid', '=', $id)->delete();
    }

    public function empCompletedCase()
    {
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

    public function sendApprovalAgain(Request $request)
    {
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

    public function fetchTransferCaseEmp()
    {
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

    public function fetchSendToEmployees()
    {

        // $sendEmployees = DB::table('send_to_employees')
        // ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
        // ->join('users', 'send_to_employees.employee_id', '=', 'users.employee_id')
        // ->paginate(15);

        $onprocess = DB::table('onprocess')
            ->join('employees', 'onprocess.employee_id', '=', 'employees.employee_id')
            ->join('users', 'onprocess.employee_id', '=', 'users.employee_id')
            ->join('status', 'onprocess.caseid', '=', 'status.caseid')
            ->paginate(15);
        // $all = DB::table("onprocess")->union(DB::table('send_to_employees'))->paginate(15);

        $all = DB::query()
            ->fromSub(
                DB::table('send_to_employees')
                    ->select([
                        'caseid',
                        'docs',
                        'helper',
                        'employee_id'
                    ])
                    ->union(
                        DB::table('onprocess')
                            ->select([
                                'caseid',
                                'docs',
                                'helper',
                                'employee_id'
                            ])
                    ),
                'inner'
            )
            ->join('users', 'users.employee_id', '=', 'inner.employee_id')
            ->select(['inner.*', 'users.*'])
            ->get();


        // $users = DB::table( 'onprocess')->where('employee_id')->union($sendEmployees)->get();
        return $all;
        // if($sendEmployees){
        //     return $sendEmployees;
        // }
        // else{
        //     return $onprocess;
        // }

    }

    public function UpdateEmp(Request $request, $id)
    {
        // $idCheck = sendToEmployee::where('caseid', '=', Input::get('caseid'))->first();
        // if ($idCheck === null) {
        //     Storage::put('public/' . $caseId . '/' . $fileName, $decoded);
        // }
        DB::statement("UPDATE onprocess SET employee_id = '$request->employee_id' WHERE caseid = '$id'");

        DB::statement("UPDATE send_to_employees SET employee_id = '$request->employee_id' WHERE caseid = '$id'");
    }

    public function TransferToOnprocess(Request $request)
    {
        $OnProcessCase = $request->isMethod('put') ? OnProcessCase::findOrFail($request->employee_id) : new OnProcessCase;
        $OnProcessCase->caseid = $request->input('caseid');
        // return $request->input('assignedEmployee');
        $OnProcessCase->employee_id = $request->input('employee_id');
        if ($request->input('docs') == null) {
            $OnProcessCase->docs = '';
        } else {
            $OnProcessCase->docs = $request->input('docs');
        }

        if ($request->input('helper') == null) {
            $OnProcessCase->helper = '';
        } else {
            $OnProcessCase->helper = $request->input('helper');
        }
        if ($OnProcessCase->save() && DB::statement("UPDATE status SET status = 'onprocess' WHERE caseid = '$OnProcessCase->caseid'")) {
            return new EmployeeResource($OnProcessCase);
        }
    }

    public function DeleteEmpNewCase($id)
    {
        DB::table('send_to_employees')->where('caseid', '=', $id)->delete();
    }

    public function checkSendEmployees()
    {
        $user = auth()->user();
        $id = $user['employee_id'];
        $employee = DB::table('send_to_employees')
            ->join('employees', 'send_to_employees.employee_id', '=', 'employees.employee_id')
            ->join('cases', 'send_to_employees.caseid', '=', 'cases.caseid')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            ->orderBy('send_to_employees.id', 'DESC')
            ->where('send_to_employees.employee_id', $id)
            ->paginate(15);
        return $employee;
    }

    public function toBill(Request $request)
    {
        $toBill = $request->isMethod('put') ? toBill::findOrFail($request->employee_id) : new toBill;

        $toBill->caseid = $request->input('caseid');
        $toBill->employee_id = $request->input('employee_id');
        $toBill->invoiceNo = $request->input('invoiceNo');

        if ($toBill->save() &&  DB::statement("UPDATE status SET status = 'billedcase' WHERE caseid = '$toBill->caseid'")) {
            return new EmployeeResource($toBill);
        }
    }

    public function deleteApprovedCase($id)
    {
        DB::table('approvedcase')->where('caseid', '=', $id)->delete();
    }

    public function deleteBilledCase($id)
    {
        DB::table('billedcase')->where('caseid', '=', $id)->delete();
    }


    public function fetchBilledCase()
    {
        $BilledCase = DB::table('billedcase')
            ->join('onprocess', 'billedcase.caseid', '=', 'onprocess.caseid')
            ->join('employees', 'billedcase.employee_id', '=', 'employees.employee_id')
            ->join('users', 'employees.employee_id', '=', 'users.employee_id')
            ->join('amount', 'billedcase.caseid', '=', 'amount.caseid')
            ->paginate(15);
        return $BilledCase;
    }

    public function paymentByCash(Request $request)
    {
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
        if ($request->input('selected') == 1) {
            $byCash->name = "By Cash";
        } else if ($request->input('selected') == 2) {
            $byCash->name = "By Cheque";
        } else {
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
        if ($dbCheck == null) {
            if ($toComplete->save() && $byCash->save() &&  DB::statement("UPDATE status SET status = 'completed' WHERE caseid = '$byCash->caseid'")) {
                return response()->json(['message' => '0'], 200);
            } else {
                return response()->json(['message' => '1'], 200);
            }
        } else {
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

    public function fetchCollectionRegister()
    {

        $cash = DB::table('completedcase')
            ->join('bycash', 'completedcase.method', '=', 'bycash.method')
            ->join('client_details', 'completedcase.caseid', '=', 'client_details.caseid')
            ->paginate(15);

        $DailyCollectionCash = DB::table('cash')->join('amount', 'cash.caseid', '=', 'amount.caseid')->sum('advamount');
        $DailyCollectionCheque = DB::table('cheque')->join('amount', 'cheque.caseid', '=', 'amount.caseid')->sum('advamount');
        $DailyCollectionRtgs = DB::table('rtgs')->join('amount', 'rtgs.caseid', '=', 'amount.caseid')->sum('advamount');

        $MonthlyCollection = DB::table('cases')->whereMonth('created_at', Carbon::now()->month)->sum('amount');

        // return $posts;
        $TodaysDailyCollectionCash = DB::table('cash')->join('amount', 'cash.caseid', '=', 'amount.caseid')->join('cases', 'cash.caseid', '=', 'cases.caseid')->whereDate('created_at', DB::raw('CURDATE()'))->sum('advamount');
        // return $TodaysDailyCollectionCash;
        $TodaysDailyCollectionCheque = DB::table('cheque')->join('amount', 'cheque.caseid', '=', 'amount.caseid')->join('cases', 'cheque.caseid', '=', 'cases.caseid')->whereDate('created_at', DB::raw('CURDATE()'))->sum('advamount');
        $TodaysDailyCollectionRtgs = DB::table('rtgs')->join('amount', 'rtgs.caseid', '=', 'amount.caseid')->join('cases', 'rtgs.caseid', '=', 'cases.caseid')->whereDate('created_at', DB::raw('CURDATE()'))->sum('advamount');

        $OveralltotalCollection = DB::table('amount')->join('cases', 'amount.caseid', '=', 'cases.caseid')->whereDate('created_at', DB::raw('CURDATE()'))->sum('advamount');
        $actualAmount = DB::table('amount')->sum('amount');

        // $todaysDailyCollectionRtgs = DB::table('rtgs')->sum('advamount');
        // $OveralltotalAmount =  DB::table('completedcase')->sum('paidamount');
        // $OverallgstAmount =  DB::table('completedcase')->sum('gstamount');
        // $date = substr(Carbon::today(), 0, 10);
        // $todaystotalAmount =  DB::table('completedcase')->where('date', $date)->sum('paidamount');
        // $todaysgstamount =  DB::table('completedcase')->where('date', $date)->sum('gstamount');
        // $todaystotalAmountByCash =  DB::table('completedcase')->where('date', $date)->where('method', '1')->sum('paidamount');
        // $todaystotalAmountByCheque =  DB::table('completedcase')->where('date', $date)->where('method', '2')->sum('paidamount');
        // $todaystotalAmountByRtgs =  DB::table('completedcase')->where('date', $date)->where('method', '3')->sum('paidamount');
        $custom = collect(['TotalAmountByCash' => $DailyCollectionCash, 'TotalAmountByCheque' => $DailyCollectionCheque, 'TotalAmountByRtgs' => $DailyCollectionRtgs,  'TodaysTotalAmountByCash' => $TodaysDailyCollectionCash, 'TodaysTotalAmountByCheque' => $TodaysDailyCollectionCheque, 'TodaysTotalAmountByRtgs' => $TodaysDailyCollectionRtgs, 'OverallTotalCollection' => $OveralltotalCollection, 'actualAmount' => $actualAmount, 'monthlyCollection' => $MonthlyCollection]);
        // $data = $custom->merge($cash);
        return response()->json($custom);
        // $data =

        // $cheque = DB::table('completedcase')
        //         ->join('bycheque', 'completedcase.method', '=', 'bycheque.method')->get();

        $cheque = DB::table("completedcase")
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

    public function getInvoice()
    {
        $data = DB::table('approvedcase')->paginate(15);
        return $data;
    }

    public function fetchFiles()
    {
        $data = DB::table('sendfiletoadmin')->paginate(15);
        return $data;
    }

    public function status()
    {
        $data = DB::table('toadmin')->paginate(15);
        return $data;
    }

    public function VerifyEmployee()
    {
        $user = auth()->user();
        $id = $user['employee_id'];
        $verifyEmployee = DB::table('transfercase')
            ->join('cases', 'transfercase.caseid', '=', 'cases.caseid')
            ->join('employees', 'transfercase.employee_id', '=', 'employees.employee_id')
            ->where('transfercase.employee_id', $id)
            ->paginate(15);
        return $verifyEmployee;
    }

    public function SupportStaff()
    {
        $data = DB::table('users')->where('users.selected', 2)->pluck('users.name');
        return $data;
    }

    public function DeleteOnProcess($id)
    {
        $onprocessdelete = DB::table('onprocess')->where('caseid', $id);

        $onprocessdelete->delete();
    }

    public function AmountReassign(Request $request)
    {
        DB::statement("UPDATE amount SET amount = '$request->amount' WHERE caseid = '$request->caseid'");
        DB::statement("UPDATE cases SET amount = '$request->amount' WHERE caseid = '$request->caseid'");
    }

    public function caseUpdate(Request $request)
    {
        $status = new caseUpdate;
        $status->caseid = $request->input('caseid');
        $status->employee_id = $request->input('employeeid');
        $status->date = $request->input('date');
        $status->status = $request->input('status');

        if ($status->save()) {
            return response()->json(['message' => '1'], 200);
        } else {
            return response()->json(['message' => '2'], 200);
        }
    }

    public function fetchCaseUpdate($id)
    {
        // $user = auth()->user();
        // $id = $user['employee_id'];
        $status = DB::table('casestatus')
            ->where('caseid', $id)
            ->orderBy('date', 'desc')
            ->paginate(15);
        return $status;
    }

    public function fetchCaseUpdateAll()
    {
        $status = DB::table('casestatus')
            ->paginate(15);
        return $status;
    }

    private function generateEmployeeId(): string
    {
        $sql = Employee::select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->get();
        foreach ($sql as $row_data) {
            $postfix =  $row_data->max_val;
        }

        $employee_id = 'EMP';
        $count = Employee::select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->count();
        if ($count < 1) $employee_id . '00001';
        $postfix = $postfix + 1;
        $addVal = str_pad($postfix, 5, '0', STR_PAD_LEFT);
        return $employee_id . $addVal;
    }
}
