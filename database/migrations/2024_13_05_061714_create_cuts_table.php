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
        Schema::create('cuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_order_id')->nullable()->constrained('barang_masuk_costumer_services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penanggung_jawab_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('press_kain_id')->nullable()->constrained('data_press_kains')->onUpdate('cascade')->onDelete('cascade');
            $table->string('deadline')->nullable();
            $table->string('selesai')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('cuts');
    }
};
