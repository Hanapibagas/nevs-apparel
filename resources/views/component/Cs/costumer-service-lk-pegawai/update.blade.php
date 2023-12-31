@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> <span class="text-muted fw-light"><a
                href="{{ route('getIndexLkCsPegawai') }}" style="color: inherit">Data LK</a></span>/ Update data LK</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Input </span>Data Order</h4>
                    <form action="{{ route('putDataLkPegawai', $oderCs->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">No. Order</label>
                                                <input class="form-control" type="text" id="firstName" name="no_order"
                                                    value="{{ $oderCs->no_order }}" readonly autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Tim</label>
                                                <input class="form-control" type="text" name="nama_tim" id="lastName"
                                                    value="{{ $oderCs->BarangMasukDisainer->nama_tim }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Costumer Service</label>
                                                <input class="form-control" type="text" name="costumer_service"
                                                    id="lastName" value="{{ $oderCs->UsersOrder->name }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="country">Desainer</label>
                                                <input class="form-control" type="text" name="costumer_service"
                                                    id="lastName" value="{{ $oderCs->Users->name }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Jenis Mesin</label>
                                                <input class="form-control" type="text" name="costumer_service"
                                                    id="lastName" value="{{ $oderCs->jenis_mesin }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Tanggal Jahit</label>
                                                <input class="form-control" type="date" name="tanggal_jahit"
                                                    id="lastName" value="{{ $oderCs->tanggal_jahit }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Penjahit</label>
                                                <input class="form-control" type="text" name="nama_penjahit"
                                                    id="lastName" value="{{ $oderCs->nama_penjahit }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">No. Nota</label>
                                                <input class="form-control" type="text" name="no_nota" id="lastName"
                                                    value="{{ $oderCs->no_nota }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Kota Produksi</label>
                                                <select id="country" name="kota_produksi" class="select2 form-select">
                                                    <option value="{{ $oderCs->kota_produksi }}">Di prosuksi di kota {{
                                                        $oderCs->kota_produksi }}</option>
                                                    <option value="">-- Kota Produksi --</option>
                                                    <option value="Makassar">Makassar</option>
                                                    <option value="Jakarta">Jakarta</option>
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Bandung">Bandung</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Produksi</h4>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pembagian
                                                                Layout</label>
                                                            <select id="country" name="layout_id"
                                                                class="select2 form-select">
                                                                <option value="{{
                                                                    $oderCs->UsersLk->id }}">Layout saat ini {{
                                                                    $oderCs->UsersLk->name }}</option>
                                                                <option value="">-- Pilih Pembagian Layout --</option>
                                                                @foreach ( $users as $user )
                                                                <option value="{{ $user->id }}">
                                                                    {{ $user->name }} sedang menangani LK {{
                                                                    isset($userCounts[$user->id]) ?
                                                                    $userCounts[$user->id]
                                                                    : 0}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis
                                                                Produksi</label>
                                                            <select id="country" name="jenis_produksi"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_produksi }}">Jenis
                                                                    produksi saat ini
                                                                    {{ $oderCs->jenis_produksi }}</option>
                                                                <option value="">-- Pilih Produksi --</option>
                                                                <option value="Futsal">Futsal</option>
                                                                <option value="Bola">Bola</option>
                                                                <option value="Basket">Basket</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola</label>
                                                            <select id="country" name="pola"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->pola }}">Jenis pola saat ini
                                                                    {{ $oderCs->pola }}</option>
                                                                <option value="">-- Pilih Pola --</option>
                                                                <option value="Ewako">Ewako</option>
                                                                <option value="Nevs">Nevs</option>
                                                                <option value="Enco">Enco</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="lastName" class="form-label">Waktu
                                                                Produksi</label>
                                                            <input class="form-control" type="date" name="deadline"
                                                                id="lastName" value="{{ $oderCs->deadline }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    @if ($oderCs->file_baju_1)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kera_baju_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{
                                                                    $oderCs->KeraPlayer->id }}">Jenis kerah saat ini {{
                                                                    $oderCs->KeraPlayer->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPlayer->id }}">Jenis
                                                                    lengan
                                                                    saat ini {{ $oderCs->LenganPlayer->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_player }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_player"
                                                                value="{{ $oderCs->ket_kumis_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_player"
                                                                value="{{ $oderCs->ket_bantalan_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_player"
                                                                value="{{ $oderCs->ket_celana_player }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelayer">{{ $oderCs->keterangan_baju_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kerah_baju_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->KeraPelatih->id }}">Jenis
                                                                    kera saat ini {{ $oderCs->KeraPelatih->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPelatih->id }}">Jenis
                                                                    lengan saat ini {{
                                                                    $oderCs->LenganPelatih->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_pelatih"
                                                                value="{{ $oderCs->ket_kumis_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_pelatih"
                                                                value="{{ $oderCs->ket_bantalan_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_pelatih"
                                                                value="{{ $oderCs->ket_celana_pelatih }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelatih">{{ $oderCs->keterangan_baju_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Kiper</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_kiper }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kerah_baju_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->KeraKiper->id }}">Jenis kera
                                                                    saat ini {{ $oderCs->KeraKiper->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganKiper->id }}">Jenis
                                                                    lengan saat ini {{ $oderCs->LenganKiper->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_kiper }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_kiper"
                                                                value="{{ $oderCs->ket_kumis_baju_kiper }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_kiper"
                                                                value="{{ $oderCs->ket_bantalan_baju_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_kiper"
                                                                value="{{ $oderCs->ket_celana_kiper }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_kiper"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_kiper }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_kiper">{{ $oderCs->keterangan_baju_kiper }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju 1</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_1"
                                                                class="select2 form-select">
                                                                <option value="{{ $odereCs->jenis_sablon_baju_1 }}">
                                                                    jenis sublim saat ini {{
                                                                    $odereCs->jenis_sablon_baju_1 }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="pola_lengan_1_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->Kera1->id }}">Jenis kera saat
                                                                    ini {{ $oderCs->Kera1->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="jenis_pola_lengan_1_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oder->Lengan1->jenis_kera }}">Jenis
                                                                    lengan saat ini {{ $oder->Lengan1->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_1"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_1 }}">Jenis
                                                                    kain saat ini {{ $oderCs->jenis_kain_baju_1 }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_1"
                                                                value="{{ $oderCs->ket_kumis_baju_1 }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_1"
                                                                value="{{ $oderCs->ket_bantalan_baju_1 }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_1" value="{{ $oderCs->ket_celana_1 }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_1"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_1 }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_1">{{ $orderCs->keterangan_baju_1 }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_baju_kiper)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kera_baju_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{
                                                                    $oderCs->KeraPlayer->id }}">Jenis kerah saat ini {{
                                                                    $oderCs->KeraPlayer->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPlayer->id }}">Jenis
                                                                    lengan
                                                                    saat ini {{ $oderCs->LenganPlayer->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_player }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_player"
                                                                value="{{ $oderCs->ket_kumis_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_player"
                                                                value="{{ $oderCs->ket_bantalan_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_player"
                                                                value="{{ $oderCs->ket_celana_player }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelayer">{{ $oderCs->keterangan_baju_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kerah_baju_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->KeraPelatih->id }}">Jenis
                                                                    kera saat ini {{ $oderCs->KeraPelatih->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPelatih->id }}">Jenis
                                                                    lengan saat ini {{
                                                                    $oderCs->LenganPelatih->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_pelatih"
                                                                value="{{ $oderCs->ket_kumis_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_pelatih"
                                                                value="{{ $oderCs->ket_bantalan_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_pelatih"
                                                                value="{{ $oderCs->ket_celana_pelatih }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelatih">{{ $oderCs->keterangan_baju_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Kiper</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_kiper }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kerah_baju_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->KeraKiper->id }}">Jenis kera
                                                                    saat ini {{ $oderCs->KeraKiper->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganKiper->id }}">Jenis
                                                                    lengan saat ini {{ $oderCs->LenganKiper->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_kiper }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_kiper"
                                                                value="{{ $oderCs->ket_kumis_baju_kiper }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_kiper"
                                                                value="{{ $oderCs->ket_bantalan_baju_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_kiper"
                                                                value="{{ $oderCs->ket_celana_kiper }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_kiper"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_kiper }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_kiper">{{ $oderCs->keterangan_baju_kiper }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_baju_pelatih)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kera_baju_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{
                                                                    $oderCs->KeraPlayer->id }}">Jenis kerah saat ini {{
                                                                    $oderCs->KeraPlayer->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPlayer->id }}">Jenis
                                                                    lengan
                                                                    saat ini {{ $oderCs->LenganPlayer->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_player }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_player"
                                                                value="{{ $oderCs->ket_kumis_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_player"
                                                                value="{{ $oderCs->ket_bantalan_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_player"
                                                                value="{{ $oderCs->ket_celana_player }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelayer">{{ $oderCs->keterangan_baju_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">Jenis sublin saat ini {{
                                                                    $oderCs->jenis_sablon_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kerah_baju_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->KeraPelatih->id }}">Jenis
                                                                    kera saat ini {{ $oderCs->KeraPelatih->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPelatih->id }}">Jenis
                                                                    lengan saat ini {{
                                                                    $oderCs->LenganPelatih->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_pelatih"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_pelatih"
                                                                value="{{ $oderCs->ket_kumis_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_pelatih"
                                                                value="{{ $oderCs->ket_bantalan_baju_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_pelatih"
                                                                value="{{ $oderCs->ket_celana_pelatih }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelatih">{{ $oderCs->keterangan_baju_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_baju_player)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Baju Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim</label>
                                                            <select id="country" name="jenis_sablon_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_baju_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kerah</label>
                                                            <select id="country" name="kera_baju_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{
                                                                    $oderCs->KeraPlayer->id }}">Jenis kerah saat ini {{
                                                                    $oderCs->KeraPlayer->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Kerah --</option>
                                                                @foreach ( $kera as $keras )
                                                                <option value="{{ $keras->id }}">{{ $keras->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Pola
                                                                Lengan</label>
                                                            <select id="country" name="pola_lengan_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->LenganPlayer->id }}">Jenis
                                                                    lengan
                                                                    saat ini {{ $oderCs->LenganPlayer->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                                @foreach ( $lengan as $lengans )
                                                                <option value="{{ $lengans->id }}">{{
                                                                    $lengans->jenis_kera
                                                                    }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain</label>
                                                            <select id="country" name="jenis_kain_baju_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_baju_player }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_baju_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Kumis</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_kumis_baju_player"
                                                                value="{{ $oderCs->ket_kumis_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Bantalan</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bantalan_baju_player"
                                                                value="{{ $oderCs->ket_bantalan_baju_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Celana</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_celana_player"
                                                                value="{{ $oderCs->ket_celana_player }}" autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket.
                                                                Tambahan</label>
                                                            <textarea name="ket_tambahan_baju_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_baju_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan ukuran
                                                                baju
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_baju_pelayer">{{ $oderCs->keterangan_baju_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    @if ($oderCs->file_celana_1)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                player</label>
                                                            <select id="country" name="jenis_sablon_celana_player"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                player</label>
                                                            <select id="country" name="pola_celana_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPlayer->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPlayer->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                player</label>
                                                            <select id="country" name="jenis_kain_celana_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_player }}">
                                                                    Jenis kain sat ini {{
                                                                    $oderCs->jenis_kain_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_player"
                                                                value="{{ $oderCs->ket_warna_kain_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_player"
                                                                value="{{ $oderCs->ket_bis_celana_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                player</label>
                                                            <textarea name="ket_tambahan_celana_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelayer">{{ $oderCs->keterangan_celana_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                pelatih</label>
                                                            <select id="country" name="jenis_sablon_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_pelatih }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                pelatih</label>
                                                            <select id="country" name="pola_celana_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPelatih->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPelatih->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                pelatih</label>
                                                            <select id="country" name="jenis_kain_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_kain_celana_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_pelatih"
                                                                value="{{ $oderCs->ket_warna_kain_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_pelatih"
                                                                value="{{ $oderCs->ket_bis_celana_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                pelatih</label>
                                                            <textarea name="ket_tambahan_celana_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                pelatih</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelatih"> {{
                                                                    $oderCs->keterangan_celana_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Kiper</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                kiper</label>
                                                            <select id="country" name="jenis_sablon_celana_kiper"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_kiper }}">
                                                                    Jenis subim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                kiper</label>
                                                            <select id="country" name="pola_celana_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaKiper->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaKiper->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                kiper</label>
                                                            <select id="country" name="jenis_kain_celana_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_kiper }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_celana_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain kiper</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_kiper"
                                                                value="{{ $oderCs->ket_warna_kain_celana_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana kiper</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_kiper"
                                                                value="{{ $oderCs->ket_bis_celana_celana_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                kiper</label>
                                                            <textarea name="ket_tambahan_celana_kiper"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_kiper }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player kiper</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_kiper">{{ $oderCs->keterangan_celana_kiper }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Player 1</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim player
                                                                1</label>
                                                            <select id="country" name="jenis_sablon_celana_1"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_sablon_celana_1 }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_1 }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana player
                                                                1</label>
                                                            <select id="country" name="pola_celana_1_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oerCs->Celana1->id }}">Jenis pola
                                                                    saat ini {{ $oerCs->Celana1->jenis_kera }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain player
                                                                1</label>
                                                            <select id="country" name="jenis_kain_celana_1"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_1 }}">Jenis
                                                                    kain saat ini {{ $oderCs->jenis_kain_celana_1 }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain player 1</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_1"
                                                                value="{{ $oderCs->ket_warna_kain_celana_1 }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana player 1</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_1"
                                                                value="{{ $oderCs->ket_bis_celana_celana_1 }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                player
                                                                1</label>
                                                            <textarea name="ket_tambahan_celana_1"
                                                                class="form-control">{{ $oderCS->ket_tambahan_celana_1 }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player 1</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_1">{{ $oderCs->keterangan_celana_1 }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_celana_kiper)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                player</label>
                                                            <select id="country" name="jenis_sablon_celana_player"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                player</label>
                                                            <select id="country" name="pola_celana_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPlayer->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPlayer->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                player</label>
                                                            <select id="country" name="jenis_kain_celana_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_player }}">
                                                                    Jenis kain sat ini {{
                                                                    $oderCs->jenis_kain_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_player"
                                                                value="{{ $oderCs->ket_warna_kain_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_player"
                                                                value="{{ $oderCs->ket_bis_celana_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                player</label>
                                                            <textarea name="ket_tambahan_celana_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelayer">{{ $oderCs->keterangan_celana_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                pelatih</label>
                                                            <select id="country" name="jenis_sablon_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_pelatih }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                pelatih</label>
                                                            <select id="country" name="pola_celana_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPelatih->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPelatih->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                pelatih</label>
                                                            <select id="country" name="jenis_kain_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_kain_celana_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_pelatih"
                                                                value="{{ $oderCs->ket_warna_kain_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_pelatih"
                                                                value="{{ $oderCs->ket_bis_celana_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                pelatih</label>
                                                            <textarea name="ket_tambahan_celana_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                pelatih</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelatih"> {{
                                                                    $oderCs->keterangan_celana_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Kiper</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                kiper</label>
                                                            <select id="country" name="jenis_sablon_celana_kiper"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_kiper }}">
                                                                    Jenis subim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                kiper</label>
                                                            <select id="country" name="pola_celana_kiper_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaKiper->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaKiper->jenis_kera }}
                                                                </option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                kiper</label>
                                                            <select id="country" name="jenis_kain_celana_kiper"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_kiper }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_celana_kiper }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain kiper</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_kiper"
                                                                value="{{ $oderCs->ket_warna_kain_celana_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana kiper</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_kiper"
                                                                value="{{ $oderCs->ket_bis_celana_celana_kiper }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                kiper</label>
                                                            <textarea name="ket_tambahan_celana_kiper"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_kiper }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player kiper</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_kiper">{{ $oderCs->keterangan_celana_kiper }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_celana_pelatih)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                player</label>
                                                            <select id="country" name="jenis_sablon_celana_player"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                player</label>
                                                            <select id="country" name="pola_celana_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPlayer->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPlayer->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                player</label>
                                                            <select id="country" name="jenis_kain_celana_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_player }}">
                                                                    Jenis kain sat ini {{
                                                                    $oderCs->jenis_kain_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_player"
                                                                value="{{ $oderCs->ket_warna_kain_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_player"
                                                                value="{{ $oderCs->ket_bis_celana_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                player</label>
                                                            <textarea name="ket_tambahan_celana_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelayer">{{ $oderCs->keterangan_celana_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Pelatih</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                pelatih</label>
                                                            <select id="country" name="jenis_sablon_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_pelatih }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                pelatih</label>
                                                            <select id="country" name="pola_celana_pelatih_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPelatih->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPelatih->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                pelatih</label>
                                                            <select id="country" name="jenis_kain_celana_pelatih"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_kain_celana_pelatih }}">
                                                                    Jenis kain saat ini {{
                                                                    $oderCs->jenis_kain_celana_pelatih }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_pelatih"
                                                                value="{{ $oderCs->ket_warna_kain_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana pelatih</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_pelatih"
                                                                value="{{ $oderCs->ket_bis_celana_celana_pelatih }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                pelatih</label>
                                                            <textarea name="ket_tambahan_celana_pelatih"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_pelatih }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                pelatih</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelatih"> {{
                                                                    $oderCs->keterangan_celana_pelatih }}</textarea>
                                                        </div>
                                                    </div>
                                                    @elseif ($oderCs->file_celana_player)
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Celana Player</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Sublim
                                                                player</label>
                                                            <select id="country" name="jenis_sablon_celana_player"
                                                                class="select2 form-select">
                                                                <option
                                                                    value="{{ $oderCs->jenis_sablon_celana_player }}">
                                                                    Jenis sublim saat ini {{
                                                                    $oderCs->jenis_sablon_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Sublim --</option>
                                                                <option value="Full Print">Full Print</option>
                                                                <option value="Half Print">Half Print</option>
                                                                <option value="C Print">C Print</option>
                                                                <option value="B Print">B Print</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Pola Celana
                                                                player</label>
                                                            <select id="country" name="pola_celana_player_id"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->CelanaPlayer->id }}">Jenis
                                                                    pola saat ini {{ $oderCs->CelanaPlayer->jenis_kera
                                                                    }}</option>
                                                                <option value="">-- Pilih Jenis Pola Celana --</option>
                                                                @foreach ( $celana as $celanas )
                                                                <option value="{{ $celanas->id }}">{{
                                                                    $celanas->jenis_kera
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="country">Jenis Kain
                                                                player</label>
                                                            <select id="country" name="jenis_kain_celana_player"
                                                                class="select2 form-select">
                                                                <option value="{{ $oderCs->jenis_kain_celana_player }}">
                                                                    Jenis kain sat ini {{
                                                                    $oderCs->jenis_kain_celana_player }}</option>
                                                                <option value="">-- Pilih Jenis Kain --</option>
                                                                <option value="Milano">Milano</option>
                                                                <option value="Rabbit">Rabbit</option>
                                                                <option value="Benzema">Benzema</option>
                                                                <option value="Embosh">Embosh</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Warna
                                                                Kain player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_warna_kain_celana_player"
                                                                value="{{ $oderCs->ket_warna_kain_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Bis
                                                                Celana player</label>
                                                            <input class="form-control" type="text" id="firstName"
                                                                name="ket_bis_celana_celana_player"
                                                                value="{{ $oderCs->ket_bis_celana_celana_player }}"
                                                                autofocus />
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="firstName" class="form-label">Ket. Tambahan
                                                                player</label>
                                                            <textarea name="ket_tambahan_celana_player"
                                                                class="form-control">{{ $oderCs->ket_tambahan_celana_player }}</textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label" for="country">Keterangan celana
                                                                player</label>
                                                            <textarea class="form-control"
                                                                name="keterangan_celana_pelayer">{{ $oderCs->keterangan_celana_pelayer }}</textarea>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h4 class="fw-bold py-3 mb-4">Keterangan Tambahan</h4>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <textarea class="form-control"
                                                                name="keterangan_lengkap">{!! $oderCs->keterangan_lengkap !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-send"></i>
                            Buat LK
                        </button>
                        <a href="{{ route('getIndexLkCsPegawai') }}" class="btn btn-outline-secondary"><i
                                class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('keterangan_lengkap');
</script>
@endpush