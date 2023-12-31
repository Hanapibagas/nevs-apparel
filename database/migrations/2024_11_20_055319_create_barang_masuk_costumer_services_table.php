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
            $table->string('kota_produksi')->nullable();
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

            // ukuran player
            $table->string('file_baju_player')->nullable();
            $table->string('jenis_sablon_baju_player')->nullable();
            $table->foreignId('kera_baju_player_id')->nullable()->constrained('kera_bajus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pola_lengan_player_id')->nullable()->constrained('pola_lengans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_baju_player')->nullable();
            $table->string('ket_kumis_baju_player')->nullable();
            $table->string('ket_bantalan_baju_player')->nullable();
            $table->string('ket_celana_player')->nullable();
            $table->string('ket_tambahan_baju_player')->nullable();
            $table->longText('keterangan_baju_pelayer')->nullable();

            // ukuran pelatih
            $table->string('file_baju_pelatih')->nullable();
            $table->string('jenis_sablon_baju_pelatih')->nullable();
            $table->foreignId('kerah_baju_pelatih_id')->nullable()->constrained('kera_bajus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pola_lengan_pelatih_id')->nullable()->constrained('pola_lengans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_baju_pelatih')->nullable();
            $table->string('ket_kumis_baju_pelatih')->nullable();
            $table->string('ket_bantalan_baju_pelatih')->nullable();
            $table->string('ket_celana_pelatih')->nullable();
            $table->string('ket_tambahan_baju_pelatih')->nullable();
            $table->longText('keterangan_baju_pelatih')->nullable();

            // ukuran kiper
            $table->string('file_baju_kiper')->nullable();
            $table->string('jenis_sablon_baju_kiper')->nullable();
            $table->foreignId('kerah_baju_kiper_id')->nullable()->constrained('kera_bajus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pola_lengan_kiper_id')->nullable()->constrained('pola_lengans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_baju_kiper')->nullable();
            $table->string('ket_kumis_baju_kiper')->nullable();
            $table->string('ket_bantalan_baju_kiper')->nullable();
            $table->string('ket_celana_kiper')->nullable();
            $table->string('ket_tambahan_baju_kiper')->nullable();
            $table->longText('keterangan_baju_kiper')->nullable();

            // ukuran 1
            $table->string('file_baju_1')->nullable();
            $table->string('jenis_sablon_baju_1')->nullable();
            $table->foreignId('kerah_baju_1_id')->nullable()->constrained('kera_bajus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pola_lengan_1_id')->nullable()->constrained('pola_lengans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_baju_1')->nullable();
            $table->string('ket_kumis_baju_1')->nullable();
            $table->string('ket_bantalan_baju_1')->nullable();
            $table->string('ket_celana_1')->nullable();
            $table->string('ket_tambahan_baju_1')->nullable();
            $table->longText('keterangan_baju_1')->nullable();

            // ukuran player
            $table->string('file_celana_player')->nullable();
            $table->string('jenis_sablon_celana_player')->nullable();
            $table->foreignId('pola_celana_player_id')->nullable()->constrained('pola_celeanas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_celana_player')->nullable();
            $table->string('ket_warna_kain_celana_player')->nullable();
            $table->string('ket_bis_celana_celana_player')->nullable();
            $table->string('ket_tambahan_celana_player')->nullable();
            $table->longText('keterangan_celana_pelayer')->nullable();

            //  ukuran pelatih
            $table->string('file_celana_pelatih')->nullable();
            $table->string('jenis_sablon_celana_pelatih')->nullable();
            $table->foreignId('pola_celana_pelatih_id')->nullable()->constrained('pola_celeanas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_celana_pelatih')->nullable();
            $table->string('ket_warna_kain_celana_pelatih')->nullable();
            $table->string('ket_bis_celana_celana_pelatih')->nullable();
            $table->string('ket_tambahan_celana_pelatih')->nullable();
            $table->longText('keterangan_celana_pelatih')->nullable();

            // ukuran kiper
            $table->string('file_celana_kiper')->nullable();
            $table->string('jenis_sablon_celana_kiper')->nullable();
            $table->foreignId('pola_celana_kiper_id')->nullable()->constrained('pola_celeanas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_celana_kiper')->nullable();
            $table->string('ket_warna_kain_celana_kiper')->nullable();
            $table->string('ket_bis_celana_celana_kiper')->nullable();
            $table->string('ket_tambahan_celana_kiper')->nullable();
            $table->longText('keterangan_celana_kiper')->nullable();

            // ukuran 1
            $table->string('file_celana_1')->nullable();
            $table->string('jenis_sablon_celana_1')->nullable();
            $table->foreignId('pola_celana_1_id')->nullable()->constrained('pola_celeanas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kain_celana_1')->nullable();
            $table->string('ket_warna_kain_celana_1')->nullable();
            $table->string('ket_bis_celana_celana_1')->nullable();
            $table->string('ket_tambahan_celana_1')->nullable();
            $table->longText('keterangan_celana_1')->nullable();

            $table->longText('keterangan_lengkap')->nullable();

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
