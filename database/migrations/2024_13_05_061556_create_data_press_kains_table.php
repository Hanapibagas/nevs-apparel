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
        Schema::create('data_press_kains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_order_id')->nullable()->constrained('barang_masuk_costumer_services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penanggung_jawab_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mesin_atexco_id')->nullable()->constrained('mesin_atexcos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mesin_mimaki_id')->nullable()->constrained('mesin_mimakis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('deadline')->nullable();
            $table->string('selesai')->nullable();
            $table->string('kain')->nullable();
            $table->string('berat')->nullable();
            $table->string('gambar')->nullable();
            $table->string('tanda_telah_mengerjakan')->default('0');
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
        Schema::dropIfExists('data_press_kains');
    }
};
