<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@vite('resources/css/home.css')


@section('content')
    <div class="container-fluid py-5" style="background: #F7F8FD">
        <div class="text-center">
            <h1 class="fw-bold mb-3 text-dark text-uppercase" style="font-size: 2rem;">{{ $product->name }}</h1>
            <h3 class="text-primary text-uppercase"> {{ $product->commodity_type }} </h3>
        </div>
    </div>


    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-5">
                <img src="{{ Storage::url($product->image) }}" class="border border-1 shadwow rounded-0" alt="">
            </div>
            <div class="col-7">
                <div class="pl-5">
                    <h1 class="fw-bold mb-3 text-dark text-uppercase text-left" style="font-size: 2rem;">
                        {{ $product->name }}</h1>
                    <div class="desc">
                        <p class="text-left" style="font-size: 1rem;">{{ $product->description }}</p>
                    </div>


                    <div class="price">
                        <p> USD (exclude taxes) </p> <br>
                        <span> ${{ $product->price }}</span>
                    </div>

                    <div class="d-flex mt-3">
                        <a href="{{ route('product.make-order', ['product' => $product->id]) }}"
                            class="btn py-2 px-5 btn-default">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
