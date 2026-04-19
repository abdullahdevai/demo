@extends('layouts.master')

@section('content')
    <div class="col-span-3">
        <h1 class="mt-5 text-xl font-semibold flex justify-center items-center">Verify Your Email</h1>
    </div>

    <div class="mb-4">
        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking the link we just emailed to you?</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
@endsection
