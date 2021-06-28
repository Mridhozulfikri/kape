<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangmasuk', function (Blueprint $table) {
            $table->integer('id')->autoincrement();
            $table->char('kode_barang',20);
            $table->char('nama_barang',50);
            $table->integer('qty');
            $table->float('harga_satuan');
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
        Schema::dropIfExists('barangmasuk');
    }
}
