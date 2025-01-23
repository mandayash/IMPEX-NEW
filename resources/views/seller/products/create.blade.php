@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <a href="{{ url()->previous() }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="product-header">
        <h1>Product</h1>
    </div>

    <div class="product-form-card">
        <form method="POST" action="{{ route('seller.products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Debug info - akan muncul di atas form -->
            <div class="alert alert-info">
                Form akan di-submit ke: {{ route('seller.products.store') }}
            </div>

            <!-- Photo Product Section -->
            <div class="form-section">
                <h2 class="form-section-title">Photo Product</h2>
                <div class="photo-upload-area" onclick="document.getElementById('image').click()">
                    <input type="file" id="image" name="image" class="d-none" accept="image/*">
                    <div class="photo-upload-icon">+</div>
                    <div class="photo-upload-text">Add Photo 1:1</div>
                </div>
            </div>

            <!-- Product Name -->
            <div class="form-section">
                <h2 class="form-section-title">Product Name</h2>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name') }}" maxlength="255"
                       placeholder="Type Here!" required>
                <div class="char-count"><span id="nameCount">0</span>/255</div>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Product Description -->
            <div class="form-section">
                <h2 class="form-section-title">Product Description</h2>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description" name="description" rows="4" maxlength="3000"
                          placeholder="Type Here!" required>{{ old('description') }}</textarea>
                <div class="char-count"><span id="descCount">0</span>/3000</div>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Commodity Type -->
            <div class="form-section">
                <h2 class="form-section-title">Commodity Type</h2>
                <div class="commodity-grid">
                    @foreach(['Agriculture & Plantation', 'Wood & Furniture', 'Processed Food & Beverages',
                            'Crafts & Textiles', 'Fisheries & Marine', 'Mining & Metals'] as $type)
                    <div class="commodity-option">
                        <input type="radio"
                            class="commodity-checkbox"
                            name="commodity_type"  {{-- Hapus [] karena single select --}}
                            value="{{ $type }}"
                            id="{{ Str::slug($type) }}"
                            required>
                        <label class="commodity-label" for="{{ Str::slug($type) }}">
                            {{ $type }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @error('commodity_type')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="form-section">
                <h2 class="form-section-title">Price</h2>
                <input type="number" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" value="{{ old('price') }}"
                       min="0" maxlength="12" placeholder="Type Here!" required>
                <div class="char-count"><span id="priceCount">0</span>/12</div>
                @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Stock -->
            <div class="form-section">
                <h2 class="form-section-title">Stock</h2>
                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                       id="stock" name="stock" value="{{ old('stock') }}"
                       min="0" placeholder="Type Here!" required>
                @error('stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-button">Add Product</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/create-product.css'])
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character count updates
    ['name', 'description', 'price'].forEach(field => {
        const input = document.getElementById(field);
        const countSpan = document.getElementById(field + 'Count');

        input.addEventListener('input', function() {
            countSpan.textContent = this.value.length;
        });

        // Initial count
        countSpan.textContent = input.value.length;
    });

    // Image preview
    const imageInput = document.getElementById('image');
    const uploadArea = document.querySelector('.photo-upload-area');

    imageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                uploadArea.style.backgroundImage = `url(${e.target.result})`;
                uploadArea.style.backgroundSize = 'cover';
                uploadArea.style.backgroundPosition = 'center';
                uploadArea.querySelector('.photo-upload-icon').style.display = 'none';
                uploadArea.querySelector('.photo-upload-text').style.display = 'none';
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
@endpush
