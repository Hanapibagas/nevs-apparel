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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Laporan</h4>
        <div class="card">
            <h5 class="card-header">Data keseluruhan laporan </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="cs" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>no.inv</th>
                                <th>no.po</th>
                                <th>nama admin</th>
                                <th>nama desain</th>
                                <th>nama layout</th>
                                <th>layoutters</th>
                                <th>waktu</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $laporans as $key => $laporan )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $laporan->BarangMasukCs->no_nota }}</td>
                                <td>{{ $laporan->BarangMasukCs->no_order }}</td>
                                <td>{{ $laporan->BarangMasukCs->UsersOrder->name }}</td>
                                <td>{{ $laporan->BarangMasukCs->Users->name }}</td>
                                <td>{{ $laporan->BarangMasukCs->UsersLk->name }}</td>
                                <td>{{ $laporan->BarangMasukCs->BarangMasukDisainer->nama_tim }}</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalScrollable{{ $laporan->id }}" type="button"
                                        class="btn btn-warning">
                                        <i class="menu-icon tf-icons bx bx-show"></i>
                                        Lihat Detail</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalScrollable{{ $laporan->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Details laporan {{ $laporan->BarangMasukCs->no_order
                    }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Barang Masuk Layout</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukLayout->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <p>Nama layout: {{ strtoupper($laporan->BarangMasukLayout->UserLayout->name) }}</p>
                <p>Panjang kertas: {{ $laporan->BarangMasukLayout->panjang_kertas }}</p>
                <hr>

                @if(isset($laporan->BarangMasukMesinAtexco))
                <h3>Barang Masuk Mesin Atexco</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinAtexco->deadline)->format('d F Y') }}
                </p>
                <p>Selesai:</p>
                <hr>
                @elseif(isset($laporan->BarangMasukMesinMimaki))
                <h3>Barang Masuk Mesin Mimaki</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinMimaki->deadline)->format('d F Y') }}
                </p>
                <p>Selesai:</p>
                <hr>
                @endif

                <h3>Barang Masuk Press Kain</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukPressKain->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Laser Cut</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukLaserCut->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Manual Cut</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukManualcut->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Sortir</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukSortir->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Jahit Baju</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukJahitBaju->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Jahit Celana</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukJahitCelana->deadline)->format('d F Y') }}
                </p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Pres Tag Size</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukPressTag->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>

                <h3>Barang Masuk Packing</h3>
                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukPacking->deadline)->format('d F Y') }}</p>
                <p>Selesai:</p>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
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