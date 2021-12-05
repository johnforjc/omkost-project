<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('kota');
            $table->string('nama');
            $table->string('telp');
            $table->string('alamat');
            $table->string('keterangan');
            $table->string('submit_by');
            $table->timestamp('submit_at')->nullable();
            $table->string('validate_by');
            $table->timestamp('validate_at')->nullable();
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
        Schema::dropIfExists('tokos');
    }
}
