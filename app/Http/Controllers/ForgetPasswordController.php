<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForgetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



class ForgetPasswordController extends Controller
{
    //
     public function send_reset_password_email(Request $request){

        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $token = Str::random(60);

        ForgetPassword::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('reset',['token' => $token], function(Message $message) use($request){
            $message->subject('reset your password');
            $message->to($request->email);
        });

        return response()->json(['message' => 'Password reset link sent on your email'], 200);
    }

    public function reset(Request $request){

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $passwordreset = ForgetPassword::where('token', $request->token)->first();

        if(!$passwordreset){
            return response()->json(['message' => 'token expired'], 404);
        }

        $user = User::where('email', $passwordreset->email)->first();
        $user->password  = Hash::make($request->password);
        $user->save();

        ForgetPassword::where('email',$user->email)->delete();
        return response()->json(['message' => 'Password changed successfully'], 200);
        
    }
}
