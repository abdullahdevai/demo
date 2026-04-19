@props([
    'label' => null,
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'icon' => null,
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'autocomplete' => null,
])

@php
    $error = $errors->first($name);
@endphp

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block mb-1 text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if($icon)
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 w-5 h-5">
                {!! $icon !!}
            </span>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @disabled($disabled)
            @readonly($readonly)
            @if($required) required @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            class="w-full px-4 py-2 text-sm rounded-lg border transition duration-200
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
            {{ $icon ? 'pl-10' : '' }}
            {{ $error ? 'border-red-500' : 'border-gray-300' }}
            {{ $disabled ? 'bg-gray-100 cursor-not-allowed' : 'bg-white' }}"
        >
    </div>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>