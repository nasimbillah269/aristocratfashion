<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emi_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name', 200)->nullable();
            $table->float('month_3', 10, 2)->default(0);
            $table->float('month_6', 10, 2)->default(0);
            $table->float('month_9', 10, 2)->default(0);
            $table->float('month_12', 10, 2)->default(0);
            $table->float('month_18', 10, 2)->default(0);
            $table->float('month_24', 10, 2)->default(0);
            $table->float('month_36', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emi_charges');
    }
};
