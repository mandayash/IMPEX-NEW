<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulation Info Filipina</title>
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
        <h1 class="country-title">Filipina</h1>

        <!-- Flag Image -->
        <div class="flag-container">
            <img src="{{ asset('aset/filipina.png') }}" alt="Filipina Flag" class="country-flag">
        </div>

        <!-- Regulation Links -->
        <div class="regulation-links">
            <a href="{{ asset('files/filipina.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR PERIKANAN & KELAUTAN KE FILIPINA</h2>
                </div>
            </a>

            <a href="{{ asset('files/filipina.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULASI EKSPOR MAKANAN DAN BAHAN BAKU KE FILIPINA</h2>
                </div>
            </a>
        </div>
    </div>

    @include('partial.footer')
</body>
</html>
