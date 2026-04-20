<?php

namespace App\Http\Controllers;

use App\Events\RegisterUser;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Jobs\sendPasswordResetEmail;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Http\Requests\Auth\StoreResetPasswordRequest;
use App\Http\Requests\Auth\StoreForgotPasswordRequest;

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

        event(new Registered($user));
        event(new RegisterUser($user));

        return to_route('verification.notice');
    }
    /**
     * Show Email Verification page
     */
    public function verifyPage()
    {
        return view('auth.email-verification');
    }
    /**
     * Send Email for Email Verification
     */
    public function verifyLinkSend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification Link sent');
    }
    /**
     * Logic for verify a email
     */
    public function verifyEmail($user)
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return to_route('login')->with('success', 'Your Email is verified successfully');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return to_route('dashboard')->with('success', 'Email already verified');
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
        $email = $request->only('email');

        sendPasswordResetEmail::dispatch($email['email']);

        return back()->with('success', 'Reset link request received. You will receive an email shortly.');
    }
    /**+
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
        $status = Password::reset($request
            ->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($status === Password::PasswordReset) {
            return redirect()->route('login')->with('success', 'Password reset successfully');
        }

        return back()->with('error', 'Unable to reset password');
    }
    /**
     * Logout user
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
