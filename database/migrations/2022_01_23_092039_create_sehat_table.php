<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSehatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sehat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_surat')->constrained('surat')->onDelete('cascade');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('ttl');
            $table->string('pekerjaan');
            $table->string('untuk');
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
        Schema::dropIfExists('sehat');
    }
}
