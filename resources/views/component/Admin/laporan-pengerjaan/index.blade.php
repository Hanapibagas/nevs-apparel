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
                                <td><strong style="text-transform: uppercase">{{ $laporan->BarangMasukCs->no_nota
                                        }}</strong></td>
                                <td><strong style="text-transform: uppercase">{{ $laporan->BarangMasukCs->no_order
                                        }}</strong></td>
                                <td><strong style="text-transform: uppercase">{{
                                        $laporan->BarangMasukCs->BarangMasukDisainer->nama_tim }}</strong></td>
                                <td><strong style="text-transform: uppercase">{{
                                        $laporan->BarangMasukCs->UsersOrder->name }}</strong></td>
                                <td>
                                    @if ($laporan->status == 'Selesai')
                                    <span class="badge bg-success"> {{ $laporan->status }}</span>
                                    @elseif ($laporan->status == 'Layout')
                                    <span class="badge bg-warning">Berada di {{ $laporan->status }}</span>
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
                                <td><strong style="text-transform: uppercase">{{
                                        \Carbon\Carbon::parse($laporan->BarangMasukCs->deadline)->format('d F Y')
                                        }}</strong></td>
                                <td>
                                    @php
                                    $deadline = \Carbon\Carbon::parse($laporan->BarangMasukCs->deadline);
                                    $selesai = $laporan->keterangan ? \Carbon\Carbon::parse($laporan->keterangan) :
                                    null;
                                    if ($selesai) {
                                    $selisihHari = $selesai->diffInDays($deadline);
                                    if ($selesai > $deadline) {
                                    echo '<span class="badge bg-danger" style="text-transform: uppercase"> + ' .
                                        $selisihHari . ' hari</span>';
                                    } elseif ($selesai < $deadline) {
                                        echo '<span class="badge bg-success" style="text-transform: uppercase">' .
                                        -$selisihHari . ' hari </span>' ; } else {
                                        echo '<p style="text-transform: uppercase">Selesai tepat pada Deadline</p>' ; }
                                        } else { echo "" ; } @endphp </td>
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
                echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                } elseif ($selesai < $deadline) { echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                    echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <p>Nama layout: {{
                    strtoupper($laporan->BarangMasukLayout->UserLayout->name) }}</p>
                    <p>Panjang kertas: {{ $laporan->BarangMasukLayout->panjang_kertas }}</p>
                    <hr>

                    @if(isset($laporan->BarangMasukMesinAtexco))
                    <h3>Laporan Mesin Atexco</h3>
                    <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinAtexco->deadline)->format('d F Y')
                        }}
                    </p>
                    <p>Selesai:
                        @if ($laporan->BarangMasukMesinAtexco->selesai)
                        {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinAtexco->selesai)->format('d F Y') }}
                        @else
                        @endif
                    </p>
                    @php
                    $deadline = \Carbon\Carbon::parse($laporan->BarangMasukMesinAtexco->deadline);
                    $selesai = $laporan->BarangMasukMesinAtexco->selesai ?
                    \Carbon\Carbon::parse($laporan->BarangMasukMesinAtexco->selesai) : null;
                    if ($selesai) {
                    $selisihHari = $selesai->diffInDays($deadline);
                    if ($selesai > $deadline) {
                    echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                    } elseif ($selesai < $deadline) { echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else
                        { echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <p>Nama penanggung
                        jawab: {{ $laporan->BarangMasukMesinAtexco->penanggung_jawab_id }}</p>
                        <hr>
                        @elseif(isset($laporan->BarangMasukMesinMimaki))
                        <h3>Laporan Mesin Mimaki</h3>
                        <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinMimaki->deadline)->format('d F
                            Y')
                            }}
                        </p>
                        <p>Selesai:
                            @if ($laporan->BarangMasukMesinMimaki->selesai)
                            {{ \Carbon\Carbon::parse($laporan->BarangMasukMesinMimaki->selesai)->format('d F Y') }}
                            @else
                            @endif
                        </p>
                        @php
                        $deadline = \Carbon\Carbon::parse($laporan->BarangMasukMesinMimaki->deadline);
                        $selesai = $laporan->BarangMasukMesinMimaki->selesai ?
                        \Carbon\Carbon::parse($laporan->BarangMasukMesinMimaki->selesai) : null;
                        if ($selesai) {
                        $selisihHari = $selesai->diffInDays($deadline);
                        if ($selesai > $deadline) {
                        echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                        } elseif ($selesai < $deadline) { echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; }
                            else { echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <p>Nama
                            penanggung jawab: {{ $laporan->BarangMasukMesinMimaki->penanggung_jawab_id }}</p>
                            <hr>
                            @endif

                            <h3>Laporan Press Kain</h3>
                            <p>Deadline: {{ \Carbon\Carbon::parse($laporan->BarangMasukPressKain->deadline)->format('d F
                                Y')
                                }}
                            </p>
                            <p>Selesai:
                                @if ($laporan->BarangMasukPressKain->selesai)
                                {{ \Carbon\Carbon::parse($laporan->BarangMasukPressKain->selesai)->format('d F Y') }}
                                @else
                                @endif
                            </p>
                            @php
                            $deadline = \Carbon\Carbon::parse($laporan->BarangMasukPressKain->deadline);
                            $selesai = $laporan->BarangMasukPressKain->selesai ?
                            \Carbon\Carbon::parse($laporan->BarangMasukPressKain->selesai) : null;
                            if ($selesai) {
                            $selisihHari = $selesai->diffInDays($deadline);
                            if ($selesai > $deadline) {
                            echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                            } elseif ($selesai < $deadline) { echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ;
                                } else { echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <p>
                                Kain: {{ $laporan->BarangMasukPressKain->kain }}</p>
                                <p>Berat: {{ $laporan->BarangMasukPressKain->berat }}</p>
                                <hr>

                                <h3>Laporan Laser Cut</h3>
                                <p>Deadline: {{
                                    \Carbon\Carbon::parse($laporan->BarangMasukLaserCut->deadline)->format('d F
                                    Y')
                                    }}
                                </p>
                                <p>Selesai:
                                    @if ($laporan->BarangMasukLaserCut->selesai)
                                    {{ \Carbon\Carbon::parse($laporan->BarangMasukLaserCut->selesai)->format('d F Y') }}
                                    @else
                                    @endif
                                </p>
                                @php
                                $deadline = \Carbon\Carbon::parse($laporan->BarangMasukLaserCut->deadline);
                                $selesai = $laporan->BarangMasukLaserCut->selesai ?
                                \Carbon\Carbon::parse($laporan->BarangMasukLaserCut->selesai) : null;
                                if ($selesai) {
                                $selisihHari = $selesai->diffInDays($deadline);
                                if ($selesai > $deadline) {
                                echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                } elseif ($selesai < $deadline) {
                                    echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                                    echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <hr>

                                    <h3>Laporan Manual Cut</h3>
                                    <p>Deadline: {{
                                        \Carbon\Carbon::parse($laporan->BarangMasukManualcut->deadline)->format('d F
                                        Y')
                                        }}
                                    </p>
                                    <p>Selesai:
                                        @if ($laporan->BarangMasukManualcut->selesai)
                                        {{ \Carbon\Carbon::parse($laporan->BarangMasukManualcut->selesai)->format('d F
                                        Y') }}
                                        @else
                                        @endif
                                    </p>
                                    @php
                                    $deadline = \Carbon\Carbon::parse($laporan->BarangMasukManualcut->deadline);
                                    $selesai = $laporan->BarangMasukManualcut->selesai ?
                                    \Carbon\Carbon::parse($laporan->BarangMasukManualcut->selesai) : null;
                                    if ($selesai) {
                                    $selisihHari = $selesai->diffInDays($deadline);
                                    if ($selesai > $deadline) {
                                    echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                    } elseif ($selesai < $deadline) {
                                        echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                                        echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp <hr>

                                        <h3>Laporan Sortir</h3>
                                        <p>Deadline: {{
                                            \Carbon\Carbon::parse($laporan->BarangMasukSortir->deadline)->format('d
                                            F
                                            Y') }}
                                        </p>
                                        <p>Selesai:
                                            @if ($laporan->BarangMasukSortir->selesai)
                                            {{ \Carbon\Carbon::parse($laporan->BarangMasukSortir->selesai)->format('d F
                                            Y') }}
                                            @else
                                            @endif
                                        </p>
                                        @php
                                        $deadline = \Carbon\Carbon::parse($laporan->BarangMasukSortir->deadline);
                                        $selesai = $laporan->BarangMasukSortir->selesai ?
                                        \Carbon\Carbon::parse($laporan->BarangMasukSortir->selesai) : null;
                                        if ($selesai) {
                                        $selisihHari = $selesai->diffInDays($deadline);
                                        if ($selesai > $deadline) {
                                        echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                        } elseif ($selesai < $deadline) {
                                            echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                                            echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; } @endphp
                                            <p>No error: {{ $laporan->BarangMasukSortir->no_error }}</p>
                                            <p>Panjang kertas: {{ $laporan->BarangMasukSortir->panjang_kertas }}</p>
                                            <hr>

                                            <h3>Laporan Jahit Baju</h3>
                                            <p>Deadline: {{
                                                \Carbon\Carbon::parse($laporan->BarangMasukJahitBaju->deadline)->format('d
                                                F
                                                Y')
                                                }}
                                            </p>
                                            <p>Selesai:
                                                @if ($laporan->BarangMasukJahitBaju->selesai)
                                                {{
                                                \Carbon\Carbon::parse($laporan->BarangMasukJahitBaju->selesai)->format('d
                                                F Y') }}
                                                @else
                                                @endif
                                            </p>
                                            @php
                                            $deadline = \Carbon\Carbon::parse($laporan->BarangMasukJahitBaju->deadline);
                                            $selesai = $laporan->BarangMasukJahitBaju->selesai ?
                                            \Carbon\Carbon::parse($laporan->BarangMasukJahitBaju->selesai) : null;
                                            if ($selesai) {
                                            $selisihHari = $selesai->diffInDays($deadline);
                                            if ($selesai > $deadline) {
                                            echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                            } elseif ($selesai < $deadline) {
                                                echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                                                echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; }
                                                @endphp <p>Leher: {{ $laporan->BarangMasukJahitBaju->lehere }}</p>
                                                <p>Pola badan: {{ $laporan->BarangMasukJahitBaju->pola_badan }}</p>
                                                <hr>

                                                <h3>Laporan Jahit Celana</h3>
                                                <p>Deadline: {{
                                                    \Carbon\Carbon::parse($laporan->BarangMasukJahitCelana->deadline)->format('d
                                                    F
                                                    Y')
                                                    }}
                                                </p>
                                                <p>Selesai:
                                                    @if ($laporan->BarangMasukJahitCelana->selesai)
                                                    {{
                                                    \Carbon\Carbon::parse($laporan->BarangMasukJahitCelana->selesai)->format('d
                                                    F Y') }}
                                                    @else
                                                    @endif
                                                </p>
                                                @php
                                                $deadline =
                                                \Carbon\Carbon::parse($laporan->BarangMasukJahitCelana->deadline);
                                                $selesai = $laporan->BarangMasukJahitCelana->selesai ?
                                                \Carbon\Carbon::parse($laporan->BarangMasukJahitCelana->selesai) : null;
                                                if ($selesai) {
                                                $selisihHari = $selesai->diffInDays($deadline);
                                                if ($selesai > $deadline) {
                                                echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                                } elseif ($selesai < $deadline) {
                                                    echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; } else {
                                                    echo "<p>Selesai tepat pada Deadline</p>" ; } } else { echo "" ; }
                                                    @endphp <p>Pola celana: {{
                                                    $laporan->BarangMasukJahitCelana->pola_celana }}</p>
                                                    <hr>

                                                    <h3>Laporan Pres Tag Size</h3>
                                                    <p>Deadline: {{
                                                        \Carbon\Carbon::parse($laporan->BarangMasukPressTag->deadline)->format('d
                                                        F
                                                        Y')
                                                        }}
                                                    </p>
                                                    <p>Selesai:
                                                        @if ($laporan->BarangMasukPressTag->selesai)
                                                        {{
                                                        \Carbon\Carbon::parse($laporan->BarangMasukPressTag->selesai)->format('d
                                                        F Y') }}
                                                        @else
                                                        @endif
                                                    </p>
                                                    @php
                                                    $deadline =
                                                    \Carbon\Carbon::parse($laporan->BarangMasukPressTag->deadline);
                                                    $selesai = $laporan->BarangMasukPressTag->selesai ?
                                                    \Carbon\Carbon::parse($laporan->BarangMasukPressTag->selesai) :
                                                    null;
                                                    if ($selesai) {
                                                    $selisihHari = $selesai->diffInDays($deadline);
                                                    if ($selesai > $deadline) {
                                                    echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                                    } elseif ($selesai < $deadline) {
                                                        echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; }
                                                        else { echo "<p>Selesai tepat pada Deadline</p>" ; } } else {
                                                        echo "" ; } @endphp <hr>

                                                        <h3>Laporan Packing</h3>
                                                        <p>Deadline: {{
                                                            \Carbon\Carbon::parse($laporan->BarangMasukPacking->deadline)->format('d
                                                            F
                                                            Y')
                                                            }}
                                                        </p>
                                                        <p>Selesai:
                                                            @if ($laporan->BarangMasukPacking->selesai)
                                                            {{
                                                            \Carbon\Carbon::parse($laporan->BarangMasukPacking->selesai)->format('d
                                                            F Y') }}
                                                            @else
                                                            @endif
                                                        </p>
                                                        @php
                                                        $deadline =
                                                        \Carbon\Carbon::parse($laporan->BarangMasukPacking->deadline);
                                                        $selesai = $laporan->BarangMasukPacking->selesai ?
                                                        \Carbon\Carbon::parse($laporan->BarangMasukPacking->selesai) :
                                                        null;
                                                        if ($selesai) {
                                                        $selisihHari = $selesai->diffInDays($deadline);
                                                        if ($selesai > $deadline) {
                                                        echo "<p>Lebih dari Deadline: +{$selisihHari} hari</p>";
                                                        } elseif ($selesai < $deadline) {
                                                            echo "<p>Kurang dari Deadline: -{$selisihHari} hari</p>" ; }
                                                            else { echo "<p>Selesai tepat pada Deadline</p>" ; } } else
                                                            { echo "" ; } @endphp <hr>
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
