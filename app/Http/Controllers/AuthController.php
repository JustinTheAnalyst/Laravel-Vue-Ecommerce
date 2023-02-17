<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $crdentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'password'],
            'remember' => 'boolean'
        ]);

        $remember = $crdentials['remember'] ?? false;
        unset($crdentials['remember']);
        if (!$Auth::attempt($crdentials, $remember)) {
            return response([
                'message' => 'Email or password is incorrect',
            ], 422);

        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        if(!$user->is_admin){
            Auth::logout();

            return response([
                'message' => 'You don\'t have permission to authenticate as admin'
            ], 403);
        }

        $token = $user->createToken('main')->plainTestToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout() {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('', 204);
    }
}