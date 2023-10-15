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
        Schema::create('berkas_tas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('kategori');
            $table->string('laporan_ta');
            $table->string('dokumen_penunjang');
            $table->string('file_presentasi');
            $table->string('product');
            $table->string('haki');
            $table->string('video_trailer');
            $table->string('poster');
            $table->string('artikel_jurnal');
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
        Schema::dropIfExists('berkas_tas');
    }
};
