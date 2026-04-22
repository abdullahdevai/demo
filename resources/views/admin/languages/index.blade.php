@extends('layouts.dashboard')
@section('title', 'Languages')
@section('page-title', 'Languages')
@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">Languages</h2>
            <a href="{{ route('languages.create') }}" class="px-4 py-2 bg-indigo-500 text-white text-sm font-medium rounded-lg hover:bg-indigo-600 transition-colors">
                Add Language
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Flag</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($languages as $language)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($language->flagImage && $language->flagImage->src)
                            <img src="{{ asset('storage/' . $language->flagImage->src) }}" alt="{{ $language->title }}" class="w-8 h-6 object-cover rounded">
                        @else
                            <span class="text-gray-400 text-sm">No flag</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $language->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $language->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="{{ route('languages.edit', $language->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('languages.destroy', $language->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No languages found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
