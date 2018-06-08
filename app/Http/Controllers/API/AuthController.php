<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Validator;
use Auth;
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
		    return response()([
		        'status' => 'success',
		        'data' => $user
		       ], 200);
		}
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response([
            'status' => 'success',
            'token' => $token
        ], 200);
    }

    public function user(Request $request)
	{
	    $user = JWTAuth::toUser($request->token);
	    return response([
	            'status' => 'success',
	            'data' => $user
	        ]);
	}
	public function refresh()
	{
	    return response([
	            'status' => 'success'
	        ]);
	}
}
