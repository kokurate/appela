<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
              // Foreign Key 
              $table->string('token')->unique()->nullable();
              $table->foreignId('tujuan_id')->nullable();
              // $table->foreignId('user_id');
              // Timestamp untuk bking waktu dia buat pengaduan
              $table->timestamp('published_at')->nullable();
              $table->string('kode')->unique()->nullable();
              $table->string('nama')->nullable();
              $table->string('email')->unique()->nullable();
              $table->string('status')->nullable();
              $table->string('judul')->nullable();
              $table->text('isi')->nullable();
              $table->string('visitor_image_1')->nullable();
              $table->string('visitor_image_2')->nullable();
              $table->string('visitor_image_3')->nullable();
              $table->text('keterangan')->nullable();
              $table->text('petugas_image_1')->nullable();
              $table->text('petugas_image_2')->nullable();
              $table->text('petugas_image_3')->nullable();
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
        Schema::dropIfExists('pengaduans');
    }
}
