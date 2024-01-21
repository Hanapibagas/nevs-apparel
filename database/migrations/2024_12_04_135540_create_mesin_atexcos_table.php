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
        Schema::create('mesin_atexcos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_masuk_disainer_id')->nullable()->constrained('barang_masuk_costumer_services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('barang_masuk_layout_id')->nullable()->constrained('barang_masuk_datalayouts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('deadline')->nullable();
            $table->string('nama_mesin')->nullable();
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
        Schema::dropIfExists('mesin_atexcos');
    }
};
