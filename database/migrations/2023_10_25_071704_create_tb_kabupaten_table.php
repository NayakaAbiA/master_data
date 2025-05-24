<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kabupaten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_provinsi')
                ->index()
                ->references('id')
                ->on('tb_provinsi');
            $table->string('kabupaten');
            $table->string('ibu_kota')->nullable();
            $table->string('k_bsni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kabupaten');
    }
};
