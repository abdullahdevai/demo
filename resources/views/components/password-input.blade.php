@props([
    'label' => null,
    'name',
    'placeholder' => '',
    'value' => null,
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
        <input
            type="password"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @disabled($disabled)
            @readonly($readonly)
            @if($required) required @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            class="w-full px-4 py-2 pr-10 text-sm rounded-lg border transition duration-200
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
            {{ $error ? 'border-red-500' : 'border-gray-300' }}
            {{ $disabled ? 'bg-gray-100 cursor-not-allowed' : 'bg-white' }}"
        >

        <button
            type="button"
            onclick="togglePassword('{{ $name }}')"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 cursor-pointer"
        >
            <svg id="{{ $name }}-eye" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            <svg id="{{ $name }}-eye-off" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
            </svg>
        </button>
    </div>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>

<script>
function togglePassword(name) {
    const input = document.getElementById(name);
    const eye = document.getElementById(name + '-eye');
    const eyeOff = document.getElementById(name + '-eye-off');

    if (input.type === 'password') {
        input.type = 'text';
        eye.classList.add('hidden');
        eyeOff.classList.remove('hidden');
    } else {
        input.type = 'password';
        eye.classList.remove('hidden');
        eyeOff.classList.add('hidden');
    }
}
</script>