<nav class="bg-gray-800 border-b border-gray-700/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Sol: Logo ve Linkler -->
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl text-indigo-400">
                    <i class="ti ti-box text-2xl"></i>
                    <span>StokTakip</span>
                </a>

                <a href="{{ route('home') }}" 
                   class="inline-flex items-center gap-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-white border-b-2 border-indigo-500 py-5' : 'text-gray-400 hover:text-gray-200' }}">
                    <i class="ti ti-layout-grid"></i> Stok Yönetimi
                </a>
            </div>

            <!-- Sağ: Kullanıcı Bilgisi ve Fortify Logout -->
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-300 flex items-center gap-1.5">
                    <i class="ti ti-user text-gray-400"></i>
                    {{ auth()->user()->name ?? 'Kullanıcı' }}
                </span>

                <!-- Fortify Logout Route -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 border border-red-500/20 transition cursor-pointer">
                        <i class="ti ti-logout"></i> Çıkış
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>