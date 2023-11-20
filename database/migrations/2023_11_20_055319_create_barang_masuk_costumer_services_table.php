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
        Schema::create('barang_masuk_costumer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_masuk_disainer_id')->constrained('barang_masuk_disainers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disainer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cs_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_mesin')->nullable();
            $table->string('file_corel')->nullable();
            $table->string('status_produksi')->nullable();
            $table->string('deadline')->nullable();
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
        Schema::dropIfExists('barang_masuk_costumer_services');
    }
};
