<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_identities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->nullable()->unique('social_identities_provider_id_unique');
            $table->string('provider_token')->nullable()->unique('social_identities_provider_token_unique');
            $table->string('provider_img_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_identities');
    }
};
