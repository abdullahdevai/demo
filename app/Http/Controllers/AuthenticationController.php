<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Http\Requests\Auth\StoreRegisterRequest;

class AuthenticationController extends Controller
{
    /**
     * Display the register page
     */
    public function showRegister()
    {
        return view('auth.register');
    }
    /**
     * Register a new user
     */
    public function register(StoreRegisterRequest $request)
    {
        $user = UserRepository::registerByRequest($request);

        Auth::login($user);

        return to_route('dashboard')->with('success', 'Registered Successfully');
    }
    /**
     * Display login view page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Login a authenticated user
     */
    public function login(StoreLoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard')->with('success', 'Logged in Successfully');
        }

        return redirect()->intended('login')->with('error', 'Invalid Credentials');
    }
}
