<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatihanJawabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latihan_jawab', function (Blueprint $table) {
            $table->id();
            $table->integer('latihan_siswa_id');
            $table->integer('pilgan_id');
            $table->integer('user_id');
            $table->char('jawaban')->nullable();
            $table->char('status')->nullable();
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
        Schema::dropIfExists('latihan_jawab');
    }
}
