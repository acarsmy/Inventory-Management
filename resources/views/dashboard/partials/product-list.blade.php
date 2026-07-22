<div class="bg-gray-800 border border-gray-700/60 rounded-xl p-6 shadow-sm">
    
    <!-- Başlık ve Arama Barı -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <i class="ti ti-list-details text-indigo-400 text-xl"></i>
                Ürün Listesi
            </h3>
            <p class="text-xs text-gray-400 mt-1">Mevcut stok durumunu takip edin ve yönetin.</p>
        </div>

        <!-- Arama Formu (GET ile Ana Sayfaya / İstek Atar) -->
        <form method="GET" action="{{ route('home') }}" class="flex items-center gap-2">
            <div class="relative">
                <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Ürün adı veya SKU..." 
                       class="w-full sm:w-64 bg-gray-900/80 border border-gray-700/80 rounded-lg pl-9 pr-4 py-2 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
            </div>
            @if(request('search'))
                <a href="{{ route('home') }}" class="p-2 text-gray-400 hover:text-white bg-gray-700/50 rounded-lg transition" title="Aramayı Temizle">
                    <i class="ti ti-x"></i>
                </a>
            @endif
        </form>
    </div>

    <!-- Ürünler Tablosu -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-gray-300">
            <thead class="bg-gray-900/50 text-gray-400 uppercase text-[10px] tracking-wider border-b border-gray-700/60">
                <tr>
                    <th class="py-3 px-4">SKU / Stok Kodu</th>
                    <th class="py-3 px-4">Ürün Adı</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4 text-right">Fiyat</th>
                    <th class="py-3 px-4 text-center">Stok Adedi</th>
                    <th class="py-3 px-4 text-center">Durum</th>
                    <th class="py-3 px-4 text-right">İşlem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700/40">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-700/20 transition">
                        <td class="py-3 px-4 font-mono text-indigo-400 font-semibold">{{ $product->sku }}</td>
                        <td class="py-3 px-4 font-medium text-white">{{ $product->name }}</td>
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-700 text-gray-300 border border-gray-600/50">
                                {{ $product->category->name ?? 'Kategorisiz' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right font-semibold text-gray-200">
                            ₺{{ number_format($product->price, 2, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center font-bold text-white">{{ $product->stock }}</td>
                        <td class="py-3 px-4 text-center">
                            @if($product->stock <= 0)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-500/10 text-red-400 border border-red-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Stok Yok
                                </span>
                            @elseif($product->stock <= $product->critical_limit)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Kritik
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Normal
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-400 transition p-1" title="Sil">
                                    <i class="ti ti-trash text-base"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-500">
                            <i class="ti ti-box-off text-3xl mb-2 block"></i>
                            Kayıtlı ürün bulunamadı.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>