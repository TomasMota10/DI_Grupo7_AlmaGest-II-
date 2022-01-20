<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    public $successStatus = 200;

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'secondname' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'password' =>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['firstname'] = $user->firstname;
        $success['secondname'] = $user->secondname;
        $success['company_id'] = $user->company_id;
        $success['email'] = $user->email;
        $success['password'] = $user->password;

        return response()->json(['success' => $success], $this->successStatus);

    }

    public function login(Request $request) {

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();

            $success['token'] = $user->createToken('authToken')->accessToken;

            return response()->json(['success' => $success], $this->successStatus);
        }
        else {
            return response()->json(['error' => 'No estás autorizado'], 401);
        }
    }

}