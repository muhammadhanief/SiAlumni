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
            $table->string('file_permohonan')->nullable();
            $table->string('file_eselon')->nullable();
            $table->string('file_pusdiklat')->nullable();
            $table->string('file_kampusln')->nullable();
            $table->string('file_kuasa')->nullable();
            $table->enum('pengambilan', ['1', '2', '3', '4']);
            $table->string('alamat_pengambilan')->nullable();
            $table->string('email_pengambilan')->nullable();
            $table->string('status'); // status pakai enum
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
        Schema::dropIfExists('permohonan');
    }
};
