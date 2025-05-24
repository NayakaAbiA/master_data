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
        Schema::create('tb_krtbantuan', function (Blueprint $table) {
            $table->id();
            $table->string('no_krtbantuan',15)->unique();
            $table->string('nama_krtbantuan',15);
            $table->string('nama_pdkrt',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_krtbantuan');
    }
};
