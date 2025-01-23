<!-- resources/views/seller/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="card">
            <div class="card-header">{{ __('Profile Information') }}</div> --}}

        <div class="row w-100">
            <div class="col">
                <div class="mb-3">
                    <h4 class="fw-bold">Personal Information</h4>

                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <p class="form-control-static">{{ $user->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <p class="form-control-static">{{ $user->email }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <p class="form-control-static">{{ $user->country }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <p class="form-control-static">{{ $user->phone_number }}</p>
                </div>

            </div>

            <div class="col">
                @if (!empty($user->sellerProfile->shop_name))
                    <div class="mb-3">
                        <h4 class="fw-bold">Store Information</h4>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <p class="form-control-static">{{ $user->sellerProfile->shop_name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <p class="form-control-static">{{ $user->sellerProfile->description }}</p>
                    </div>

                    @if ($user->sellerProfile->shop_photo)
                        <div class="mb-3">
                            <label class="form-label">Shop Photo</label>
                            <div>
                                <img src="{{ asset(Storage::url($user->sellerProfile->shop_photo)) }}" alt="Shop Photo"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>
                    @endif
                @else
                    <div class="alert alert-info">
                        <p>No store information found.</p>
                        <a href="{{ route('seller.complete-profile') }}" class="btn btn-primary mt-3">Complete Profile</a>
                    </div>
                @endif
            </div>

            {{-- </div>
            </div> --}}
        </div>

    </div>
@endsection

@push('styles')
    <style>
        .form-control-static {
            padding: 0.375rem 0;
            margin-bottom: 0;
            color: #6c757d;
        }
    </style>
@endpush
