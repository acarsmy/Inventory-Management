@extends('layouts.app')

@section('title', 'Giriş Yap - Stok Takip')

@section('content')
<div class="min-h-[calc(100vh-12rem)] flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
    
    <!-- Giriş Kartı -->
    <div class="w-full max-w-md space-y-8 bg-gray-800 border border-gray-700/60 rounded-2xl p-8 shadow-xl">
        
        <!-- Logo ve Başlık -->
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 mb-4">
                <i class="ti ti-box text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Hoş Geldiniz</h2>
            <p class="text-xs text-gray-400 mt-1">Stok Yönetim Paneline erişmek için giriş yapın</p>
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

        <!-- Fortify Login Formu -->
        <form class="mt-6 space-y-5" action="{{ route('login') }}" method="POST">
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

            <!-- Parola Alanı -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-medium text-gray-300">
                        Parola
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[11px] text-indigo-400 hover:text-indigo-300 transition">
                            Şifremi Unuttum?
                        </a>
                    @endif
                </div>
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

            <!-- Beni Hatırla -->
            <div class="flex items-center">
                <input id="remember_me" 
                       name="remember" 
                       type="checkbox" 
                       class="w-4 h-4 rounded border-gray-700 bg-gray-900 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-gray-800">
                <label for="remember_me" class="ml-2 block text-xs text-gray-400">
                    Beni Hatırla
                </label>
            </div>

            <!-- Giriş Butonu -->
            <div>
                <button type="submit" 
                        class="w-full flex justify-center items-center gap-2 py-2.5 px-4 rounded-lg text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 shadow-lg shadow-indigo-600/20 transition duration-150">
                    <i class="ti ti-login text-base"></i>
                    Giriş Yap
                </button>
            </div>
        </form>

        <!-- Kayıt Ol Linki (Varsa) -->
        @if (Route::has('register'))
            <div class="text-center pt-2 border-t border-gray-700/50">
                <p class="text-xs text-gray-400">
                    Hesabınız yok mu? 
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-400 hover:text-indigo-300 transition">
                        Hemen Kayıt Olun
                    </a>
                </p>
            </div>
        @endif

    </div>
</div>
@endsection