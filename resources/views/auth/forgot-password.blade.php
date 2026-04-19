@extends('layouts.auth')

@section('title', 'Forgot Password')
@section('heading', 'Forgot password')
@section('subheading', 'Enter your email to receive a reset link')

@section('form')
    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <x-input
            label="Email Address"
            name="email"
            type="email"
            placeholder="name@example.com"
            required
            autocomplete="email"
        />

        <button
            type="submit"
            class="w-full mt-6 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out flex items-center justify-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Send Reset Link
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
