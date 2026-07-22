@extends('layouts.app')

@section('title', 'Kayıt Ol - Stok Takip')

@section('content')
<div class="min-h-[calc(100vh-12rem)] flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
    
    <!-- Kayıt Kartı -->
    <div class="w-full max-w-md space-y-6 bg-gray-800 border border-gray-700/60 rounded-2xl p-8 shadow-xl">
        
        <!-- Logo ve Başlık -->
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 mb-4">
                <i class="ti ti-user-plus text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Hesap Oluşturun</h2>
            <p class="text-xs text-gray-400 mt-1">Stok yönetim sistemini kullanmak için kayıt olun</p>
        </div>

        <!-- Fortify Hata Mesajları -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-3 rounded-lg text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-1.5">
                        <i class="ti ti-alert-circle"></i>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif

        <!-- Fortify Register Formu -->
        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Ad Soyad Alanı -->
            <div>
                <label for="name" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Ad Soyad
                </label>
                <div class="relative">
                    <i class="ti ti-user absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base"></i>
                    <input id="name" 
                           name="name" 
                           type="text" 
                           required 
                           value="{{ old('name') }}"
                           placeholder="Ahmet Yılmaz" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-10 pr-4 py-2.5 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- E-Posta Alanı -->
            <div>
                <label for="email" class="block text-xs font-medium text-gray-300 mb-1.5">
                    E-Posta Adresi
                </label>
                <div class="relative">
                    <i class="ti ti-mail absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base"></i>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           required 
                           value="{{ old('email') }}"
                           placeholder="ornek@sirket.com" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-10 pr-4 py-2.5 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- Parola Alanı -->
            <div>
                <label for="password" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Parola
                </label>
                <div class="relative">
                    <i class="ti ti-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base"></i>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required 
                           placeholder="••••••••" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-10 pr-4 py-2.5 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- Parola Tekrar Alanı -->
            <div>
                <label for="password_confirmation" class="block text-xs font-medium text-gray-300 mb-1.5">
                    Parola Tekrarı
                </label>
                <div class="relative">
                    <i class="ti ti-lock-check absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base"></i>
                    <input id="password_confirmation" 
                           name="password_confirmation" 
                           type="password" 
                           required 
                           placeholder="••••••••" 
                           class="w-full bg-gray-900/80 border border-gray-700/80 rounded-lg pl-10 pr-4 py-2.5 text-xs text-gray-200 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <!-- Kayıt Butonu -->
            <div class="pt-2">
                <button type="submit" 
                        class="w-full flex justify-center items-center gap-2 py-2.5 px-4 rounded-lg text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 shadow-lg shadow-indigo-600/20 transition duration-150">
                    <i class="ti ti-user-check text-base"></i>
                    Kayıt Ol
                </button>
            </div>
        </form>

        <!-- Giriş Yap Linki -->
        <div class="text-center pt-2 border-t border-gray-700/50">
            <p class="text-xs text-gray-400">
                Zaten hesabınız var mı? 
                <a href="{{ route('login') }}" class="font-semibold text-indigo-400 hover:text-indigo-300 transition">
                    Giriş Yapın
                </a>
            </p>
        </div>

    </div>
</div>
@endsection