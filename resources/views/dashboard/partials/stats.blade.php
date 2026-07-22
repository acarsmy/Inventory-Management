<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <!-- Toplam Ürün -->
    <div class="bg-gray-800 border border-gray-700/60 rounded-xl p-5 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Toplam Ürün</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{ $totalProductsCount ?? 0 }}</h3>
        </div>
        <div class="w-12 h-12 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400">
            <i class="ti ti-box text-2xl"></i>
        </div>
    </div>

    <!-- Toplam Stok -->
    <div class="bg-gray-800 border border-gray-700/60 rounded-xl p-5 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Toplam Stok</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{ number_format($totalStockQuantity ?? 0) }}</h3>
        </div>
        <div class="w-12 h-12 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
            <i class="ti ti-stack-2 text-2xl"></i>
        </div>
    </div>

    <!-- Kritik Stok -->
    <div class="bg-gray-800 border border-gray-700/60 rounded-xl p-5 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Kritik Stok</p>
            <h3 class="text-2xl font-bold text-amber-400 mt-1">{{ $criticalCount ?? 0 }}</h3>
        </div>
        <div class="w-12 h-12 rounded-lg bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400">
            <i class="ti ti-alert-triangle text-2xl"></i>
        </div>
    </div>

    <!-- Depo Doluluğu -->
    <div class="bg-gray-800 border border-gray-700/60 rounded-xl p-5 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Depo Doluluğu</p>
            <h3 class="text-2xl font-bold text-white mt-1">%{{ $occupancyRate ?? 0 }}</h3>
        </div>
        <div class="w-12 h-12 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400">
            <i class="ti ti-chart-pie text-2xl"></i>
        </div>
    </div>

</div>