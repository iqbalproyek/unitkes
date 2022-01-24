<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatmasuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')->constrained('obatstok')->onDelete('cascade');
            $table->date('tgl_masuk');
            $table->string('jmlh_masuk');
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
        Schema::dropIfExists('obatmasuk');
    }
}
