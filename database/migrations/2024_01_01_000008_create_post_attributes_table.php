<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('src_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('reff_id')->nullable();
            $table->text('sku_id')->nullable();
            $table->tinyInteger('type')->default(0)->comment('0=Category Post, 1=blog Category Post, 2=Blog Tags post, 3=Product Attribute post 4= Product Tags Post, 5=Coupon category Post, 6=Coupon product Post, 7=Product Variation Attributes ,8=Product Variation Attributes Items, 9=Product Variation Attributes Item Value');
            $table->string('status', 20)->nullable();
            $table->float('reguler_price', 10, 2)->default(0);
            $table->float('discount', 10, 2)->default(0);
            $table->string('discount_type', 10)->default('percent')->comment('percent, flat');
            $table->float('final_price', 10, 2)->default(0);
            $table->float('preorder_price', 10, 2)->default(0)->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('stock_status')->default(1);
            $table->integer('duration')->nullable();
            $table->integer('stock')->default(0);
            $table->string('value_1', 100)->nullable();
            $table->bigInteger('drag')->nullable();
            $table->bigInteger('addedby_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_attributes');
    }
};
