<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'country_buyer',
        'tax',
        'total_tax_transaction',
        'status',
        'payment_method',
        'expedition',
        'packaging',
        'payment_proof',
        'total_price',
        'sub_total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
