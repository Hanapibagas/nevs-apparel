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
                                <th>Nama tim</th>
                                <th>nama admin</th>
                                <th>Status</th>
                                <th>deadline</th>
                                <th>sisa waktu</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $laporans as $key => $laporan )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $laporan->BarangMasukCs->no_nota }}</td>
                                <td>{{ $laporan->BarangMasukCs->no_order }}</td>
                                <td>{{ $laporan->BarangMasukCs->BarangMasukDisainer->nama_tim }}</td>
                                <td>{{ $laporan->BarangMasukCs->UsersOrder->name }}</td>
                                <td>
                                    @if ($laporan->status == 'Selesai')
                                    <span class="badge bg-success"> {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Mesin Mimaki')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Mesin Atexco')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Press Kain')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Laser Cut')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Manual Cut')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Sortir')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Jahit Baju')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Jahit Celana')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Press Tag')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Packing')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($laporan->BarangMasukCs->deadline)->format('d F Y') }}</td>
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

@foreach ( $laporans as $laporan )
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
                <h3>Laporan Layout</h3>

                <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukLayout->deadline)->format('d F Y') }}</p>
                <p>Selesai:
                    @if($laporan->BarangMasukLayout->selesai)
                    {{ \Carbon\Carbon::parse($laporan->BarangMasukLayout->selesai)->format('d F Y') }}
                    @else
                    @endif
                </p>
                @php
                $deadline = \Carbon\Carbon::parse($laporan->BarangMasukLayout->deadline);
                $selesai = $laporan->BarangMasukLayout->selesai ?
                \Carbon\Carbon::parse($laporan->BarangMasukLayout->selesai) : null;
                if ($selesai) {
                $selisihHari = $selesai->diffInDays($deadline);
                if ($selesai > $deadline) {
                echo "<p>Lebih dari Deadline: hari</p>";
                } elseif ($selesai < $deadline) { echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                    echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <p>Nama layout: {{
                    strtoupper($laporan->BarangMasukLayout->UserLayout->name) }}</p>
                    <p>Panjang kertas: {{ $laporan->BarangMasukLayout->panjang_kertas }}</p>
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

@endforeach
@endsection

@push('js')
<script>
    new DataTable('#cs');
</script>
@endpush
