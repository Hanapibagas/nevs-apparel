@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Input data laporan LK
    </h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Input </span>data laporan</h4>
                    <form action="{{ route('postLaporanLkLayout', $dataLk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">No. Order</label>
                                                <input class="form-control" type="text" id="firstName"
                                                    value="{{ $dataLk->no_order }}" readonly autofocus />
                                                <input class="form-control" type="hidden" id="firstName"
                                                    name="no_order_id" value="{{ $dataLk->id }}" readonly autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Panjang Kertas</label>
                                                <input class="form-control" type="text" name="panjang_kertas"
                                                    id="lastName" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">File Corel Layout</label>
                                                <input class="form-control" type="file" accept=".cdr"
                                                    name="file_corel_layout" id="lastName" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-send"></i>
                            Input Laporan LK
                        </button>
                        <a href="{{ route('getIndexLkLayoutPegawai') }}" class="btn btn-outline-secondary"><i
                                class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush