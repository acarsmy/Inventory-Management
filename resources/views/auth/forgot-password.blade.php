@extends('layouts.app')

@section('title', 'Şifremi Unuttum - Stok Takip')

@section('content')
<div class="min-h-[calc(100vh-12rem)] flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
    
    <!-- Şifre Sıfırlama Kartı -->
    <div class="w-full max-w-md space-y-6 bg-gray-800 border border-gray-700/60 rounded-2xl p-8 shadow-xl">
        
        <!-- Logo ve Başlık -->
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 mb-4">
                <i class="ti ti-key text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Şifrenizi mi Unuttunuz?</h2>
            <p class="text-xs text-gray-400 mt-1">
                Sorun değil. E-posta adresinizi girin, size yeni bir şifre oluşturmanız için sıfırlama bağlantısı gönderelim.
            </p>
        </div>

        <!-- Fortify Başarılı Gönderim Bildirimi (Status) -->
        @if (session('status'))
            <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 p-3 rounded-lg text-xs flex items-center gap-2">
                <i class="ti ti-circle-check text-base shrink-0"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

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

        <!-- Fortify Forgot Password Formu -->
        <form class="space-y-5" action="{{ route('password.email') }}" method="POST">
            @csrf

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

            <!-- Gönder Butonu -->
            <div>
                <button type="submit" 
                        class="w-full flex justify-center items-center gap-2 py-2.5 px-4 rounded-lg text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 shadow-lg shadow-indigo-600/20 transition duration-150">
                    <i class="ti ti-send text-base"></i>
                    Sıfırlama Bağlantısı Gönder
                </button>
            </div>
        </form>

        <!-- Giriş Sayfasına Dönüş Linki -->
        <div class="text-center pt-2 border-t border-gray-700/50">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition">
                <i class="ti ti-arrow-left"></i>
                Giriş Ekranına Dön
            </a>
        </div>

    </div>
</div>
@endsection