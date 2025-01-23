<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('qty');
            $table->string('country_buyer');
            $table->decimal('tax');
            $table->decimal('total_tax_transaction', 10, 2);
            $table->enum('status',['Pending','Success','Failed'])->default('Pending');
            $table->enum('payment_method',['Paypal','VISA Mandiri','Gopay']);

            $table->enum('expedition', ['Ninja Express', 'DHL Express', 'JNE Express']);
            $table->enum('packaging',['Individual','Bulk','Ecofriendly']);
            $table->string('payment_proof')->nullable();

            $table->bigInteger('total_price');
            $table->bigInteger('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
