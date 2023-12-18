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
            $table->foreignId('barang_masuk_disainer_id')->constrained('barang_masuk_disainers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cs_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disainer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_mesin')->nullable();
            $table->string('tanggal_jahit')->nullable();
            $table->string('nama_penjahit')->nullable();
            $table->string('no_nota')->nullable();

            $table->foreignId('layout_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_produksi')->nullable();
            $table->string('pola')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('deadline')->nullable();

            $table->string('jumlah_baju')->nullable();
            $table->string('jenis_sablon_baju')->nullable();
            $table->foreignId('jenis_kerah_baju_id')->nullable()->constrained('kera_bajus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jenis_pola_lengan_id')->nullable()->constrained('pola_lengans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_baju')->nullable();
            $table->string('ket_kumis_baju')->nullable();
            $table->string('ket_bantalan_baju')->nullable();
            $table->string('ket_celana')->nullable();
            $table->string('ket_tambahan_baju')->nullable();
            $table->string('file_baju_player')->nullable();
            $table->string('file_baju_pelatih')->nullable();
            $table->string('file_baju_kiper')->nullable();

            $table->string('jumlah_celana')->nullable();
            $table->string('jenis_sablon_celana')->nullable();
            $table->foreignId('jenis_pola_celana_id')->nullable()->constrained('pola_celeanas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_celana')->nullable();
            $table->string('ket_warna_kain_celana')->nullable();
            $table->string('ket_bis_celana_celana')->nullable();
            $table->string('ket_tambahan_celana')->nullable();
            $table->string('file_celana_player')->nullable();
            $table->string('file_celana_pelatih')->nullable();
            $table->string('file_celana_kiper')->nullable();

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
