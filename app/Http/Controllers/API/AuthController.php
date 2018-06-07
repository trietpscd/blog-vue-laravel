<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Validator;
use App\User;
class AuthController extends Controller
{
    //
    public function register( Request $request ) 
    {
    	$validator = Validator::make($request->all(),[
            'name' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10'
        ]);
        if($validator->fails()){
            return response()->json([
            	'status' => 'error',
            	'error' => $validator->errors()->toArray()
            ]);
        }else{
	    	$user = new User;
		    $user->email = $request->email;
		    $user->name = $request->name;
		    $user->password = bcrypt($request->password);
		    $user->save();
		    return response([
		        'status' => 'success',
		        'data' => $user
		       ], 200);
		}
    }
}
