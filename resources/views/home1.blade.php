<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                <div class="mt-2 flex items-center">
                    <img src="{{ Storage::url($product->seller->shop_photo) }}" alt="Shop" class="w-6 h-6 rounded-full">
                    <span class="ml-2 text-sm text-gray-500">{{ $product->seller->shop_name }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
