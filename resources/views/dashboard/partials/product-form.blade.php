<div class="bg-gray-800 border border-gray-700/60 rounded-xl p-6 shadow-sm">
    
    <!-- Başlık -->
    <div class="mb-5">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <i class="ti ti-box-plus text-indigo-400 text-xl"></i>
            Yeni Ürün Ekle
        </h3>
        <p class="text-xs text-gray-400 mt-1">Stok takibine yeni bir ürün kaydı ekleyin.</p>
    </div>

    <!-- Form -->
    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Ürün Adı -->
            <div>
                <label for="name" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Ürün Adı <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <i class="ti ti-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required 
                           value="{{ old('name') }}"
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- SKU / Stok Kodu -->
            <div>
                <label for="sku" class="block text-xs font-medium text-gray-300 mb-1.5">
                    SKU / Stok Kodu <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <i class="ti ti-barcode absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                           id="sku" 
                           name="sku" 
                           required 
                           value="{{ old('sku') }}"
                           placeholder="Örn: PRD-001" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition font-mono">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Kategori <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <i class="ti ti-category absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                    <select id="category_id" 
                            name="category_id" 
                            required 
                            class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition appearance-none">
                        <option value="" disabled selected>Kategori Seçin</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Fiyat -->
            <div>
                <label for="price" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Satış Fiyatı (₺) <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <i class="ti ti-currency-lira absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="number" 
                           step="0.01" 
                           id="price" 
                           name="price" 
                           required 
                           value="{{ old('price') }}"
                           placeholder="0.00" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- Başlangıç Stoğu -->
            <div>
                <label for="stock" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Başlangıç Stoğu <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <i class="ti ti-stack-2 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="number" 
                           id="stock" 
                           name="stock" 
                           required 
                           value="{{ old('stock', 0) }}"
                           placeholder="0" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
            <!-- Kritik Stok Limiti -->
            <div>
                <label for="critical_limit" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Kritik Stok Uyarısı Limiti
                </label>
                <div class="relative">
                    <i class="ti ti-alert-triangle absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="number" 
                           id="critical_limit" 
                           name="critical_limit" 
                           value="{{ old('critical_limit', 5) }}"
                           placeholder="5" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-3 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
                <p class="text-[10px] text-gray-500 mt-1">Stok bu adedin altına düştüğünde sistem uyarı verir.</p>
            </div>

            <!-- Kaydet Butonu -->
            <div class="flex items-end">
                <button type="submit" 
                        class="w-full flex justify-center items-center gap-2 py-2 px-4 rounded-lg text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 shadow-lg shadow-indigo-600/20 transition cursor-pointer">
                    <i class="ti ti-plus text-base"></i>
                    Ürünü Kaydet
                </button>
            </div>
        </div>

    </form>

</div>