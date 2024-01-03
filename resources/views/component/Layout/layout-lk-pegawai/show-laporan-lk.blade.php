@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Show LK
    </h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Show </span>laporan LK</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">No. Order</label>
                                                <input class="form-control" type="text" id="firstName"
                                                    value="{{ $show->BarangMasukCsLK->no_order }}" readonly autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Panjang Kertas</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $show->panjang_kertas }}" name="panjang_kertas"
                                                    id="lastName" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">File Corel Layout</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $show->file_corel_layout }}" name="panjang_kertas"
                                                    id="lastName" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('getIndexLaporanLk') }}" class="btn btn-outline-secondary"><i
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