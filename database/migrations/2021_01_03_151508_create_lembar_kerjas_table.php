<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembarKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembar_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('jam');
            $table->string('kegiatan');
            $table->enum('jenis',['utama','pendukung']);
            $table->boolean('verified');
            $table->string('catatan');
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
        Schema::dropIfExists('lembar_kerjas');
    }
}
