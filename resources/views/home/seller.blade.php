<!-- resources/views/home/seller.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-inner">
        <img src="{{ asset('aset/bumi.png') }}" alt="Earth Illustration" class="hero-image">
        <div class="hero-content">
            <h1><span>Bridging</span> Markets, <span>Building</span> Futures</h1>
            <p>Impex Helper streamlines export-import in ASEAN, connecting buyers and sellers in commodity
                trade while ensuring compliance with regional export regulations.</p>
            @if(!$isSellerProfileComplete)
                <a href="{{ route('seller.complete-profile') }}" class="cta-button">Complete Your Profile</a>
            @else
                <a href="{{ route('seller.products.create') }}" class="cta-button">Upload Product</a>
            @endif
        </div>
    </div>
</section>

{{-- <!-- Commodity Section -->
@include('components.commodity-section')
@endsection --}}

@push('styles')
    @vite(['resources/css/home.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
