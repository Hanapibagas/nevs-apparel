@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> <span class="text-muted fw-light"><a
                href="{{ route('getIndexOrderCsPegawai') }}" style="color: inherit">Data Order</a></span>/ Buat data LK
    </h4>
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
                                                    id="lastName" value="" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Penjahit</label>
                                                <input class="form-control" type="text" name="nama_penjahit"
                                                    id="lastName" value="" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">No. Nota</label>
                                                <input class="form-control" type="text" name="no_nota" id="lastName"
                                                    value="" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Kota Produksi</label>
                                                <select id="country" name="kota_produksi" class="select2 form-select">
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
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h4 class="fw-bold py-3 mb-4">Keterangan Produksi</h4>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="country">Pembagian Layout</label>
                                                        <select id="country" name="layout_id"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Pembagian Layout --</option>
                                                            @foreach ( $users as $user )
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }} sedang menangani LK {{
                                                                isset($userCounts[$user->id]) ? $userCounts[$user->id]
                                                                : 0}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="country">Jenis Produksi</label>
                                                        <select id="country" name="jenis_produksi"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Produksi --</option>
                                                            <option value="Futsal">Futsal</option>
                                                            <option value="Bola">Bola</option>
                                                            <option value="Basket">Basket</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="country">Pola</label>
                                                        <select id="country" name="pola" class="select2 form-select">
                                                            <option value="">-- Pilih Pola --</option>
                                                            <option value="Ewako">Ewako</option>
                                                            <option value="Nevs">Nevs</option>
                                                            <option value="Enco">Enco</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Waktu Produksi</label>
                                                        <input class="form-control" type="date" name="deadline"
                                                            id="lastName" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <h5 class="card-header"><b>Baju</b></h5>
                                                    <div class="card-body demo-vertical-spacing demo-only-element">
                                                        <label for="firstName" class="form-label">Jumlah Baju</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="jumlah_baju" value="" autofocus />

                                                        <label class="form-label" for="country">Jenis Sublim</label>
                                                        <select id="country" name="jenis_sablon_baju"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Sublim --</option>
                                                            <option value="Full Print">Full Print</option>
                                                            <option value="Half Print">Half Print</option>
                                                            <option value="C Print">C Print</option>
                                                            <option value="B Print">B Print</option>
                                                        </select>

                                                        <label class="form-label" for="country">Jenis Kerah</label>
                                                        <select id="country" name="jenis_kerah_baju_id"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Kerah --</option>
                                                            @foreach ( $kera as $keras )
                                                            <option value="{{ $keras->id }}">{{ $keras->jenis_kera }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <label class="form-label" for="country">Jenis Pola
                                                            Lengan</label>
                                                        <select id="country" name="jenis_pola_lengan_id"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Pola Lengan --</option>
                                                            @foreach ( $lengan as $lengans )
                                                            <option value="{{ $lengans->id }}">{{ $lengans->jenis_kera
                                                                }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                        <label class="form-label" for="country">Jenis Kain</label>
                                                        <select id="country" name="jenis_kain_baju"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Kain --</option>
                                                            <option value="Milano">Milano</option>
                                                            <option value="Rabbit">Rabbit</option>
                                                            <option value="Benzema">Benzema</option>
                                                            <option value="Embosh">Embosh</option>
                                                        </select>

                                                        <label for="firstName" class="form-label">Ket. Kumis</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="ket_kumis_baju" value="" autofocus />

                                                        <label for="firstName" class="form-label">Ket. Bantalan</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="ket_bantalan_baju" value="" autofocus />

                                                        <label for="firstName" class="form-label">Ket. Celana</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="ket_celana" value="" autofocus />

                                                        <label for="firstName" class="form-label">Ket. Tambahan</label>
                                                        <textarea name="ket_tambahan_baju"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-4">
                                                    <h5 class="card-header"><b>Celana</b></h5>
                                                    <div class="card-body demo-vertical-spacing demo-only-element">
                                                        <label for="firstName" class="form-label">Jumlah Celana</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="jumlah_celana" value="" autofocus />

                                                        <label class="form-label" for="country">Jenis Sublim</label>
                                                        <select id="country" name="jenis_sablon_celana"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Sublim --</option>
                                                            <option value="Full Print">Full Print</option>
                                                            <option value="Half Print">Half Print</option>
                                                            <option value="C Print">C Print</option>
                                                            <option value="B Print">B Print</option>
                                                        </select>

                                                        <label class="form-label" for="country">Pola Celana</label>
                                                        <select id="country" name="jenis_pola_celana_id"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Pola Celana --</option>
                                                            @foreach ( $celana as $celanas )
                                                            <option value="{{ $celanas->id }}">{{ $celanas->jenis_kera
                                                                }}</option>
                                                            @endforeach
                                                        </select>

                                                        <label class="form-label" for="country">Jenis Kain</label>
                                                        <select id="country" name="jenis_kain_celana"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Kain --</option>
                                                            <option value="Milano">Milano</option>
                                                            <option value="Rabbit">Rabbit</option>
                                                            <option value="Benzema">Benzema</option>
                                                            <option value="Embosh">Embosh</option>
                                                        </select>

                                                        <label for="firstName" class="form-label">Ket. Warna
                                                            Kain</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="ket_warna_kain_celana" value="" autofocus />

                                                        <label for="firstName" class="form-label">Ket. Bis
                                                            Celana</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="ket_bis_celana_celana" value="" autofocus />

                                                        <label for="firstName" class="form-label">Ket. Tambahan</label>
                                                        <textarea name="ket_tambahan_celana"
                                                            class="form-control"></textarea>
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
                        <a href="{{ route('getIndexOrderCsPegawai') }}" class="btn btn-outline-secondary"><i
                                class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection