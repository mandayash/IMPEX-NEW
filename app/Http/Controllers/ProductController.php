<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function create()
    {
        $user = Auth::user();

        // Check if seller has a profile
        if (!$user->sellerProfile) {
            return redirect()->route('seller.complete-profile')
                ->with('error', 'Please complete your profile first');
        }

        $sellerProfile = $user->sellerProfile;
        return view('seller.products.create', compact('sellerProfile'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd('Store method called', $request->all());

        Log::info('Attempting to store product', [
            'request_method' => $request->method(),
            'request_url' => $request->url(),
            'input' => $request->all()
        ]);


        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'commodity_type' => 'required|string'
            ]);

            Log::info('Validation passed');

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('product-images', 'public');
                Log::info('Image stored at: ' . $imagePath);
            }

            $seller = Auth::user()->sellerProfile;
            Log::info('Seller found', ['seller_id' => $seller->id]);

            $product = Product::create([
                'seller_id' => $seller->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $imagePath,
                'commodity_type' => $request->commodity_type
            ]);

            Log::info('Product created', ['product_id' => $product->id]);

            return redirect()->route('seller.store')
                ->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            Log::error('Failed to create product', [
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Failed to create product: ' . $e->getMessage())
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        // Memastikan product milik seller yang sedang login
        if ($product->seller_id !== Auth::user()->sellerProfile->id) {
            abort(403);
        }

        return view('seller.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {

        // dd($request->all());
        // Validasi kepemilikan product
        if ($product->seller_id !== Auth::user()->sellerProfile->id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'commodity_type' => 'required|string'
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {

            if ($product->image) {
                if (Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                    $imagePath = $request->file('image')->store('product-images', 'public');
                } else {
                    $imagePath = $request->file('image')->store('product-images', 'public');
                }
            } else {
                $imagePath = $request->file('image')->store('product-images', 'public');
            }
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'commodity_type' => $request->commodity_type
        ]);

        return redirect()->route('seller.store')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Validasi kepemilikan product
        if ($product->seller_id !== Auth::user()->sellerProfile->id) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('seller.store')
            ->with('success', 'Product deleted successfully');
    }
}
