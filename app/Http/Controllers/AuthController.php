<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('My Laravel Project Token')->accessToken;
        $success['message'] = 'User Registration Successfully!';

        return response()->json(['data' => $success], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userData = User::where('email', $request->input('email'))->first();
        if ($userData) {
            if (Hash::check($request->password, $userData->password)) {
                $success['token'] = $userData->createToken('My Laravel Project Token')->accessToken;
                $success['massage'] = 'Login Successfully!';

                return response()->json(['data' => $success], 200);
            }
        } else {
            return response()->json(['message' => 'User does not exist'], 422);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();

        return response()->json(['message' => 'You have been successfully logged out!'], 200);
    }
}
