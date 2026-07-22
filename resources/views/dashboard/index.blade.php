@extends('layouts.app')

@section('title', 'Dashboard - Stok Takip')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    <!-- 1. İstatistik Kartları -->
    @include('dashboard.partials.stats')

    <!-- 2. Izgara Düzeni -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Sol Kolon (Tablo + Form) -->
        <div class="lg:col-span-2 space-y-6">
            @include('dashboard.partials.product-list')
            @include('dashboard.partials.product-form')
        </div>

        <!-- Sağ Kolon (Kategoriler + Akış) -->
        <div class="space-y-6">
            @include('dashboard.partials.categories')
            @include('dashboard.partials.movements')
        </div>

    </div>

</div>
@endsection