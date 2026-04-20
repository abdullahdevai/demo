@props(['color' => 'indigo'])

@php
$colorClasses = match($color) {
    'indigo' => 'bg-indigo-100 text-indigo-700',
    'emerald' => 'bg-emerald-100 text-emerald-700',
    'amber' => 'bg-amber-100 text-amber-700',
    'red' => 'bg-red-100 text-red-700',
    'gray' => 'bg-gray-100 text-gray-700',
    default => 'bg-indigo-100 text-indigo-700',
};
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClasses }}">
    {{ $slot }}
</span>