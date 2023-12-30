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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_matkul')->primary();
            $table->string('nama');
            $table->integer('semester');
            $table->integer('sks');
            $table->string('dosen_pengampu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
