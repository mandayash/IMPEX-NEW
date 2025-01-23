<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulation Info Myanmar</title>
    <link rel="icon" href="{{ asset('aset/logo-zoom.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/home.css')
</head>
<body>
    @include('partial.navbar')

    <div class="container">
        <!-- Back Button -->
        <a href="{{ url('/') }}" class="back-button1">
            <img src="{{ asset('aset/back.png') }}" alt="Back" />
        </a>

        <!-- Country Title -->
        <h1 class="country-title">Myanmar</h1>

        <!-- Flag Image -->
        <div class="flag-container">
            <img src="{{ asset('aset/myanmar.png') }}" alt="Myanmar Flag" class="country-flag">
        </div>

        <!-- Regulation Links -->
        <div class="regulation-links">
            <a href="{{ asset('files/regulasi ekspor kayu & furnitur ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR KAYU & FURNITUR KE MYANMAR</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor makanan & minuman olahan ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>RREGULASI EKSPOR MAKANAN DAN MINUMAN OLAHAN KE MYANMAR</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor perikanan & kelautan ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR PERIKANAN & KELAUTAN KE MYANMAR</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor pertambangan & logam ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR PERTAMBANGAN & LOGAM KE MYANMAR</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor pertanian & perkebunan ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR PERTANIAN & PERKEBUNAN KE MYANMAR</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor tekstil ke myanmar.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI PRODUK TEKSTIL EKSPOR MYANMAR</h2>
                </div>
            </a>
        </div>
    </div>

    @include('partial.footer')
</body>
</html>
