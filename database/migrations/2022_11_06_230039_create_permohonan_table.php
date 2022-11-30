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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('jenis');
            $table->string('catatan')->nullable();
            $table->string('file_hasil_legalisir')->nullable();
            $table->string('file_permohonan')->nullable();
            $table->string('file_eselon')->nullable();
            $table->string('file_pusdiklat')->nullable();
            $table->string('file_kampusln')->nullable();
            $table->string('file_kuasa')->nullable();
            $table->enum('pengambilan', ['1', '2', '3', '4']);
            $table->string('alamat_pengambilan')->nullable();
            $table->string('email_pengambilan')->nullable();
            $table->string('resi')->nullable();
            // $table->string('status'); // status pakai enum
            $table->enum('status', ['Menunggu', 'Disetujui Petugas BAAK', 'Ditolak Petugas BAAK', 'Disetujui Kepala BAAK', 'Disetujui Wakil Direktur 1', 'Ditolak Kepala BAAK', 'Ditolak Wakil Direktur 1', 'Selesai'])->default('Menunggu');
            $table->string('alasan_tolak')->nullable();
            $table->string('file_legalisir')->nullable();
            $table->timestamps();
            $table->timestamp('time_petugas_baak')->nullable();
            $table->timestamp('time_kepala_baak')->nullable();
            $table->timestamp('time_wadir_1')->nullable();
            $table->timestamp('time_tolak')->nullable();
            $table->timestamp('time_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan');
    }
};
