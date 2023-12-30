<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('kode_matkul');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruangan');
            $table->timestamps();

            $table->foreign('kode_matkul')->references('kode_matkul')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
};
