<aside class="w-64 bg-slate-900 text-white flex flex-col flex-shrink-0 transition-all duration-300" id="sidebar">
    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <span class="text-lg font-semibold">Demo</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <div class="px-3 mb-2">
            <span class="text-xs font-medium text-slate-500 uppercase tracking-wider px-3">Main</span>
        </div>
        
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-6 py-2.5 mx-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-indigo-500/20 text-indigo-400' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span class="text-sm font-medium">Dashboard</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 mx-3 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <span class="text-sm font-medium">Analytics</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 mx-3 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span class="text-sm font-medium">Customers</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 mx-3 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <span class="text-sm font-medium">Products</span>
        </a>

        <div class="px-3 mt-6 mb-2">
            <span class="text-xs font-medium text-slate-500 uppercase tracking-wider px-3">Settings</span>
        </div>
        
        <!-- Languages Menu with Submenu -->
        <div class="relative">
            <button onclick="toggleSubmenu('languages-submenu')" class="w-full flex items-center justify-between gap-3 px-6 py-2.5 mx-3 rounded-lg {{ request()->routeIs('languages.*') ? 'bg-indigo-500/20 text-indigo-400' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                    <span class="text-sm font-medium">Languages</span>
                </div>
                <svg id="languages-submenu-arrow" class="w-4 h-4 transition-transform {{ request()->routeIs('languages.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div id="languages-submenu" class="pl-9 mt-1 space-y-1 {{ request()->routeIs('languages.*') ? '' : 'hidden' }}">
                <a href="{{ route('languages.index') }}" class="flex items-center gap-3 px-6 py-2 mx-3 rounded-lg text-sm {{ request()->routeIs('languages.index') ? 'text-indigo-400' : 'text-slate-400 hover:text-white' }} transition-colors">
                    All Languages
                </a>
                <a href="{{ route('languages.create') }}" class="flex items-center gap-3 px-6 py-2 mx-3 rounded-lg text-sm {{ request()->routeIs('languages.create') ? 'text-indigo-400' : 'text-slate-400 hover:text-white' }} transition-colors">
                    Add Language
                </a>
            </div>
        </div>
        
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 mx-3 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.814 3.995 2a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.814 3.31-2 3.995a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.814-3.995-2a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.814-3.31 2-3.995a1.724 1.724 0 002.573-1.066z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="text-sm font-medium">Settings</span>
        </a>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-medium">
                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ $user->name ?? 'User' }}</p>
                <p class="text-xs text-slate-400 truncate">{{ $user->email ?? 'user@example.com' }}</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 text-slate-400 hover:text-white transition-colors" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<script>
    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);
        const arrow = document.getElementById(id + '-arrow');
        submenu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>