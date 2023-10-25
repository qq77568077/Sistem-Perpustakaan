<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jilid_laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama');
            $table->biginteger('page_berwarna');
            $table->biginteger('page_hitamPutih');
            $table->biginteger('exemplar');
            $table->biginteger('cover');
            $table->biginteger('total');
            $table->string('bukti_pembayaran');
            $table->string('file');
            $table->string('status');
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
        Schema::dropIfExists('jilid_laporans');
    }
};
