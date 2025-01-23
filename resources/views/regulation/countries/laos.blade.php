<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulation Info Laos</title>
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
        <h1 class="country-title">Laos</h1>

        <!-- Flag Image -->
        <div class="flag-container">
            <img src="{{ asset('aset/laos.png') }}" alt="Laos Flag" class="country-flag">
        </div>

        <!-- Regulation Links -->
        <div class="regulation-links">
            <a href="{{ asset('files/regulasi ekspor kayu & furnitur ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR WOOD & FURNITURE EXPORTS TO LAOS</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor makanan & minuman olahan ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR PROCESSED FOOD AND BEVERAGE EXPORTS TO LAOS</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor perikanan & kelautan ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR FISHERIES & MARINE EXPORTS TO LAOS</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor pertambangan & logam ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR MINING & METAL EXPORTS TO LAOS</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor pertanian & perkebunan ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR AGRICULTURE & PLANTATION EXPORTS TO LAOS</h2>
                </div>
            </a>

            <a href="{{ asset('files/regulasi ekspor tekstil ke laos.pdf') }}" class="regulation-card">
                <div class="card-content">
                    <h2>REGULATIONS FOR TEXTILE EXPORT PRODUCTS TO LAOS</h2>
                </div>
            </a>
        </div>
    </div>

    @include('partial.footer')
</body>
</html>
