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
        Schema::create('tb_dokumen_ptk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ptk')
             ->index()
             ->nullable()
             ->constrained('tb_ptk')
             ->onDelete('set null')->onUpdate('cascade');
            $table->string('jenis_file');
            $table->string('nama_file');
            $table->string('nama_asli_file');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokumen_ptk');
    }
};
