@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="back-btn position-relative">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="seller-form-container">


        <div class="seller-form-card">

            <div class="seller-form-header">
                <h1>Seller Detail</h1>
                <p>Manage your store information to start selling.</p>
            </div>

            <form method="POST" action="{{ route('seller.complete-profile.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="seller-form-content">
                    <div class="profile-picture-section">
                        <h3>Profile Picture</h3>
                        <div class="profile-picture-container">
                            @if (isset($sellerProfile) && $sellerProfile->shop_photo)
                                <img src="{{ Storage::url($sellerProfile->shop_photo) }}" alt="Shop Photo"
                                    class="profile-picture">
                            @else
                                <img src="{{ asset('aset/default-profile.png') }}" alt="Default Profile"
                                    class="profile-picture">
                            @endif
                        </div>
                        <input type="file" name="shop_photo" id="shop_photo" hidden>
                        <label for="shop_photo" class="add-picture-btn">Add Picture</label>
                    </div>

                    <div class="form-fields">
                        <div class="form-group">
                            <label for="shop_name">Shop name</label>
                            <input type="text" id="shop_name" name="shop_name"
                                value="{{ old('shop_name') ?? ($sellerProfile->shop_name ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required>{{ old('description') ?? ($sellerProfile->description ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/complete-profile.css'])
@endpush
