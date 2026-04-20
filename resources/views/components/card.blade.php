@props(['title' => null, 'description' => null, 'footer' => null, 'padding' => null])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 {{ $attributes->get('class') }}">
    @if($title || $slot->isNotEmpty())
        <div class="px-6 py-4 border-b border-gray-100">
            @if($title)
                <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            @endif
            @if($description)
                <p class="text-sm text-gray-500 mt-1">{{ $description }}</p>
            @endif
        </div>
    @endif
    <div class="p-6 {{ $padding ?? 'p-6' }}">
        {{ $slot }}
    </div>
    @if($footer)
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-xl">
            {{ $footer }}
        </div>
    @endif
</div>