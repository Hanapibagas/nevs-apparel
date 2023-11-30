@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> <span class="text-muted fw-light"><a
                href="{{ route('getIndexDisainerPegawai') }}" style="color: inherit">Disainer</a></span>/ Kirim data ke
        Costumer Services</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form untuk mengirim ke Costumer Services</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('postToCsPegawai', $disainer->nama_tim) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">nama tim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    value="{{ $disainer->nama_tim }}" readonly />
                                <input type="hidden" class="form-control" name="barang_masuk_disainer_id"
                                    id="basic-default-name" value="{{ $disainer->id }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">nama cs</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    value="{{ $disainer->Users->name }}" readonly />
                                <input type="hidden" class="form-control" name="cs_id" id="basic-default-name"
                                    value="{{ $disainer->nama_cs }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama mesin</label>
                            <div class="col-sm-10">
                                <select name="jenis_mesin" class="form-control">
                                    <option selected>-- Silahkan Pilih Mesin --</option>
                                    <option style="text-transform: uppercase" value="atexco">atexco</option>
                                    <option style="text-transform: uppercase" value="mimaki">mimaki</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">File Baju</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" accept=".jpg, .eps" id="basic-default-company"
                                    name="file_baju" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">File Celana</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" accept=".jpg, .eps" id="basic-default-company"
                                    name="file_celana" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="menu-icon tf-icons bx bx-send"></i>
                                    kirim
                                </button>
                                <a href="{{ route('getIndexDisainerPegawai') }}" class="btn btn-outline-secondary"><i
                                        class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection