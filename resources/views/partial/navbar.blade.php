<nav class="navbar py-0">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="logo-wrapper">
                <img src="{{ asset('aset/logo-lebar.png') }}" alt="Impex Helper Logo" class="logo-image">
            </div>
        </a>

        <!-- Menu navbar -->
        <div class="nav-items">
            <!-- Export Import Regulation - sama untuk semua -->
            <a class="nav-link" href="{{ route('regulation') }}">
                Export Import Regulation
            </a>

            @auth
                @if (Auth::user()->role === 'seller')
                    <a class="nav-link" href="{{ route('seller.products.create') }}">
                        Upload Product
                    </a>
                @endif
                @if (Auth::user()->role === 'buyer')
                    <a class="nav-link" href="{{ route('buyer.purchases') }}">My Purchases</a>
                @endif
                <div class="dropdown">
                    <button class="nav-link dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                        @if (Auth::user()->role === 'seller')
                            <li><a class="dropdown-item" href="{{ route('seller.store') }}">My Store</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('transaction') }}">Transaction</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <!-- Untuk guest -->
                <div class="auth-buttons">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link btn-default" href="{{ route('register') }}">Sign Up</a>
                </div>
            @endguest

        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Tambahkan CSS ini untuk memperbaiki tampilan form logout dalam dropdown */
    .dropdown-item-form {
        margin: 0;
        padding: 0;
    }

    .dropdown-item-form button {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        padding: 0.5rem 1rem;
    }

    .dropdown-item-form button:hover {
        background-color: #f8f9fa;
        color: #DE854F;
    }

    /* Perbaikan untuk dropdown toggle */
    .dropdown-toggle {
        cursor: pointer;
    }

    /* Memastikan dropdown menu muncul di atas elemen lain */
    .dropdown-menu {
        z-index: 1000;
    }
</style>
