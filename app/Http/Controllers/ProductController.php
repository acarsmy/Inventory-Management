<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Ana Sayfa / Ürün Yönetim Paneli Görünümü
     */
    public function index(Request $request)
    {
        // 1. Ürün Arama & Listeleme Sorgusu
        $productsQuery = Product::with('category')->latest();

        if ($request->has('search') && filled($request->search)) {
            $searchTerm = $request->search;
            $productsQuery->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('sku', 'like', '%' . $searchTerm . '%');
            });
        }

        $products = $productsQuery->get();

        // 2. Üst İstatistik Kartları
        $totalProductsCount = Product::count();
        $totalStockQuantity = Product::sum('stock');
        $criticalCount = Product::whereColumn('stock', '<=', 'critical_limit')->count();

        $maxCapacity = 10000;
        $occupancyRate = $maxCapacity > 0 ? min(100, round(($totalStockQuantity / $maxCapacity) * 100)) : 0;

        // 3. Sağ Panel Verileri
        $categories = Category::withCount('products')->get();
        $recentMovements = StockMovement::with('product')
            ->latest()
            ->take(5)
            ->get();

        // Doğrudan dashboard klasöründeki index view'ını dönüyoruz
        return view('dashboard.index', compact(
            'products',
            'totalProductsCount',
            'totalStockQuantity',
            'criticalCount',
            'occupancyRate',
            'categories',
            'recentMovements'
        ));
    }

    /**
     * Yeni Ürün Kaydetme
     */
    public function store(Request $request) 
    { 
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'sku'            => 'required|string|unique:products,sku',
            'category_id'    => 'required|exists:categories,id',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
            'critical_limit' => 'required|integer|min:0',
        ], [
            'sku.unique'           => 'Bu SKU / Stok Kodu zaten kullanılıyor.',
            'category_id.required' => 'Lütfen bir kategori seçin.',
        ]);

        $product = Product::create($validated);

        if ($product->stock > 0 && class_exists(StockMovement::class)) {
            StockMovement::create([
                'product_id' => $product->id,
                'type'       => 'in',
                'quantity'   => $product->stock,
                'note'       => 'İlk stok girişi (Yeni ürün oluşturuldu)',
            ]);
        }

        return redirect()->back()->with('success', 'Ürün başarıyla eklendi!');
    }

    /**
     * Ürün Silme
     */
    public function destroy($id) 
    { 
        $product = Product::findOrFail($id);
        
        if (method_exists($product, 'movements')) {
            $product->movements()->delete();
        }

        $product->delete();

        return redirect()->back()->with('success', 'Ürün başarıyla silindi!');
    }
}