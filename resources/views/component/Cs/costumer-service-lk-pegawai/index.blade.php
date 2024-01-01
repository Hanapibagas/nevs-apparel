@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endpush

@section('content')
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text : "{{ session('success') }}",
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    })
</script>
@endif

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Costumer Service</h4>
        <div class="card">
            <h5 class="card-header">Data LK </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="cs" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>no.order</th>
                                <th>nama tim</th>
                                <th>nama layout</th>
                                <th>waktu produksi</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $oderCs as $key => $disainers )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $disainers->no_order }}
                                </td>
                                <td>{{ $disainers->BarangMasukDisainer->nama_tim }}</td>
                                <td>
                                    {{ $disainers->UsersLk->name }}
                                </td>
                                @php
                                $tanggalMasuk = new DateTime($disainers->tanggal_masuk);
                                $deadline = new DateTime($disainers->deadline);
                                $now = new DateTime();
                                $intervalToDeadline = $now->diff($deadline);
                                $daysDifference = $intervalToDeadline->days;
                                $statusProduksi = ($daysDifference <= 10) ? 'express' : 'normal' ; @endphp <td>
                                    @if($statusProduksi === 'express')
                                    <span class="badge bg-label-danger">{{ $statusProduksi }} ({{ $daysDifference }}
                                        hari tersisa)</span>
                                    @else
                                    <span class="badge bg-label-warning">{{ $statusProduksi }} ({{ $daysDifference }}
                                        hari tersisa)</span>
                                    @endif
                                    </td>
                                    <td>
                                        @if ($disainers->aksi == 0)
                                        <a href="{{ route('getCreateToLkPegawai', $disainers->id) }}"
                                            class="btn btn-primary">
                                            <i class="menu-icon tf-icons bx bx-pencil"></i>
                                            Edit LK</a>
                                        @elseif ($disainers->aksi == 1)
                                        <a href="{{ route('getEditIndexLkCsPegawai', $disainers->id) }}"
                                            class="btn btn-primary">
                                            <i class="menu-icon tf-icons bx bx-pencil"></i>
                                            Edit LK</a>
                                        <a target="_blank" href="{{ route('getCetakDataLk', $disainers->id) }}"
                                            class="btn btn-danger">
                                            <i class="menu-icon tf-icons bx bxs-file-pdf"></i>Export
                                            data LK</a>
                                        {{-- <a target="_blank" href="{{ route('getCetakDataLk', $disainers->id) }}"
                                            style="margin-top: 10px" class="btn rounded-pill btn-danger" type="button">
                                            <i class="menu-icon tf-icons bx bxs-file-pdf"></i>Export
                                            data LK</a> --}}
                                        {{-- <button data-bs-toggle="modal"
                                            data-bs-target="#largeModal{{ $disainers->id }}" type="button"
                                            class="btn btn-warning">
                                            <i class="menu-icon tf-icons bx bx-show"></i>
                                            Lihat Detail</button> --}}
                                        @endif
                                    </td>
                            </tr>
                            {{-- <div class="modal fade" id="largeModal{{ $disainers->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Detail No.Order {{
                                                $disainers->no_order }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">no.order </label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->no_order }}" readonly>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">nama tim</label>
                                                            <input type="text" id="dobLarge" class="form-control"
                                                                value="{{ $disainers->BarangMasukDisainer->nama_tim }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">Costumer
                                                                service</label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->UsersOrder->name }}" readonly>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">Disainer</label>
                                                            <input type="text" id="dobLarge" class="form-control"
                                                                value="{{ $disainers->Users->name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">Jenis
                                                                mesin</label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->jenis_mesin }}" readonly>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">tanggal
                                                                jahit</label>
                                                            <input type="text" id="dobLarge" class="form-control"
                                                                value="{{ $disainers->tanggal_jahit }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">nama
                                                                penjahit</label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->nama_penjahit }}" readonly>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">no. nota</label>
                                                            <input type="text" id="dobLarge" class="form-control"
                                                                value="{{ $disainers->no_nota }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">kota
                                                                produksi</label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->kota_produksi }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">nama layout
                                                            </label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                value="{{ $disainers->UsersLk->name }}" readonly>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">Jenis
                                                                produksi</label>
                                                            <input type="text" id="dobLarge" class="form-control"
                                                                value="{{ $disainers->jenis_produksi }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailLarge" class="form-label">pola</label>
                                                            <input type="text" id="emailLarge" class="form-control"
                                                                readonly value="{{ $disainers->pola }}">
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobLarge" class="form-label">Waktu
                                                                Produksi</label>
                                                            <input type="date" id="dobLarge" class="form-control"
                                                                readonly value="{{ $disainers->deadline}}">
                                                        </div>
                                                        <a target="_blank"
                                                            href="{{ route('getCetakDataLk', $disainers->id) }}"
                                                            style="margin-top: 10px" class="btn rounded-pill btn-danger"
                                                            type="button">
                                                            <i class="menu-icon tf-icons bx bxs-file-pdf"></i>Export
                                                            data LK</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    new DataTable('#cs');
</script>
@endpush