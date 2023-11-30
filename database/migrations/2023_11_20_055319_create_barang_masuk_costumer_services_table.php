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
            $table->string('no_order')->nullable();
            $table->string('no_nota')->nullable();
            $table->foreignId('barang_masuk_disainer_id')->constrained('barang_masuk_disainers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disainer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cs_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('layout_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_mesin')->nullable();
            $table->string('file_baju')->nullable();
            $table->string('file_celana')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('status_produksi')->nullable();
            $table->date('deadline')->nullable();
            $table->string('jenis_produksi')->nullable();
            $table->string('jenis_kerah')->nullable();
            $table->string('pola')->nullable();
            $table->string('jumlah_baju')->nullable();
            $table->string('jenis_sablon_baju')->nullable();
            $table->string('jenis_kain_baju')->nullable();
            $table->string('jumlah_celana')->nullable();
            $table->string('jenis_sablon_celana')->nullable();
            $table->string('jenis_kain_celana')->nullable();
            $table->string('list_data')->nullable();
            $table->string('aksi')->default('0');
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
        Schema::dropIfExists('barang_masuk_costumer_services');
    }
};
