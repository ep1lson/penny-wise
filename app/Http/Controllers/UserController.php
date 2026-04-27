<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    // Authenticate
    public function authenticate(Request $req) {
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $validated['email'])->firstOrFail();
        if (!Hash::check($validated['password'], $user['password'])) {
            return response()->json([
                'type' => 'failure',
                'message' => 'Passwords do not match'
            ], 401);
        }

        $req->session()->put('user-id', $user->id);

        return response()->json([
            'type' => 'success'
        ]);
    }

    // Signup
    public function signup(Request $req) {
        $validated = $req->validate([
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6",
            "name" => "required|string|max:255"
        ]);

        $user = User::create($validated);

        return response()->json([
            "type" => "success",
            "message" => $user
        ]);
    }

    public function fetchHome(Request $req) {
        if (session()->has('user-id')) {
            $alias = User::find(session('user-id'))->alias;
            return view('home', [
                'alias' => $alias
            ]);
        }

        return redirect('/');
    }
}
