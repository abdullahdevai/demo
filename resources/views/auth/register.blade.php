@extends('layouts.auth')

@section('title', 'Register')
@section('heading', 'Create an account')
@section('subheading', 'Join us and start your journey today')

@section('form')
    <form action="{{ route('register') }}" method="POST">
        @csrf

        {{-- Name --}}
        <x-input
            label="Full Name"
            name="name"
            type="text"
            placeholder="John Doe"
            required
            autocomplete="name"
        />

        {{-- Email --}}
        <x-input
            label="Email Address"
            name="email"
            type="email"
            placeholder="name@example.com"
            required
            autocomplete="email"
        />

        {{-- Password --}}
        <x-password-input
            label="Password"
            name="password"
            type="password"
            placeholder="Create a strong password"
            required
            autocomplete="new-password"
        />

        {{-- Confirm Password --}}
        <x-password-input
            label="Confirm Password"
            name="password_confirmation"
            type="password"
            placeholder="Confirm your password"
            required
            autocomplete="new-password"
        />

        {{-- Terms --}}
        <div class="mt-5">
            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="terms" required class="mt-1 w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition">
                <span class="text-sm text-gray-600">
                    I agree to the
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Terms of Service</a>
                    and
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Privacy Policy</a>
                </span>
            </label>
        </div>

        {{-- Submit Button --}}
        <button
            type="submit"
            class="w-full mt-6 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            Create account
        </button>

        {{-- Divider --}}
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-400">Or sign up with</span>
            </div>
        </div>

        {{-- Social Signup --}}
        <div class="grid grid-cols-2 gap-3">
            <a href="#" class="flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-sm font-medium text-gray-700">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Google
            </a>
            <a href="#" class="flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-sm font-medium text-gray-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                GitHub
            </a>
        </div>
    </form>
    <div class="flex justify-center items-center mt-2">
        <p class="text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('showLogin') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">
            Sign in
        </a>
    </p>

    </div>
@endsection

@section('footer')
    @endsection
