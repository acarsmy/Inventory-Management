# FirstProject

Laravel ile geliştirilmiş bir stok takip ve ürün yönetim uygulamasıdır.

## Özellikler

* Ürün ekleme, düzenleme ve silme
* Stok miktarı takibi
* Yönetim paneli
* Responsive arayüz (Tailwind CSS)

## Kullanılan Teknolojiler

* PHP 8.x
* Laravel 13
* MySQL
* Tailwind CSS
* Vite

## Kurulum

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

