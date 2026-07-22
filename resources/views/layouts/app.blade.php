<!DOCTYPE html>
<html lang="tr" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Stok Takip'))</title>

    <!-- Tailwind CSS (CDN - Anında Stil İçin) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
      }
    </script>

    <!-- Tabler Icons (İkonlar İçin) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100 min-h-screen flex flex-col">

    <!-- Navbar Partial -->
    @include('layouts.partials.navbar')

    <!-- Flash Notifications -->
    @if (session('success'))
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-3 rounded-lg flex items-center justify-between">
                <span class="flex items-center gap-2">
                    <i class="ti ti-circle-check text-xl"></i>
                    {{ session('success') }}
                </span>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">&times;</button>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-1 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800/40 border-t border-gray-800/60 py-4 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} Stok Yönetim Sistemi — Fortify & Eloquent
    </footer>

    @stack('scripts')
</body>
</html>