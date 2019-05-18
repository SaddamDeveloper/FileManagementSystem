<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
class UserController extends Controller
{
    public function createUser(Request $request){
        $test = new Test();
        $test->content = $request->input('content');
        $test->save();
        return response()->json(['content'  =>  $test, 'user'   =>  $user]);
    }
}
