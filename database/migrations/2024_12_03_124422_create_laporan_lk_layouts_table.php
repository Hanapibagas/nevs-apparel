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
        Schema::create('laporan_lk_layouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_layout_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('no_order_id')->nullable()->constrained('barang_masuk_costumer_services')->onUpdate('cascade')->onDelete('cascade');
            $table->string('panjang_kertas')->nullable();
            $table->string('file_corel_layout')->nullable();
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
        Schema::dropIfExists('laporan_lk_layouts');
    }
};
