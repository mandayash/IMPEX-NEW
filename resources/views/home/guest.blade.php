<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@vite('resources/css/home.css')


@section('content')
    <section class="hero">
        <div class="hero-inner">
            <img src="{{ asset('aset/bumi.png') }}" alt="Earth Illustration" class="hero-image">
            <div class="hero-content">
                <h1><span>Bridging</span> Markets, <span>Building</span> Futures</h1>
                <p>Impex Helper streamlines export-import in ASEAN, connecting buyers and sellers in commodity
                    trade while ensuring compliance with regional export regulations.</p>
                <button class="start-journey">Start Journey!</button>
            </div>
        </div>
    </section>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
