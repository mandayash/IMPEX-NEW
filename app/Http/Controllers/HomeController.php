<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Tambahkan logging lebih detail untuk membantu debugging
        Log::info('Session ID: ' . session()->getId());
        Log::info('Auth Check: ' . (Auth::check() ? 'true' : 'false'));

        // Periksa status autentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Log detail user untuk membantu debugging
            Log::info('User Details:', [
                'id' => $user->id,
                'role' => $user->role,
                'has_seller_profile' => $user->sellerProfile ? 'yes' : 'no'
            ]);

            // Ambil products dengan eager loading untuk optimasi
            $products = Product::latest()->paginate(12);

            // Pengecekan role yang lebih eksplisit
            // if ($user->role === 'seller') {
            //     // Pastikan pengecekan sellerProfile aman
            //     $hasCompletedProfile = false;
            //     if ($user->sellerProfile) {
            //         $hasCompletedProfile = !empty($user->sellerProfile->shop_name);
            //     }

            //     Log::info('Rendering seller view', [
            //         'hasCompletedProfile' => $hasCompletedProfile
            //     ]);

            //     return view('home.seller', [
            //         'products' => $products,
            //         'isSellerProfileComplete' => $hasCompletedProfile
            //     ]);
            // }

            // Jika bukan seller, tampilkan view buyer
            Log::info('Rendering buyer view');
            return view('home.buyer', compact('products'));
        }

        // Jika tidak terautentikasi, tampilkan view guest
        Log::info('Rendering guest view');
        return view('home.guest');
    }


    public function showProduct(Product $product)
    {
        return view('products.show-product', compact('product'));
    }

    // Method dashboard bisa dihapus karena tidak digunakan
    // Atau jika diperlukan, logikanya bisa disederhanakan:
    public function dashboard()
    {
        if (!Auth::check()) {
            Log::info('Unauthorized dashboard access attempt');
            return redirect()->route('login');
        }

        return $this->index();
    }


    public function makeOrder(Product $product)
    {

        return view('transaction.make-order', compact('product'));
    }

    public function checkout(Request $request, Product $product)
    {


        $basePrice = $product->price;

        $tax = $basePrice * 0.15;
        $qty = $request->qty ?? 1;

        // dd($tax);

        $transaction = new Transaksi();
        $transaction->product_id = $product->id;
        $transaction->user_id = Auth::user()->id;
        $transaction->qty = $qty;
        $transaction->country_buyer = Auth::user()->country;
        $transaction->tax = 0.15;
        $transaction->status = 'Pending';
        $transaction->payment_method = $request->payment_method;
        $transaction->packaging = $request->packaging_type;
        $transaction->expedition = $request->expedition;
        $transaction->total_price = $basePrice * $qty;
        $transaction->total_tax_transaction = $tax;
        $transaction->sub_total = $basePrice + $tax;

        $transaction->save();

        return redirect()->route('transaction.completePayment',['transaction' => $transaction->id]);
    }


    public function completePayment(Transaksi $transaction)
    {

        return view('transaction.complete-payment', compact('transaction'));
    }


    public function payment(Transaksi $transaction)
    {
        $transaction = Transaksi::with('product')->find($transaction->id);
        return view('transaction.payment', compact('transaction'));

    }

    public function sendPaymentProof(Request $request,Transaksi $transaction)
    {
        $imagePath = $request->file('payment_proof')->store('payment_proof', 'public');

        $transaction->update([
            'payment_proof' => $imagePath
        ]);


        return redirect()->back();
    }
}
