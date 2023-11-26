<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class fileuploadcontroller extends Controller
{
    public function register(Request $req){
        $modellings = new User ();
        $validity = array('name'=> 'required|max|255',
                          'email' => 'required|regex:',
                        'password'=> 'required');
        $validator = validator::make($req->all(),$validity);
        if ($validator->fails()){
        //hashing the passsword before saving it
            $mm = $req-> password;
            $mn = bcrypt($mm);
            $as = $modellings->all();
            $as-> save();
        }
        if($as){
            return ['result'=>'registeration succesfull'];
        } else{
            return['result'=> ' pls recheck data' . 'error has happened'];
        }
    }
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Please provide valid email and password',
            ], 401);
        }

        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if (!$user) {
            return response()->json([
                'status' => 'false',
                'message' => 'Invalid email or password',
            ], 401);
        }

        // Check if the provided password matches the stored hashed password
        if (password_verify($request->password, $user->password)) {
            // If the password is correct, generate a token and return it
            $token = $user->createToken($request->email)->plainTextToken;

            return response()->json([
                'status' => 'true',
                'message' => 'Login successful',
                'token' => $token,
            ], 200);
        }else{
        // If the password is incorrect, return an error response
        return response()->json([
            'status' => 'false',
            'message' => 'Invalid email or password',
        ], 401);
        }
    }
    public function store(Request $req){
        $result = $req->file('images')->store('public');
        $rr = User::create(['name'=>$result,
        'email'=> 'shhh@gmail.com']);
        return['result'=>$result];
    }

}
