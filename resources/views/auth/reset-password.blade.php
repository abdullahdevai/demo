@extends('layouts.auth')

@section('title', 'Reset Password')
@section('heading', 'Reset password')
@section('subheading', 'Enter your new password below')

@section('form')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <x-input
            label="Email Address"
            name="email"
            type="email"
            value="{{ request('email') }}"
            readonly
            required
            autocomplete="email"
        />

        <x-password-input
            label="New Password"
            name="password"
            placeholder="Enter new password"
            required
            autocomplete="new-password"
        />

        <x-password-input
            label="Confirm Password"
            name="password_confirmation"
            placeholder="Confirm new password"
            required
            autocomplete="new-password"
        />

        <button
            type="submit"
            class="w-full mt-6 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out flex items-center justify-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Reset Password
        </button>
    </form>
    <div class="flex justify-center items-center mt-2">
        <p class="text-sm text-gray-600">
        Remember your password?
        <a href="{{ route('showLogin') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">
            Sign in
        </a>
    </p>
    </div>

@endsection
