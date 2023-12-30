<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->increments('id_informasi');
            $table->date('tanggal');
            $table->string('title');
            $table->longText('isi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
};
