<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->date('trans_date')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->text('sku_id')->collation('utf8mb4_bin')->nullable();
            $table->boolean('product_type')->default(0);
            $table->text('cookie')->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('emi')->default(0);
            $table->integer('coupon_id')->nullable();
            $table->integer('address')->nullable();
            $table->string('warranty_note', 100)->nullable();
            $table->float('warranty_charge', 10, 2)->default(0);
            $table->unsignedBigInteger('addedby_id')->nullable();
            $table->unsignedBigInteger('editedby_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
