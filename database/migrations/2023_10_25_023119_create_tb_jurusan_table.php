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
        Schema::create('tb_jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jur',40);

            $table->foreignId('id_ptk_kakom')
            ->index()
            ->nullable()
            ->constrained('tb_ptk')
            ->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jurusan');
    }
};
