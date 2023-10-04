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
        Schema::create('contact_models', function (Blueprint $table) {
            $table->id();
            $table->string('name_school');
            $table->string('logo');
            $table->string('bg');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook');
            $table->string('whatsapp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_models');
    }
};
