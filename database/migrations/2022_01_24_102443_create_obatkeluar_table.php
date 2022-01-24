<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatkeluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')->constrained('obatstok')->onDelete('cascade');
            $table->date('tgl_keluar');
            $table->string('nik');
            $table->string('nama_pasien');
            $table->string('jmlh_keluar');
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
        Schema::dropIfExists('obatkeluar');
    }
}
