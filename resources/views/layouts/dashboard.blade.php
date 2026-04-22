<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    <button id="toggle-sidebar" class="p-2 text-gray-500 hover:text-gray-700 lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Language Switcher -->
                    @php
                        $languages = \App\Repositories\LanguageRepository::query()->with('flagImage')->get();
                        $currentLocale = app()->getLocale();
                        $currentLang = $languages->firstWhere('name', $currentLocale);
                    @endphp
                    <div class="relative" id="language-dropdown">
                        <button onclick="toggleDropdown('language-menu')" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                            @if($currentLang && $currentLang->flagImage && $currentLang->flagImage->src)
                                <img src="{{ asset('storage/' . $currentLang->flagImage->src) }}" alt="{{ $currentLang->title }}" class="w-5 h-4 object-cover rounded">
                            @endif
                            <span>{{ $currentLang->title ?? strtoupper($currentLocale) }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="language-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                            @forelse($languages as $lang)
                                <a href="{{ url('lang/' . $lang->name) }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 first:rounded-t-lg last:rounded-b-lg">
                                    @if($lang->flag && $lang->flag->src)
                                        <img src="{{ asset('storage/' . $lang->flag->src) }}" alt="{{ $lang->title }}" class="w-5 h-4 object-cover rounded">
                                    @endif
                                    {{ $lang->title }}
                                </a>
                            @empty
                                <span class="block px-4 py-2 text-sm text-gray-500">No languages</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.82L4 17h1m5 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const menu = document.getElementById(id);
            menu.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('language-dropdown');
            const menu = document.getElementById('language-menu');
            if (!dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
