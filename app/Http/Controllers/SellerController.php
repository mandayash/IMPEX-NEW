<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\SellerProfile;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    /**
     * Show the form for completing seller profile
     */
    public function showProfileForm()
    {
        $user = Auth::user();
        $sellerProfile = $user->sellerProfile;



        // Debug untuk melihat data
        Log::info('Loading profile form', [
            'user_id' => $user->id,
            'has_profile' => isset($user->sellerProfile)
        ]);
        // Jika sudah ada profile dan lengkap, redirect ke create product
        // if ($user->sellerProfile && $user->sellerProfile->shop_name) {
        //     return redirect()->route('seller.products.create')
        //         ->with('info', 'Your profile is already complete');
        // }

        return view('seller.complete-profile', compact('user', 'sellerProfile'));
    }

    /**
     * Save the completed profile
     */
    public function completeProfile(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'description' => 'required|string',
            'shop_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = Auth::user();

        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('shop_photo')) {
            $photoPath = $request->file('shop_photo')->store('shop-photos', 'public');
        }

        // Buat atau update seller profile
        $sellerProfile = $user->sellerProfile;
        $sellerProfile->user_id = $user->id;
        $sellerProfile->shop_name = $request->shop_name;
        $sellerProfile->description = $request->description;
        if ($photoPath) {
            $sellerProfile->shop_photo = $photoPath;
        }
        $sellerProfile->save();

        return redirect()->route('seller.products.create')
            ->with('success', 'Profile completed successfully. You can now upload products.');
    }

    public function profile()
    {
        // Debug untuk melihat data yang ada
        $user = Auth::user()->load('sellerProfile');
        Log::info('User data:', ['user' => $user]);

        // Eager load seller profile untuk menghindari N+1 problem
        $user = \App\Models\User::with('sellerProfile')->find($user->id);
        Log::info('Seller Profile data:', ['profile' => $user->sellerProfile]);

        return view('seller.profile', compact('user'));
    }

    /**
     * Show seller dashboard
     */
    // public function dashboard()
    // {
    //     $user = Auth::user();
    //     $seller = $user->sellerProfile;
    //     $products = $seller->products()->latest()->paginate(10);

    //     return view('seller.dashboard', compact('seller', 'products'));
    // }

    /**
     * Show seller store page
     */
    public function store()
    {
        $user = Auth::user()->load('sellerProfile');
        $sellerProfile = $user->sellerProfile;
        // dd($user);
        $products = $sellerProfile->products()->latest()->paginate(12);

        return view('seller.store', [
            'seller' => $sellerProfile,
            'products' => $products
        ]);
    }
}
