<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Validator;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email'=> 'required',
            'password'=> 'required|min:4'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(), 404);
        }

        $email =$request->input('email');
        $user = User::where('email',$email)->first();
        if(!is_null($user)){
            return response()->json(["message" => "User already exists"], 404);
        }
        
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Bad user data'], 400);
        }

        return $this->respondWithToken($token);
    }

    public function getAuthUser(Request $request){
        return response()->json(auth()->user());
    }

    public function logout(){
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
