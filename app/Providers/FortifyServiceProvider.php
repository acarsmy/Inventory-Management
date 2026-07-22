<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Giriş Sayfası Görünümü
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Kayıt Olma Sayfası Görünümü
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Şifremi Unuttum Sayfası Görünümü
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Fortify Kayıt Aksiyonunu Bağlama
        Fortify::createUsersUsing(CreateNewUser::class);

        // Fortify Şifre Sıfırlama Aksiyonunu Bağlama
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Fortify Giriş Hız Sınırlayıcı (Rate Limiter) Tanımı
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });
    }
}