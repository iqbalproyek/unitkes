<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSehatdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sehatdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sehat')->constrained('sehat')->onDelete('cascade');
            $table->string('tinggi');
            $table->string('berat');
            $table->string('tekanan_darah');
            $table->string('gol_darah');
            $table->string('buta_warna');
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
        Schema::dropIfExists('sehatdetail');
    }
}
