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
                                                <label for="lastName" class="form-label">No. Nota</label>
                                                <input class="form-control" type="text" name="no_nota" id="lastName"
                                                    value="" />
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
                                                <label class="form-label" for="country">Pembagian Layout</label>
                                                <select id="country" name="layout_id" class="select2 form-select">
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
                                                        <label class="form-label" for="country">Jenis Kerah</label>
                                                        <select id="country" name="jenis_kerah"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Kerah --</option>
                                                            <option value="V Biasa">V Biasa</option>
                                                            <option value="V Tengah">V Tengah</option>
                                                            <option value="V Duduk">V Duduk</option>
                                                            <option value="Polo Tanpa Kancing">Polo Tanpa Kancing
                                                            </option>
                                                            <option value="Polo">Polo</option>
                                                            <option value="Bulat">Bulat</option>
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
                                                        <label class="form-label" for="country">Jenis Kain</label>
                                                        <select id="country" name="jenis_kain_baju"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Kain --</option>
                                                            <option value="Milano">Milano</option>
                                                            <option value="Rabbit">Rabbit</option>
                                                            <option value="Benzema">Benzema</option>
                                                            <option value="Embosh">Embosh</option>
                                                        </select>
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

                                                        <label class="form-label" for="country">Jenis Kain</label>
                                                        <select id="country" name="jenis_kain_celana"
                                                            class="select2 form-select">
                                                            <option value="">-- Pilih Jenis Kain --</option>
                                                            <option value="Milano">Milano</option>
                                                            <option value="Rabbit">Rabbit</option>
                                                            <option value="Benzema">Benzema</option>
                                                            <option value="Embosh">Embosh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <h4 class="fw-bold py-3 mb-4">Keterangan</h4>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label" for="country">Jenis
                                                                    Produksi</label>
                                                                <textarea id="basic-default-message"
                                                                    class="form-control" name="list_data"
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="menu-icon tf-icons bx bx-save"></i>Simpan Data</button>
                                                <a href="{{ route('getIndexOrderCsPegawai') }}"
                                                    class="btn btn-outline-secondary"><i
                                                        class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection