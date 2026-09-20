<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable()->index();
            $table->string('slug', 250)->nullable()->index();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('seo_contents')->nullable();
            $table->string('sku_code', 100)->nullable();
            $table->string('bar_code', 100)->nullable();
            $table->integer('stock_out_limit')->default(0);
            $table->boolean('stock_status')->default(1);
            $table->boolean('final_stock_status')->default(1);
            $table->integer('quantity')->nullable();
            $table->float('purchase_price', 10, 2)->default(0);
            $table->float('final_price', 10, 2)->default(0)->index();
            $table->float('pos_price', 10, 2)->default(0);
            $table->float('discount', 10, 2)->default(0);
            $table->string('discount_type', 20)->nullable();
            $table->float('regular_price', 10, 2)->default(0)->index();
            $table->float('min_price', 10, 2)->default(0);
            $table->float('max_price', 10, 2)->default(0);
            $table->timestamp('offer_start_date')->nullable();
            $table->timestamp('offer_end_date')->nullable();
            $table->integer('min_order_quantity')->default(1);
            $table->integer('max_order_quantity')->nullable();
            $table->string('weight_unit', 100)->nullable();
            $table->string('weight_amount', 50)->nullable();
            $table->string('dimensions_unit', 100)->nullable();
            $table->string('dimensions_length', 50)->nullable();
            $table->string('dimensions_width', 50)->nullable();
            $table->string('dimensions_height', 50)->nullable();
            $table->text('warranty_note')->nullable();
            $table->float('warranty_charge', 10, 2)->default(0);
            $table->string('warranty_note2', 100)->nullable();
            $table->float('warranty_charge2', 10, 2)->default(0);
            $table->boolean('variation_status')->default(0);
            $table->boolean('pos_status')->default(0);
            $table->boolean('emi_status')->default(0);
            $table->boolean('digital_status')->default(0);
            $table->boolean('classified_status')->default(0);
            $table->string('product_source', 50)->nullable();
            $table->integer('brand_id')->nullable()->index();
            $table->integer('country_id')->nullable()->index('posts_country_id_index');
            $table->integer('subbrand_id')->nullable();
            $table->integer('sell_count')->default(0);
            $table->integer('branch_count')->default(0);
            $table->boolean('product_type')->default(0);
            $table->text('tags')->nullable();
            $table->unsignedBigInteger('view')->default(0);
            $table->integer('type')->default(0)->comment('0=Page,1=Post, 2=Product');
            $table->string('seo_title', 191)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->string('template', 100)->nullable();
            $table->text('search_key')->nullable();
            $table->string('status', 10)->default('temp')->comment('temp,active,inactive');
            $table->boolean('new_arrival')->default(0);
            $table->boolean('fetured')->default(0);
            $table->boolean('up_coming')->default(0);
            $table->bigInteger('addedby_id')->nullable();
            $table->bigInteger('editedby_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
