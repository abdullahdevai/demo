@extends('layouts.dashboard')
@section('title', 'Add Language')
@section('page-title', 'Add Language')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div>
                    <x-input label="Title" name="title" placeholder="Enter language title" :value="old('title')" required />
                </div>
                <div>
                    <x-input label="Name" name="name" placeholder="e.g., en, bn, fr" :value="old('name')" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Flag Image</label>
                    <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="px-6 py-2 bg-indigo-500 text-white text-sm font-medium rounded-lg hover:bg-indigo-600 transition-colors">
                        Save Language
                    </button>
                    <a href="{{ route('languages.index') }}" class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection