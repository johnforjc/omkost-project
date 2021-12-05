<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklist', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('identitas');
            $table->string('nama');
            $table->string('telp');
            $table->string('keterangan');
            $table->string('bukti');
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
        Schema::dropIfExists('blacklist');
    }
}
