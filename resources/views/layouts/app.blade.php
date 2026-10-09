<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Klinik')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }
        .layout-container {
            display: flex;
            min-height: 100vh;
        }
        .main-content {
            flex: 1;
            padding: 20px 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="layout-container">
        <!-- Sidebar Kiri (Memanggil partials/navbar.blade.php) -->
        @include('partials.navbar')

        <!-- Konten Utama Kanan -->
        <div class="main-content">
            <main>
                @yield('content')
            </main>

            <!-- Footer (Memanggil partials/footer.blade.php) -->
            @include('partials.footer')
        </div>
    </div>
</body>
</html>