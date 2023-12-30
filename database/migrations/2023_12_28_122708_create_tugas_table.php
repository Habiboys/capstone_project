<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id_tugas');
            $table->string('nama');
            $table->string('kode_matkul');
            $table->longText('instruksi');
            $table->date('deadline');
            $table->timestamps();

            $table->foreign('kode_matkul')->references('kode_matkul')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};
