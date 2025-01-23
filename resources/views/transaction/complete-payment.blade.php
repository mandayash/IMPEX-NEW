<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@vite('resources/css/home.css')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-7 py-3 px-5">
                {{-- <h2 class="card-title">Transaction Detail</h2> --}}

                <h3 class="fw-bold">Payment Method</h3>
                <hr class="mt-3">
                <div class="card-body">
                    <div class="form-check my-5">
                        <input class="form-check-input shadow" type="radio" name="payment_method" id="paypal"
                            value="Paypal" checked>
                        <label class="form-check-label" for="paypal">
                            <img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" alt="paypal"
                                width="200" class="ml-5">
                        </label>
                        <hr class="mt-3">
                    </div>
                    <div class="form-check my-5">
                        <input class="form-check-input shadow" type="radio" name="payment_method" id="visa"
                            value="VISA Mandiri">
                        <label class="form-check-label" for="visa">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Visa_Logo.png/640px-Visa_Logo.png"
                                alt="visa" width="200" class="ml-5">
                        </label>
                        <hr class="mt-3">
                    </div>
                    <div class="form-check my-5">
                        <input class="form-check-input shadow" type="radio" name="payment_method" id="gopay"
                            value="Gopay">
                        <label class="form-check-label" for="gopay">
                            <img src="https://edufund.co.id/blog/wp-content/uploads/2024/04/logo-gopay.png" alt="gopay"
                                width="200" class="ml-5">
                        </label>
                        <hr class="mt-3">
                    </div>
                </div>

            </div>

            <div class="col-5">
                <div class="p-4" style="background: #F7F8FD">
                    <h3 class="fw-bold">Fee</h3>


                    <div class="d-flex justify-content-between mb-3">
                        <span>Tax </span>
                        <span>{{ $transaction->tax }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total Tax</span>
                        <span>${{ number_format($transaction->total_tax_transaction) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total</span>
                        <span>${{ number_format($transaction->total_price) }}</span>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between mt-3">
                        <strong> <span>Subtotal </span></strong>
                        <span> ${{ number_format($transaction->sub_total) }}</span>

                    </div>

                    <div class="d-grid mt-3">
                        <a href="{{route('transaction.payment', ['transaction' => $transaction->id])}}" class="btn btn-block btn-default py-2">Proceed</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
