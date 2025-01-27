<!-- resources/views/home/buyer.blade.php -->
@extends('layouts.app')
@section('title', 'Home')
<div class="bg-home">
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-inner">
            <img src="{{ asset('aset/bumi.png') }}" alt="Earth Illustration" class="hero-image">
            <div class="hero-content">
                <h1><span>Discover</span> and <span>Buy</span> Best Quality Products</h1>
                <p>Find the best commodities from trusted sellers across ASEAN. Start exploring our marketplace today!</p>
                <a href="#products" class="cta-button">Explore Products</a>
            </div>
        </div>
    </section>

    <div class="container">
        <h1 class="fw-bold mb-3">Product</h1>
        <div class="row w-100">
            @foreach ($products as $product)
                <div class="col-3  p-3 mt-5">
                    <div class="card shadow-sm rounded-0 ">
                        <div class="card-body">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="card-img-top rounded-0" style="height: 200px; object-fit: cover">
                            @else
                                <img src="{{ asset('images/default-product.png') }}" alt="Default Product"
                                    class="card-img-top rounded-0 ">
                            @endif
                            <div class="my-2">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-default py-1 mt-2">
                                    <i class="fas fa-arrow-right"></i> Detail
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    {{-- <!-- Commodity Section -->
    @include('components.commodity-section')
@endsection --}}

@push('styles')
    @vite(['resources/css/home.css'])
@endpush

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
