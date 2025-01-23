@extends('layouts.app')

@section('content')
    <div class="store-container">
        <a href="{{ url()->previous() }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h1 class="store-title">My Store</h1>

        <div class="store-profile">
            <div class="store-photo">
                @if (isset($seller))
                    <img src="{{ Storage::url($seller->shop_photo) }}" alt="Store Photo">
                @else
                    <img src="{{ asset('images/default-store.png') }}" alt="Default Store Photo">
                @endif
            </div>


            @if (isset($seller))
                <div class="store-info">
                    <h2 class="store-name">{{ $seller->shop_name }}</h2>
                    <p class="store-location">{{ $seller->country }}</p>
                    <p class="store-description">{{ $seller->description }}</p>
                    <div class="store-earnings">
                        <div class="earnings-icon">$</div>
                        <span>$100.000.000</span>
                    </div>
                </div>
            @else
                <a href="{{ route('seller.complete-profile') }}" class="edit-profile-btn">
                    Edit Profile
                </a>
            @endif




        </div>

        <div class="products-section">
            <h3 class="section-title">Product</h3>
            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" alt="Default Product"
                                class="product-image">
                        @endif
                        <div class="product-details">
                            <h4 class="product-name">{{ $product->name }}</h4>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-actions">
                                <form method="POST" action="{{ route('seller.products.destroy', $product->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('seller.products.edit', $product->id) }}" class="edit-btn">
                                    Edit Product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/my-store.css'])
@endpush
