<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use App\Traits\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class userController extends Controller
{
    use EmailService;
    //
    function list(Request $request, $id = null) {

        return $id ? User::find($id) : User::all();
    }
    
    public function editUser(Request $request, $id)
    {
        $user_item = User::find($id);
        if ($user_item) {
            $user_item->role = "admin";

             $user_item->save();
        }
           return response(["update success"],200);
    }
    public function updateProfile(Request $request)
    {
        $user= $request->user();
        $user->user_name = $request->username;
        $user->email = $request->email;
        
           

        $user->save();
        return response(["update success"],200);
        

    }

    public function signIn(Request $request)
    {
        $rules = ["email" => ["required"], "password" => ["required"]];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response($errors, 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            $errors = ["email or passwords un matched"];
            return response($errors, 404);
        }
        $token = $user->createToken('app-token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];

        return response($response, 201);

    }

    public function signUp(Request $request)
    {$rules = [
        "username" => ["required", "unique:users,user_name"],
        "email" => ["required", "email:rfc", "unique:users,email"],
        "password" => ["required", "min:8", "max:16","confirmed"],

    ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response($errors, 400);
        }

        $user = new user();
        $user->user_name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response(["success"], 200);
    }

    public function verifyEmail(Request $request, $token)
    {

        //get token for user
        //check token
        //update toke model that it used
        //return response
        $user = $request->user();
        $token_data = Token::where("user_id", $user->id)->first();
        if (!$token || ($token_data->token != $token)) {
            return response(["activation code is not valid"], 204);
        }
        $user->email_verified=true;
        $user->save();
        $token_data->confirmed = true;
        $token_data->save();
        return response(["acount is activated"], 200);

    }
    public function resendActivationCode(Request $request)
    {  
        $user=$request->user();
        $token_op=$this->createToken($user);
        
        $this->sendActivationCode($user->email,"Activation code",$token_op->token);
        return response(["activation code is created"], 200);

    }
    public function auth(Request $request)
    {  
        $user=$request->user();
         return$user;

    }





    private function createToken($user)
    {   
        
        $token_OP = Token::where("user_id", $user->id)->where("confirmed", false)->first();
        
        if ($token_OP) {
            return $token_OP;
        }
        $token_op = new Token();
        $token_op->token = (string) Str::uuid();
        $token_op->user_id = $user->id;
        $token_op->save();
        return $token_op;
    }

}
