<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reception;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ReceptionController extends Controller
{
    public function signup(Request $request){
        $this->validate($request, [
            'name'  => 'required',
            'email' =>  'required|email|unique:receptions',
            'password'  =>  'required'
        ]);

        $reception = new Reception([
            'name'  =>  $request->input('name'),
            'email' =>  $request->input('email'),
            'password'  => bcrypt($request->input('password'))
        ]);

        $reception->save();
        return response()->json([
            'message'   =>  'Successfully Created Receptionist!'
        ],201);

    }

    public function signin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' =>  'Invalid Credentials'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' =>  'Couldnot create token!'
            ], 500);
        }

        return response()->json(compact('token'));
    }
}
