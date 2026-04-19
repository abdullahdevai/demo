<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Http\Requests\Auth\StoreResetPasswordRequest;
use App\Http\Requests\Auth\StoreForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

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
            return to_route('dashboard')->with('success', 'Logged in Successfully');

        }

        return redirect()->intended('login')->with('error', 'Invalid Credentials');
    }
    /**
     * Display the view page for forget-password
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }
    /**
     * Send reset link in email for password-reset
     */
    public function sendResetLink(StoreForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Reset link sent to your email');
        }

        return back()->with('error', 'Unable to send reset link');
    }
    /**
     * Display the reset-password page
     */
    public function showResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    /**
     * Reset password logic
     */
    public function resetPassword(StoreResetPasswordRequest $request)
    {
        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password reset successfully');
        }

        return back()->with('error', 'Unable to reset password');
    }
    /**
     * Logout user
     */
    public function logout() {
        Auth::logout();

        return redirect()->route('login')->with('success','Logged out successfully');
    }
}
