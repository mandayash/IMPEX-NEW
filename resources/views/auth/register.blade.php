<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@push('styles')
    @vite(['resources/css/auth/register.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="signup-header">
        <button class="signup-back-button" onclick="history.back()">←</button>
        <div class="signup-header-content">
            <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" class="signup-logo">
            <h1 class="signup-header-title">Register</h1>
        </div>
    </div>

    <div class="signup-container">
        <div class="signup-form-container">
            <h2>Create Account</h2>

            <form method="POST" action="{{ route('register') }}" class="signup-create-account-form" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <input id="password-confirm" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <!-- Country -->
                <div class="form-group">
                    <select id="country" name="country" class="@error('country') is-invalid @enderror" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Birth Info -->
                <div class="signup-birth-info">
                    <input id="place_of_birth" type="text" class="@error('place_of_birth') is-invalid @enderror"
                        name="place_of_birth" value="{{ old('place_of_birth') }}" required placeholder="Place of Birth">

                    <input id="birth_date" type="date" class="@error('birth_date') is-invalid @enderror"
                        name="birth_date" value="{{ old('birth_date') }}" required>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <input id="phone_number" type="text" class="@error('phone_number') is-invalid @enderror"
                        name="phone_number" value="{{ old('phone_number') }}" required placeholder="Phone Number">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- <div class="profile-picture-section">

                    <div class="form-group">
                        <label for="shop_name">Profile Picture</label>
                        <input type="file" id="shop_photo" name="shop_photo" required accept="image/*">
                    </div>
                </div>

                <div class="form-fields">
                    <div class="form-group">
                        <input type="text" id="shop_name" name="shop_name" required placeholder="Shop Name">
                    </div>

                    <div class="form-group">
                        <input type="text" id="description" name="description" required placeholder="Description">
                    </div>

                </div> --}}
                <button type="submit">
                    {{ __('Register') }}
                </button>

                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </form>
        </div>
    </div>
@endsection
