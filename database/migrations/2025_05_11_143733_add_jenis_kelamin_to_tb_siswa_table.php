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
            $table->string('jenis_kelamin', 10)->nullable()->after('NIK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_siswa', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
};
