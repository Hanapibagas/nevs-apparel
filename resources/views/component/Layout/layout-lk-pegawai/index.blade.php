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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Layout</h4>
        <div class="card">
            <h5 class="card-header">Data Lembaran Kerja</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="cs" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>no.order</th>
                                <th>nama Cs</th>
                                <th>waktu produksi</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        @php
                        function calculateWorkingDays($startDate, $endDate) {
                        $start = new DateTime($startDate);
                        $end = new DateTime($endDate);
                        $interval = DateInterval::createFromDateString('1 day');
                        $period = new DatePeriod($start, $interval, $end);
                        $workingDays = 0;
                        foreach ($period as $day) {
                        if ($day->format('w') != 0) {
                        $workingDays++;
                        }
                        }
                        return $workingDays;
                        }
                        @endphp
                        <tbody>
                            @foreach ( $oderCs as $key => $disainers )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <strong style="text-transform: uppercase">{{ $disainers->BarangMasukCsLK->no_order
                                        }}</strong>
                                </td>
                                <td>
                                    <strong style="text-transform: uppercase">{{ $disainers->UserLayout->name
                                        }}</strong>
                                </td>
                                <td>
                                    {{
                                    calculateWorkingDays($disainers->BarangMasukCsLK->tanggal_masuk,
                                    $disainers->BarangMasukCsLK->deadline) }} Hari
                                    @php
                                    $totalDays = calculateWorkingDays($disainers->BarangMasukCsLK->tanggal_masuk,
                                    $disainers->BarangMasukCsLK->deadline);
                                    $status = ($totalDays < 10) ? '<span class="badge bg-label-danger">Express</span>'
                                        : '<span class="badge bg-label-warning">Normal</span>' ; @endphp {!! $status !!}
                                        </td>
                                <td>
                                    <a target="_blank"
                                        href="{{ route('getCetakDataLkLayout', $disainers->BarangMasukCsLK->id) }}"
                                        class="btn btn-danger">
                                        <i class="menu-icon tf-icons bx bxs-file-pdf"></i>Download LK</a>
                                    <a target="_blank"
                                        href="storage/{{ $disainers->BarangMasukCsLK->file_corel_disainer }}"
                                        class="btn btn-success">
                                        <i class="menu-icon tf-icons bx bxs-download"></i>Download File Corel</a>
                                    <a href="{{ route('getCreateLaporanLkLayout' , $disainers->id) }}"
                                        class="btn btn-info">
                                        <i class="menu-icon tf-icons bx bxs-inbox"></i>Input Laporan</a>
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
@endsection

@push('js')
<script>
    new DataTable('#cs');
</script>
@endpush