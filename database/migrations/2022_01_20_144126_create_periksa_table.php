<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('t_badan');
            $table->string('b_badan');
            $table->string('tekanan_darah');
            $table->string('tekanan_darah2');
            $table->string('pulse');
            $table->string('hemoglobin');
            $table->string('asam_urat');
            $table->string('gula_darah');
            $table->string('kolesterol');
            $table->string('saturasi');
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
        Schema::dropIfExists('periksa');
    }
}
