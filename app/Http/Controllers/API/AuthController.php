<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'The email field is mandatory.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password field is mandatory.',
            'password.min' => 'The password must be at least 6 characters long.',
        ]);
        if (Auth::attempt($request->only("email", "password"))) {
            $user = Auth::user();
            $data['token'] = $user->createToken('MyApp')->accessToken;
            $data['name'] = $user->name;
            return $this->sendResponse($data, 'User Login Successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
