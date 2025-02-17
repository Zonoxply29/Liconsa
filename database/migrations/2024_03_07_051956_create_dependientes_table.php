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
        Schema::create('dependientes', function (Blueprint $table) {
            $table->id();
            $table->string('curp',18)->unique();
            $table->integer('code'); // Cambiado a unsignedBigInteger
            $table->unsignedBigInteger('beneficiario_id'); // Cambiado a unsignedBigInteger
            $table->timestamps();
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependientes');
    }
};
