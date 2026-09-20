<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('invoice')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_name', 250)->nullable();
            $table->boolean('product_type')->default(0);
            $table->integer('quantity')->default(0);
            $table->text('sku_id')->nullable();
            $table->text('sku_value')->nullable();
            $table->integer('color')->nullable();
            $table->integer('size')->nullable();
            $table->string('warranty_note', 100)->nullable();
            $table->float('warranty_charge', 10, 2)->default(0);
            $table->float('price', 10, 2)->default(0);
            $table->float('total_coupon_discount', 10, 2)->default(0);
            $table->float('total_deal_discount', 10, 2)->default(0);
            $table->float('total_price', 10, 2)->default(0);
            $table->float('final_price', 10, 2)->default(0);
            $table->float('shipping_cost', 10, 2)->default(0);
            $table->integer('total_weight')->default(0);
            $table->string('weight_unit', 100)->nullable();
            $table->float('tax', 10, 2)->default(0);
            $table->integer('total_return')->default(0);
            $table->boolean('pre_order')->default(0);
            $table->string('status', 20)->nullable()->comment('Pending, Confirmed, Runing, Cancel');
            $table->string('order_status', 30)->nullable();
            $table->float('purchase_price', 10, 2)->default(0);
            $table->float('purchase_total', 10, 2)->default(0);
            $table->float('profit_loss', 10, 2)->default(0);
            $table->boolean('seller_paid_status')->default(0);
            $table->integer('seller_paid_invoice')->nullable();
            $table->timestamp('pending_at')->nullable();
            $table->integer('pending_by')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->integer('confirmed_by')->nullable();
            $table->timestamp('ready_to_ship_at')->nullable();
            $table->integer('ready_to_ship_by')->nullable();
            $table->timestamp('received_form_seller_at')->nullable();
            $table->integer('received_form_seller_by')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->integer('cancelled_by')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->integer('shipped_by')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->integer('delivered_by')->nullable();
            $table->string('payment_status', 20)->default('unpaid')->nullable();
            $table->timestamp('return_cancel_at')->nullable();
            $table->integer('return_cancel_by')->nullable();
            $table->text('return_cancel_msg')->nullable();
            $table->text('search_key')->nullable();
            $table->integer('addedby_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
