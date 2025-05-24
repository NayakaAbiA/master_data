<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_ptk', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->string('NIK',17);
            $table->string('NIP',18)->nullable();
            $table->string('NUPTK')->nullable();
            $table->string('jenis_kelamin',10);
            $table->string('tempat_lahir',30);
            $table->date('tgl_lahir');
            $table->foreignId('id_stat_peg')
            ->index()
            ->nullable()
            ->constrained('tb_stat_pegawai')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreignId('id_jns_ptk')
            ->index()
            ->nullable()
            ->constrained('tb_jnsptk')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreignId('id_agama')
            ->index()
            ->nullable()
            ->constrained('tb_agama')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('Jalan', 40);
            $table->string('No_rumah',4);
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
            $table->string('no_telepon',15)->nullable();
            $table->string('hp',15);
            $table->string('email',50);
            $table->string('lintang',50)->nullable();
            $table->string('bujur',50)->nullable();

            $table->foreignId('id_tgstambahan')
            ->index()
            ->nullable()
            ->constrained('tb_tgstambahan')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('no_sk_cpns',25)->nullable();
            $table->Date('tgl_sk_cpns')->nullable();
            $table->string('no_sk_pengangkatan',25)->nullable();
            $table->Date('tmt_pengangkatan')->nullable();
            $table->string('lembaga_pengangkatan',20)->nullable();

            $table->foreignId('id_pangkat')
            ->index()
            ->nullable()
            ->constrained('tb_pangkat')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreignId('id_sumber_gaji')
            ->index()
            ->nullable()
            ->constrained('tb_sumber_gaji')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('nama_ibu_kandung',50);

            $table->foreignId('id_statkawin')
            ->index()
            ->nullable()
            ->constrained('tb_statkawin')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('nama_pasangan',50)->nullable();
            $table->string('nip_pasangan',18)->nullable();

            $table->foreignId('id_pekerjaan_pasangan')
            ->index()
            ->nullable()
            ->constrained('tb_pekerjaan')
            ->onDelete('set null')->onUpdate('cascade');

            $table->boolean('lisensi_kepsek');
            $table->boolean('diklat_pengawas');
            $table->boolean('keahlian_braille');
            $table->boolean('keahlian_bahasa_isyarat');

            $table->string('no_npwp',25)->nullable();
            $table->string('nama_wajib_pajak',50);
            $table->string('kewarganegaraan',25);

            $table->foreignId('id_bank')
            ->index()
            ->nullable()
            ->constrained('tb_bank')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('no_rek_bank',50);
            $table->string('rek_atas_nama',100);
            $table->string('no_kk',17);
            $table->string('no_karpeg',8)->unique()->nullable();
            $table->string('no_karis_karsu',11)->nullable();
            $table->string('nuks',15)->unique()->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ptk');
    }
};
