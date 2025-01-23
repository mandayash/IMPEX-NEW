<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Regulation Info | Impex Helper</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo-zoom.png" />
    <link rel="icon" href="{{ asset('aset/logo-zoom.png') }}">
    @vite('resources/css/app.css')
    {{-- @vite('resources/css/home.css') --}}

  </head>
  <body>
    <div class="container">
        <header class="header">
            <a href="{{ url('/') }}" class="back-button">
                <img src="{{ asset('aset/back.png') }}" alt="Back" />
            </a>
            <h1>Regulation Info</h1>
        </header>

        <div class="hero-section-regulation">
            <p class="hero-text-regulation">Here are all the regulations of Export and Import from ASEAN Countries</p>
        </div>

        <div class="countries-grid">
            <!-- Malaysia -->
            <div class="country-card">
                <img src="{{ asset('aset/malaysia.png') }}" alt="Malaysia flag" class="country-flag">
                <h3>Malaysia</h3>
                <p>Malaysia exports palm oil, rubber, and electrical machinery from Indonesia</p>
                <a href="{{ route('regulation.countries.malaysia') }}" class="read-more">Read more</a>
            </div>

            <!-- Singapore -->
            <div class="country-card">
                <img src="{{ asset('aset/singapore.png') }}" alt="Singapore flag" class="country-flag">
                <h3>Singapore</h3>
                <p>Singapore imports electronics, machinery, and refined petroleum products from Indonesia</p>
                <a href="{{ route('regulation.countries.singapura') }}" class="read-more">Read more</a>
            </div>

            <!-- Thailand -->
            <div class="country-card">
                <img src="{{ asset('aset/thailand.png') }}" alt="Thailand flag" class="country-flag">
                <h3>Thailand</h3>
                <p>Thailand imports automotive parts, electronics, and agricultural products like rice from Indonesia</p>
                <a href="{{ route('regulation.countries.thailand') }}" class="read-more">Read more</a>
            </div>

            <!-- Cambodia -->
            <div class="country-card">
                <img src="{{ asset('aset/kamboja.png') }}" alt="Cambodia flag" class="country-flag">
                <h3>Cambodia</h3>
                <p>Cambodia imports textiles, footwear, and agricultural products such as rice and rubber from Indonesia</p>
                <a href="{{ route('regulation.countries.kamboja') }}" class="read-more">Read more</a>
            </div>

            <!-- Myanmar -->
            <div class="country-card">
                <img src="{{ asset('aset/myanmar.png') }}" alt="Myanmar flag" class="country-flag">
                <h3>Myanmar</h3>
                <p>Myanmar imports agricultural products, especially rice and beans, and mineral resources from Indonesia</p>
                <a href="{{ route('regulation.countries.myanmar') }}" class="read-more">Read more</a>
            </div>

            <!-- Laos -->
            <div class="country-card">
                <img src="{{ asset('aset/laos.png') }}" alt="Laos mining" class="country-image">
                <h3>Laos</h3>
                <p>Laos imports coffee, rubber, and mineral resources from Indonesia.</p>
                <a href="{{ route('regulation.countries.laos') }}" class="read-more">Read more</a>
            </div>

            <!-- Phillipines -->
            <div class="country-card">
                <img src="{{ asset('aset/filipina.png') }}" alt="Laos mining" class="country-image">
                <h3>Philippines</h3>
                <p>The Philippines imports electronic components, copper, and coconut products from Indonesia.</p>
                <a href="{{ route('regulation.countries.filipina') }}" class="read-more">Read more</a>

            </div>

            <!-- Brunei Darussalam -->
            <div class="country-card">
                <img src="{{ asset('aset/brunei.png') }}" alt="Laos mining" class="country-image">
                <h3>Brunei Darussalam</h3>
                <p>Brunei imports crude oil, natural gas, and petroleum products from Indonesia.</p>
                <a href="{{ route('regulation.countries.brunei') }}" class="read-more">Read more</a>
            </div>

            <!-- Vietnam -->
            <div class="country-card">
                <img src="{{ asset('aset/vietnam.png') }}" alt="Laos mining" class="country-image">
                <h3>Vietnam</h3>
                <p>Vietnam imports coffee, seafood, and textiles from Indonesia.</p>
                <a href="{{ route('regulation.countries.vietnam') }}" class="read-more">Read more</a>
            </div>

            <!-- Timor Leste -->
            <div class="country-card">
                <img src="{{ asset('aset/timor.png') }}" alt="Laos mining" class="country-image">
                <h3>Timor Leste</h3>
                <p>Timor-Leste imports coffee, rice, and various food products from Indonesia.</p>
                <a href="{{ route('regulation.countries.timorleste') }}" class="read-more">Read more</a>
            </div>
        </div>

        </div>
    </div>

    @include('partial.footer')
</body>
</html>





