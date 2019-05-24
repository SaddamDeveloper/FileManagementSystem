<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Employee;
use DB;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login', 'signup']]);
    }


    public function signup(Request $request){
        if ($request->isMethod('put')) {
            $usersPut = User::findOrFail($request->id);
        } else {
            $empDetails = new Employee;
            $users = new User;
        }

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|string|email|max:191',
        //     'password'  =>  'required'
        // ]);

        //generate employee id
        $sql = DB::table('employees')->select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->get();
        foreach ($sql as $row_data) {
            $postfix =  $row_data->max_val;
        }

        $employee_id = 'EMP';
        $count = DB::table('employees')->select(DB::raw('max(substring(employee_id, 5, 5)) as max_val'))->get()->count();
        if ($count == 0) {
            $employee_id = $employee_id . '00001';
        } else {
            $postfix = $postfix + 1;
            $addVal = str_pad($postfix, 5, '0', STR_PAD_LEFT);
            $employee_id = $employee_id . $addVal;
        }
        //

        $users->employee_id = $employee_id;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        $users->selected = $request->input('selected');

        if($request->input('selected') == 2){
            $empDetails->employee_id = $employee_id;
            $empDetails->no = $request->input('no');
            $empDetails->email = $request->input('email');
            $empDetails->designation = $request->input('designation');
            $empDetails->expertise = implode(",", $request->input('select'));
            $empDetails->address = $request->input('address');
            $empDetails->save();
            $users->save();
        }
        else{
            $users->save();
        }

        return response()->json([
            'message'   => 'Successfully created user'
        ], 201);
    }

    // public function signupadmin(Request $request)
    // {
    //     if ($request->isMethod('put')) {
    //         $usersPut = Admin::findOrFail($request->id);
    //     } else {
    //         $admin = new Admin;
    //     }

    //     // $request->validate([
    //     //     'name' => 'required',
    //     //     'email' => 'required|string|email|max:191',
    //     //     'password'  =>  'required'
    //     // ]);

    //     $admin->name = $request->input('name');
    //     $admin->email = $request->input('email');
    //     $admin->password = bcrypt($request->input('password'));
    //     $admin->save();

    //     return response()->json([
    //         'message'   => 'Successfully created user'
    //     ], 201);
    // }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password', 'selected']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    // public function adminlogin()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (!$token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->respondWithToken($token);
    // }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function payload(){
        return auth()->payload();
    }
}
