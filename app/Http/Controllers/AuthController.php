<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{
    //
     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'wardno' => 'required|string|max:255',
            'citizenshipno' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'bloodgroup' => 'required|string|max:255',
            'dateofbirth' => 'required|date|max:255',
            'nature' => 'required|string|max:255',
            'severity' => 'required|string|max:255',
            'guardianname' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'ward' => $request->wardno,
            'citizenship' => $request->citizenshipno,
            'sex' => $request->sex,
            'blood_group' => $request->bloodgroup,
            'dob' => $request->dateofbirth,
            'nature' => $request->nature,
            'severity' => $request->severity,
            'name_of_guardian' => $request->guardianname,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token],200);
        ///return response()->json(['access_token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }

    public function user(Request $request){
        return new UserResource($request->user());
    }
}
