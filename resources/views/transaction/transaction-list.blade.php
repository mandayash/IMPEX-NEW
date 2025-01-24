<!-- resources/views/home/guest.blade.php -->
@extends('layouts.app')
@section('title', 'Transaction List| Impex Helper')
@vite('resources/css/home.css')


@section('content')
    <div class="container">
        <h1 class="text-center">Transaction List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th>Status</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="">Payment Proof</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>
                            @if ($transaction->status == 'Pending')
                                <span class="badge rounded-pill bg-warning">{{ $transaction->status }}</span>
                            @elseif ($transaction->status == 'Success')
                                <span class="badge rounded-pill bg-success">{{ $transaction->status }}</span>
                            @else
                                <span class="badge rounded-pill bg-danger">{{ $transaction->status }}</span>
                            @endif
                        </td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ number_format($transaction->product->price) }}</td>
                        <td>{{ $transaction->qty }}</td>
                        <td>{{ number_format($transaction->sub_total) }}</td>
                        <td>
                            @if ($transaction->payment_proof)
                                <a href="{{ Storage::url($transaction->payment_proof) }}" target="_blank">
                                    <a href="{{ Storage::url($transaction->payment_proof) }}"
                                        class="btn btn-sm btn-secondary border shadwo" target="_blank">View Payment
                                        Proof</a>
                                </a>
                            @else
                                <span>No Payment Proof</span>
                            @endif
                        </td>
                        <td>
                            @if ($transaction->status == 'Pending')
                                <a href="{{ route('transaction.acceptPayment', $transaction->id) }}"
                                    class="btn btn-sm btn-info">Accept Payment</a>
                            @elseif ($transaction->status == 'Success')
                                <button class="btn btn-sm btn-success">Transaction Complete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection




@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush
