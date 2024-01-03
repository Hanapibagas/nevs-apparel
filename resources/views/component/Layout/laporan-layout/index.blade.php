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
                        {{-- <tbody>
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
                                        <a target="_blank" href="{{ route('getCetakDataLkLayout', $disainers->id) }}"
                                            class="btn btn-danger">
                                            <i class="menu-icon tf-icons bx bxs-file-pdf"></i>Export
                                            data LK</a>
                                        @endif
                                    </td>
                            </tr>
                            @endforeach
                        </tbody> --}}
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