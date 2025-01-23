<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@vite('resources/css/home.css')


@section('content')
    <div class="container">
        <div class="row rounded" style="background: #F7F8FD;">
            <div class="col-4 p-5">
                <img src="{{ Storage::url($transaction->product->image) }}" class="border border-1 shadwow rounded-2"
                    alt="">

            </div>
            <div class="col-8 p-5">
                <h1 class="fw-bold mb-3 text-dark text-uppercase text-left" style="font-size: 2rem;">
                    {{ $transaction->product->name }}</h1>
                <div class="desc">
                    <span class="fw-bold">Total Payment</span>
                    <p class="text-left text-primary" style="font-size: 2rem; font-weight: 600">
                        ${{ number_format($transaction->sub_total, '0', '.', '.') }}</p>
                </div>


                <div class="d-flex justify-content-between mt-5">
                    <div class="payment-method ">
                        <span class="fw-bold">Payment Method</span> <br>

                    @switch($transaction->payment_method)
                        @case('Paypal')
                            <img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif"
                                alt="paypal" width="200" >
                            @break

                        @case('VISA Mandiri')
                            <img src="https://e7.pngegg.com/pngimages/308/426/png-clipart-visa-logo-credit-card-visa-logo-payment-visa-blue-text-thumbnail.png"
                                alt="visa" width="200" >
                            @break

                        @case('Gopay')
                            <img src="https://edufund.co.id/blog/wp-content/uploads/2024/04/logo-gopay.png"
                                alt="gopay" width="200">
                            @break

                        @default
                            <span> {{ $transaction->payment_method }}</span>
                    @endswitch
                    </div>




                    <div class="">
                        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            I have Paid
                        </button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{route('transaction.sendPaymentProof', ['transaction' => $transaction->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="file" name="payment_proof" accept="image/*" class="form-control">

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>

                                        <input type="hidden" name="status" value="paid">
                                        <button type="submit" class="btn btn-primary">Yes, I have Paid</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
