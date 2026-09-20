<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_attribute_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('src_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('attribute_id')->nullable();
            $table->integer('attribute_item_id')->nullable();
            $table->string('attribute_item_value', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_attribute_variations');
    }
};
