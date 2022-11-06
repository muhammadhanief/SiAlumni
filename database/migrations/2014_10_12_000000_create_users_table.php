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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('nim')->nullable();
            $table->enum('jurusan', ['D-IV Komputasi Statistik', 'D-IV Statistika', 'D-III Statistika'])->nullable();
            $table->string('tahunLulus')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('nomorPonsel')->nullable();
            $table->string('jenisKelamin')->nullable();
            // $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan'])->default('Pending');
            $table->string('email')->unique();
            $table->string('skpenempatan1bps');
            $table->string('skatasanbps')->nullable();
            $table->string('password')->nullable();
            $table->enum('statusAkun', ['Pending', 'Ditolak', 'Lolos'])->default('Pending');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};