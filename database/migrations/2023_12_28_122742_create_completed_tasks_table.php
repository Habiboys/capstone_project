<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('completed_tasks', function (Blueprint $table) {
            $table->increments('id_completed');
            $table->integer('id_tugas')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->timestamps();

            $table->foreign('id_tugas')->references('id_tugas')->on('tugas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('completed_tasks');
    }
};
