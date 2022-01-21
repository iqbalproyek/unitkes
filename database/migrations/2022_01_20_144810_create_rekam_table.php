<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rekam')->constrained('periksa')->onDelete('cascade');
            $table->string('keluhan')->default('-');
            $table->string('alergi')->default('-');
            $table->string('pemeriksaan')->default('-');
            $table->string('tindakan')->default('-');
            $table->string('terapi')->default('-');
            $table->string('foto')->default('-');
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
        Schema::dropIfExists('rekam');
    }
}
