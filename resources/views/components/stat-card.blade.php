@props(['title', 'value', 'change' => null, 'changePositive' => false, 'iconBgClass' => 'bg-indigo-100', 'icon' => null])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-500">{{ $title }}</p>
            <p class="text-2xl font-semibold text-gray-900 mt-2">{{ $value }}</p>
            @if($change)
                <div class="flex items-center gap-1 mt-2">
                    @if($changePositive)
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        <span class="text-sm font-medium text-emerald-600">{{ $change }}</span>
                    @else
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                        <span class="text-sm font-medium text-red-600">{{ $change }}</span>
                    @endif
                    <span class="text-sm text-gray-500">vs last month</span>
                </div>
            @endif
        </div>
        <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $iconBgClass }}">
            {{ $icon }}
        </div>
    </div>
</div>