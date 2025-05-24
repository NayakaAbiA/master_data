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
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->string('nipd',10);
            $table->string('nisn',11);

            $table->foreignId('id_jur')
            ->index()
            ->nullable()
            ->constrained('tb_jurusan')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreignId('id_rombel')
            ->index()
            ->nullable()
            ->references('id')
            ->on('tb_rombel')
            ->onDelete('set null')->onUpdate('cascade');



            $table->string('tempat_lahir',30);
            $table->date('tgl_lahir');
            $table->string('NIK',17);
            $table->string('no_kk',17);
            $table->string('no_reg_aktlhr',25)->nullable();

            $table->foreignId('id_agama')
            ->index()
            ->nullable()
            ->constrained('tb_agama')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('npsn', 12)
             ->index()
            ->nullable();

            $table->foreign('npsn')
            ->references('npsn')
            ->on('tb_sekolah')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->integer('anak_ke');
            $table->integer('jml_saudara_kandung')->nullable();
            $table->integer('jrk_rumah_sekolah');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan',);
            $table->integer('lingkar_kepala');

          //  Alamat siswa
            $table->string('Jalan', 40);
            $table->string('no_rumah',4);
            $table->string('RT',4);
            $table->string('RW',4);

             $table->foreignId('id_provinsi')
             ->index()
             ->nullable();

             $table->foreignId('id_kabupaten')
             ->index()
             ->nullable();

             $table->foreignId('id_kecamatan')
             ->index()
             ->nullable();

             $table->foreignId('id_kelurahan')
             ->index()
             ->nullable();

            $table->string('kode_pos',5);

             $table->foreignId('id_jns_tgl')
             ->index()
             ->nullable()
             ->constrained('tb_jnstinggal')
             ->onDelete('set null')->onUpdate('cascade');

            // Transportasi
             $table->foreignId('id_transport')
             ->index()
             ->nullable()
             ->constrained('tb_transport')
             ->onDelete('set null')->onUpdate('cascade');

            $table->string('no_telepon',15)->nullable();
            $table->string('hp',15);
            $table->string('lintang',50)->nullable();
            $table->string('bujur',50)->nullable();
            $table->string('email',50);

            $table->string('no_skhun',35)->nullable();

           // Data Ayah
            $table->string('nama_ayah',100);
            $table->string('nik_ayah',17);
            $table->integer('thn_lahir_ayah');

             $table->foreignId('id_pendidikan_ayah')
             ->index()
             ->nullable()
             ->constrained('tb_pendidikan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_kerja_ayah')
             ->index()
             ->nullable()
             ->constrained('tb_pekerjaan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_penghasilan_ayah')
             ->index()
             ->nullable()
             ->constrained('tb_penghasilan')
             ->onDelete('set null')->onUpdate('cascade');

           // data ibu
            $table->string('nama_ibu',100);
            $table->string('nik_ibu',17);
            $table->integer('thn_lahir_ibu');

             $table->foreignId('id_pendidikan_ibu')
             ->index()
             ->nullable()
             ->constrained('tb_pendidikan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_kerja_ibu')
             ->index()
             ->nullable()
             ->constrained('tb_pekerjaan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_penghasilan_ibu')
             ->index()
             ->nullable()
             ->constrained('tb_penghasilan')
             ->onDelete('set null')->onUpdate('cascade');

           // data Wali
            $table->string('nama_wali',100);
            $table->string('nik_wali',17);
            $table->integer('thn_lahir_wali');

             $table->foreignId('id_pendidikan_wali')
             ->index()
             ->nullable()
             ->constrained('tb_pendidikan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_kerja_wali')
             ->index()
             ->nullable()
             ->constrained('tb_pekerjaan')
             ->onDelete('set null')->onUpdate('cascade');

             $table->foreignId('id_penghasilan_wali')
             ->index()
             ->nullable()
             ->constrained('tb_penghasilan')
             ->onDelete('set null')->onUpdate('cascade');

            $table->string('nopes_un',35);
            $table->string('no_seri_ijazah',35)->nullable();

           // Kartu Bantuan
             $table->foreignId('id_krt_bantuan')
             ->index()
             ->nullable()
             ->constrained('tb_krtbantuan')
             ->onDelete('set null')->onUpdate('cascade');
             $table->string('nama_pada_kartu',35);

             $table->foreignId('id_bank')
             ->index()
             ->nullable()
             ->constrained('tb_bank')
             ->onDelete('set null')->onUpdate('cascade');

            $table->string('no_rek_bank',50)->nullable();
            $table->string('rek_atas_nama',100)->nullable();

           //  Program Bantuan
            $table->boolean('layak_bantuan');
             $table->foreignId('id_prgbantuan')
             ->index()
             ->nullable()
             ->constrained('tb_prgbantuan')
             ->onDelete('set null')->onUpdate('cascade');
             $table->string('alasan_layak',100);


             // Kebutuhan Khusus
             $table->foreignId('id_kebkhusus')
             ->index()
             ->nullable()
             ->constrained('tb_kebkhusus')
             ->onDelete('set null')->onUpdate('cascade');

          //  status siswa
            $table->string('Stat_siswa',20);
            $table->boolean('pindahan');
            $table->string('kewarganegaraan',25);




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_siswa');
    }
};
