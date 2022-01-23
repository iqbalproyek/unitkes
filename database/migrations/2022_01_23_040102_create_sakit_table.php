<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_surat')->constrained('surat')->onDelete('cascade');
            $table->string('nim');
            $table->string('nama');
            $table->string('umur');
            $table->string('unit');
            $table->date('mulai_tgl');
            $table->date('akhir_tgl');
            $table->string('total_izin');
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
        Schema::dropIfExists('sakit');
    }
}
