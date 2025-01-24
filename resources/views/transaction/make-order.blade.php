<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@section('title', 'Make order | Impex Helper')
@vite('resources/css/home.css')


@section('content')
    <div class="container-fluid py-5" style="background: #F7F8FD">
        <div class="text-center">
            <h1 class="fw-bold mb-3 text-dark text-uppercase" style="font-size: 2rem;">Make Order</h1>
            <h3 class="text-primary text-uppercase">Complete your order by filling the form</h3>
        </div>
    </div>

    <form action="{{ route('product.checkout', ['product' => $product->id]) }}" method="POST">
        @csrf

        <div class="container mt-5 pt-5">
            <div class="row w-100">



                <div class="col-12 p-5" style="background: #F7F8FD;">
                    <div class="p-3">
                        <h3 class="fw-bold" style="font-size: 1.5rem;">Your Identity</h3>
                        <hr>
                        <div class="form-group">
                            <div class="mt-3">
                                <strong> <label for="" class="d-block">Name</label></strong>

                                <label for="">{{ Auth::user()->name }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <strong> <label for="" class="d-block">Email</label></strong>
                                <label for="">{{ Auth::user()->email }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <strong> <label for="" class="d-block">Country</label></strong>
                                <label for="">{{ Auth::user()->country }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <strong> <label for="" class="d-block">Phone Number</label></strong>
                                <label for="">{{ Auth::user()->phone_number }}</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 mt-5 p-5" style="background: #F7F8FD;">
                    <div class="p-3">
                        <h3 class="fw-bold" style="font-size: 1.5rem;">Packaging Type</h3>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="packaging_type"
                                        id="individual" value="Individual" checked>
                                    <label class="form-check-label" for="packaging_type_1">
                                        <strong> Individual Product Packaging</strong> <br>
                                        Each item will be securely wrapped in protective packaging to prevent damage during
                                        transit.
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="packaging_type"
                                        id="bulk" value="Bulk">
                                    <label class="form-check-label" for="packaging_type_1">
                                        <strong> Bulk Packaging</strong> <br>
                                        Products will be packed in sturdy wooden crates or pallets for international
                                        shipping,
                                        ensuring safe transport.
                                    </label>
                                </div>


                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="packaging_type"
                                        id="Ecofriendly" value="Ecofriendly">
                                    <label class="form-check-label" for="packaging_type_1">
                                        <strong> Eco Friendly</strong> <br>
                                        We will pack your order in eco-friendly materials to reduce waste and minimize
                                        environmental impact.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3">
                        <h3 class="fw-bold" style="font-size: 1.5rem;">Expedtion</h3>
                        <div class="form-group">
                            <div class="mt-3">
                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="expedition"
                                        id="ninja_express" value="Ninja Express" checked>
                                    <label class="form-check-label" for="ninja_express">
                                        <strong> Ninja Express</strong> <br>
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="expedition" id="dhl_express"
                                        value="DHL Express">
                                    <label class="form-check-label" for="dhl_express">
                                        <strong> DHL Express</strong> <br>
                                    </label>
                                </div>


                                <div class="form-check mb-3">
                                    <input class="form-check-input shadow" type="radio" name="expedition" id="jne_express"
                                        value="JNE Express">
                                    <label class="form-check-label" for="jne_express">
                                        <strong> JNE Express</strong> <br>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div style="background: #F7F8FD;">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5 px-5">
                        <div class="p-3">
                            <h3 class="fw-bold" style="font-size: 1.5rem;">Payment Method</h3>
                            <div class="form-group">
                                <div class="mt-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input shadow" type="radio" name="payment_method"
                                            id="paypal" value="Paypal" checked>
                                        <label class="form-check-label" for="paypal">
                                            <img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif"
                                                alt="paypal" width="100" class="ml-5">
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input shadow" type="radio" name="payment_method"
                                            id="visa" value="VISA Mandiri">
                                        <label class="form-check-label" for="visa">
                                            <img src="https://e7.pngegg.com/pngimages/308/426/png-clipart-visa-logo-credit-card-visa-logo-payment-visa-blue-text-thumbnail.png"
                                                alt="visa" width="100" class="ml-5">
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input shadow" type="radio" name="payment_method"
                                            id="gopay" value="Gopay">
                                        <label class="form-check-label" for="gopay">
                                            <img src="https://edufund.co.id/blog/wp-content/uploads/2024/04/logo-gopay.png"
                                                alt="gopay" width="100" class="ml-5">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="container">

            <div class="mt-3 px-5">
                <button type="submit" class="btn btn-default shadow">Continue</button>
            </div>
        </div>

    </form>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
