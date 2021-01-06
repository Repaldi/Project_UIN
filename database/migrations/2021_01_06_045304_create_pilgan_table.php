<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilgan', function (Blueprint $table) {
            $table->id();
            $table->integer('poin');
            $table->text('pertanyaan');
            $table->string('pil_a');
            $table->string('pil_b');
            $table->string('pil_c');
            $table->string('pil_d');
            $table->string('pil_e');
            $table->string('foto');
            $table->string('kunci');
            
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
        Schema::dropIfExists('pilgan');
    }
}
