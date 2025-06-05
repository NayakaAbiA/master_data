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
        Schema::table('tb_siswa', function (Blueprint $table) {
            $table->foreignId('id_sekolah_asal')
             ->after('id_kebkhusus')
             ->index()
             ->nullable()
             ->constrained('tb_sekolah')
             ->onDelete('set null')->onUpdate('cascade');
            $table->string('dusun')->after('RW');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_siswa', function (Blueprint $table) {
            //
        });
    }
};
