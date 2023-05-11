<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->foreignId('kategori_id');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_kategori');
    }
}
