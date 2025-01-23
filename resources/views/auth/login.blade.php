<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@push('styles')
    @vite(['resources/css/auth/login.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="login-container">
    <!-- Back Button -->
    <button class="back-button" onclick="history.back()">←</button>

    <!-- Left Section with Image -->
    <div class="login-image-section">
        <h1>Welcome Back!</h1>
        <img src="{{ asset('aset/login-bumi.png') }}" alt="Login Illustration" class="login-image">
    </div>

    <!-- Right Section with Form -->
    <div class="login-form-section">
        <h2>Log In</h2>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email"
                    class="form-input @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password"
                    class="form-input @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="login-button">
                Log In
            </button>

            <!-- Remove password reset for now -->
        </form>
    </div>
</div>
@endsection
