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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Details laporan
        </h4>

        @if ($laporans->whereNotNull('barang_masuk_layout_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk layout</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Nama layout</th>
                                <th>Jenis Bahan Cetak</th>
                                <th>Panjang kertas</th>
                                <th>Panjang poly/DTF</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanData['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['player'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['player'][0]['selesai'])->format('d F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['player'][0]['panjang_kertas_palayer'])
                                    {{ $laporanData['player'][0]['panjang_kertas_palayer'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['player'][0]['poly_player'])
                                    {{ $laporanData['player'][0]['poly_player'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['player'][0]['keterangan1'])
                                    {{ $laporanData['player'][0]['keterangan1'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['pelatih'][0]['deadline'])->format('d F Y,')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['pelatih'][0]['selesai'])->format('d F Y,
                                    H:i:s A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['pelatih'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['pelatih'][0]['panjang_kertas_pelatih'])
                                    {{ $laporanData['pelatih'][0]['panjang_kertas_pelatih'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['pelatih'][0]['poly_pelatih'])
                                    {{ $laporanData['pelatih'][0]['poly_pelatih'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['pelatih'][0]['keterangan2'])
                                    {{ $laporanData['pelatih'][0]['keterangan2'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['kiper'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['kiper'][0]['selesai'])->format('d F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['kiper'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['kiper'][0]['panjang_kertas_kiper'])
                                    {{ $laporanData['kiper'][0]['panjang_kertas_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['kiper'][0]['poly_kiper'])
                                    {{ $laporanData['kiper'][0]['poly_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['kiper'][0]['keterangan3'])
                                    {{ $laporanData['kiper'][0]['keterangan3'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['lk_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['lk_1'][0]['selesai'])->format('d F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['lk_1'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['lk_1'][0]['panjang_kertas_1'])
                                    {{ $laporanData['lk_1'][0]['panjang_kertas_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['lk_1'][0]['poly_1'])
                                    {{ $laporanData['lk_1'][0]['poly_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['lk_1'][0]['keterangan4'])
                                    {{ $laporanData['lk_1'][0]['keterangan4'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['celana_player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['celana_player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['celana_player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['celana_player'][0]['selesai'])->format('d F
                                    Y, H:i:s A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['celana_player'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['celana_player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['celana_player'][0]['panjang_kertas_celana_pelayer'])
                                    {{ $laporanData['celana_player'][0]['panjang_kertas_celana_pelayer'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_player'][0]['poly_celana_pelayer'])
                                    {{ $laporanData['celana_player'][0]['poly_celana_pelayer'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_player'][0]['keterangan5'])
                                    {{ $laporanData['celana_player'][0]['keterangan5'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['celana_pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['celana_pelatih'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['celana_pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['celana_pelatih'][0]['selesai'])->format('d F
                                    Y, H:i:s A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['celana_pelatih'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['celana_pelatih'][0]['panjang_kertas_celana_pelatih'])
                                    {{ $laporanData['celana_pelatih'][0]['panjang_kertas_celana_pelatih'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_pelatih'][0]['poly_celana_pelatih'])
                                    {{ $laporanData['celana_pelatih'][0]['poly_celana_pelatih'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_pelatih'][0]['keterangan6'])
                                    {{ $laporanData['celana_pelatih'][0]['keterangan6'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['celana_kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['celana_kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['celana_kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['celana_kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['celana_kiper'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['celana_kiper'][0]['panjang_kertas_celana_kiper'])
                                    {{ $laporanData['celana_kiper'][0]['panjang_kertas_celana_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_kiper'][0]['poly_celana_kiper'])
                                    {{ $laporanData['celana_kiper'][0]['poly_celana_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_kiper'][0]['keterangan7'])
                                    {{ $laporanData['celana_kiper'][0]['keterangan7'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanData['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanData['celana_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanData['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanData['celana_1'][0]['selesai'])->format('d F Y,
                                    H:i:s A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['celana_1'][0]['users_layout_id']) }}
                                </td>
                                <td>
                                    {{ strtoupper($laporanData['player'][0]['kertas_id']) }}
                                </td>
                                <td>
                                    @if($laporanData['celana_1'][0]['panjang_kertas_celana_1'])
                                    {{ $laporanData['celana_1'][0]['panjang_kertas_celana_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_1'][0]['poly_celana_1'])
                                    {{ $laporanData['celana_1'][0]['poly_celana_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanData['celana_1'][0]['keterangan8'])
                                    {{ $laporanData['celana_1'][0]['keterangan8'] }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('barang_masuk_mesin_atexco_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk mesin cetak</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Nama penanggung jawab</th>
                                <th>Keterangan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataAtexco['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['player'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['player'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['player'][0]['keterangan'])
                                    {{ strtoupper($laporanDataAtexco['player'][0]['keterangan']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['player'][0]['file_foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['player'][0]['file_foto']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['pelatih'][0]['deadline'])->format('d F
                                    Y,')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['pelatih'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['pelatih'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['pelatih'][0]['keterangan2'])
                                    {{ strtoupper($laporanDataAtexco['pelatih'][0]['keterangan2']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['pelatih'][0]['file_foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['pelatih'][0]['file_foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['kiper'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['kiper'][0]['keterangan3'])
                                    {{ strtoupper($laporanDataAtexco['kiper'][0]['keterangan3']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['kiper'][0]['file_foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['kiper'][0]['file_foto_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['lk_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['lk_1'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['lk_1'][0]['keterangan4'])
                                    {{ strtoupper($laporanDataAtexco['lk_1'][0]['keterangan4']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['lk_1'][0]['file_foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['lk_1'][0]['file_foto_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['celana_player'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['celana_player'][0]['keterangan5'])
                                    {{ strtoupper($laporanDataAtexco['celana_player'][0]['keterangan5']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_player'][0]['file_foto_celana_player'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['celana_player'][0]['file_foto_celana_player']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['celana_pelatih'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['celana_pelatih'][0]['keterangan6'])
                                    {{ strtoupper($laporanDataAtexco['celana_pelatih'][0]['keterangan6']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_pelatih'][0]['file_foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['celana_pelatih'][0]['file_foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_kiper'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataAtexco['celana_kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['celana_kiper'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['celana_kiper'][0]['keterangan7'])
                                    {{ strtoupper($laporanDataAtexco['celana_kiper'][0]['keterangan7']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_kiper'][0]['file_foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['celana_kiper'][0]['file_foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataAtexco['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['celana_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataAtexco['celana_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ strtoupper($laporanDataAtexco['celana_1'][0]['penanggung_jawab_id']) }}
                                </td>
                                <td>
                                    @if ($laporanDataAtexco['celana_1'][0]['keterangan8'])
                                    {{ strtoupper($laporanDataAtexco['celana_1'][0]['keterangan8']) }}
                                    @else
                                    <p>TIDAK MEMILIKI KETERANGAN</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataAtexco['celana_1'][0]['file_foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataAtexco['celana_1'][0]['file_foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        {{-- @if ($laporans->whereNotNull('barang_masuk_mesin_mimaki_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk mimaki</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Nama penanggung jawab</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataMimaki['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['player'][0]['deadline'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['player'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['player'][0]['file_foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['player'][0]['file_foto']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['pelatih'][0]['deadline'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['pelatih'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['pelatih'][0]['file_foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['pelatih'][0]['file_foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['kiper'][0]['deadline'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['kiper'][0]['file_foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['kiper'][0]['file_foto_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['lk_1'][0]['deadline'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['lk_1'][0]['file_foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['lk_1'][0]['file_foto_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_player'][0]['deadline'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_player'][0]['file_foto_celana_player'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['celana_player'][0]['file_foto_celana_player']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_pelatih'][0]['deadline'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_pelatih'][0]['file_foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['celana_pelatih'][0]['file_foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_kiper'][0]['deadline'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataMimaki['celana_kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_kiper'][0]['file_foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['celana_kiper'][0]['file_foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataMimaki['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['celana_1'][0]['deadline'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataMimaki['celana_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    {{ isset($laporanDataMimaki['player'][0]['penanggung_jawab_id']) ?
                                    strtoupper($laporanDataMimaki['player'][0]['penanggung_jawab_id']) : 'Belum
                                    melakukan pengisian data' }}
                                </td>
                                <td>
                                    @if($laporanDataMimaki['celana_1'][0]['file_foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataMimaki['celana_1'][0]['file_foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif --}}

        @if ($laporans->whereNotNull('barang_masuk_presskain_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk press kain</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Jenis Bahan Kain</th>
                                <th>kain</th>
                                <th>Berat</th>
                                <th>keterangan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataPressKain['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['player'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain'])
                                    {{ $laporanDataPressKain['player'][0]['kain'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['berat'])
                                    {{ $laporanDataPressKain['player'][0]['berat'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['keterangan'])
                                    {{ $laporanDataPressKain['player'][0]['keterangan'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['gambar'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['player'][0]['gambar']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['pelatih'][0]['kain_pelatih'])
                                    {{ $laporanDataPressKain['pelatih'][0]['kain_pelatih'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['pelatih'][0]['berat_pelatih'])
                                    {{ $laporanDataPressKain['pelatih'][0]['berat_pelatih'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['pelatih'][0]['keterangan2'])
                                    {{ $laporanDataPressKain['pelatih'][0]['keterangan2'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['pelatih'][0]['gambar_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['pelatih'][0]['gambar_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['kiper'][0]['kain_kiper'])
                                    {{ $laporanDataPressKain['kiper'][0]['kain_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['kiper'][0]['berat_kiper'])
                                    {{ $laporanDataPressKain['kiper'][0]['berat_kiper'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['kiper'][0]['keterangan3'])
                                    {{ $laporanDataPressKain['kiper'][0]['keterangan3'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['kiper'][0]['gambar_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['kiper'][0]['gambar_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['lk_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['lk_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['lk_1'][0]['kain_1'])
                                    {{ $laporanDataPressKain['lk_1'][0]['kain_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['lk_1'][0]['berat_1'])
                                    {{ $laporanDataPressKain['lk_1'][0]['berat_1'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['lk_1'][0]['keterangan4'])
                                    {{ $laporanDataPressKain['lk_1'][0]['keterangan4'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['lk_1'][0]['gambar_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['lk_1'][0]['gambar_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['celana_player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['kain_celana_player'])
                                    {{ $laporanDataPressKain['celana_player'][0]['kain_celana_player'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['berat_celana_player'])
                                    {{ $laporanDataPressKain['celana_player'][0]['berat_celana_player'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['keterangan5'])
                                    {{ $laporanDataPressKain['celana_player'][0]['keterangan5'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_player'][0]['gambar_celana_player'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['celana_player'][0]['gambar_celana_player']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                {{-- <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['kain_id'])
                                    {{ $laporanDataPressKain['celana_pelatih'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td> --}}
                                <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['kain_celana_pelatih'])
                                    {{ $laporanDataPressKain['celana_pelatih'][0]['kain_celana_pelatih'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['berat_celana_pelatih'])
                                    {{ $laporanDataPressKain['celana_pelatih'][0]['berat_celana_pelatih'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['keterangan6'])
                                    {{ $laporanDataPressKain['celana_pelatih'][0]['keterangan6'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_pelatih'][0]['gambar_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['celana_pelatih'][0]['gambar_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_kiper'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_kiper'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['kain_id'])
                                    {{ $laporanDataPressKain['celana_kiper'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['kain_celana_kiper'])
                                    {{ $laporanDataPressKain['celana_kiper'][0]['kain_celana_kiper'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['berat_celana_kiper'])
                                    {{ $laporanDataPressKain['celana_kiper'][0]['berat_celana_kiper'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['keterangan7'])
                                    {{ $laporanDataPressKain['celana_kiper'][0]['keterangan7'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_kiper'][0]['gambar_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['celana_kiper'][0]['gambar_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataPressKain['celana_1']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataPressKain['celana_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataPressKain['celana_1'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['player'][0]['kain_id'])
                                    {{ $laporanDataPressKain['player'][0]['kain_id'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_1'][0]['kain_celana_1'])
                                    {{ $laporanDataPressKain['celana_1'][0]['kain_celana_1'] }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_1'][0]['berat_celana_1'])
                                    {{ $laporanDataPressKain['celana_1'][0]['berat_celana_1'] }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_1'][0]['keterangan8'])
                                    {{ $laporanDataPressKain['celana_1'][0]['keterangan8'] }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataPressKain['celana_1'][0]['gambar_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataPressKain['celana_1'][0]['gambar_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('barang_masuk_lasercut_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk laser cut</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Keterangan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataLaserCut['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['player'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['player'][0]['keterangan'])
                                    {{ $laporanDataLaserCut['player'][0]['keterangan']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['player'][0]['file_foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['player'][0]['file_foto']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['pelatih'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['pelatih'][0]['keterangan2'])
                                    {{ $laporanDataLaserCut['pelatih'][0]['keterangan2']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['pelatih'][0]['file_foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['pelatih'][0]['file_foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['kiper'][0]['keterangan3'])
                                    {{ $laporanDataLaserCut['kiper'][0]['keterangan3']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['kiper'][0]['file_foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['kiper'][0]['file_foto_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['lk_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['lk_1'][0]['keterangan4'])
                                    {{ $laporanDataLaserCut['lk_1'][0]['keterangan4']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['lk_1'][0]['file_foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['lk_1'][0]['file_foto_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_player'][0]['keterangan5'])
                                    {{ $laporanDataLaserCut['celana_player'][0]['keterangan5']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_player'][0]['file_foto_celana_player'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['celana_player'][0]['file_foto_celana_player']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_pelatih'][0]['keterangan6'])
                                    {{ $laporanDataLaserCut['celana_pelatih'][0]['keterangan6']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_pelatih'][0]['file_foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['celana_pelatih'][0]['file_foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_kiper'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataLaserCut['celana_kiper'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_kiper'][0]['keterangan7'])
                                    {{ $laporanDataLaserCut['celana_kiper'][0]['keterangan7']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_kiper'][0]['file_foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['celana_kiper'][0]['file_foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataLaserCut['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['celana_1'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataLaserCut['celana_1'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_1'][0]['keterangan8'])
                                    {{ $laporanDataLaserCut['celana_1'][0]['keterangan8']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataLaserCut['celana_1'][0]['file_foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataLaserCut['celana_1'][0]['file_foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('barang_masuk_manualcut_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk manual cut</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Jenis Kain</th>
                                <th>Berat Kain</th>
                                <th>keterangan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataManualCut['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['player'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['player'][0]['kain_id'])
                                    {{ $laporanDataManualCut['player'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['player'][0]['kain'])
                                    {{ $laporanDataManualCut['player'][0]['kain']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                <td>
                                    @if($laporanDataManualCut['player'][0]['keterangan'])
                                    {{ $laporanDataManualCut['player'][0]['keterangan']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['player'][0]['file_foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['player'][0]['file_foto']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['pelatih'][0]['kain_id'])
                                    {{ $laporanDataManualCut['pelatih'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['pelatih'][0]['kain_pelatih'])
                                    {{ $laporanDataManualCut['pelatih'][0]['kain_pelatih']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['pelatih'][0]['keterangan2'])
                                    {{ $laporanDataManualCut['pelatih'][0]['keterangan2']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['pelatih'][0]['file_foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['pelatih'][0]['file_foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['kiper'][0]['kain_id'])
                                    {{ $laporanDataManualCut['kiper'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['kiper'][0]['kain_kiper'])
                                    {{ $laporanDataManualCut['kiper'][0]['kain_kiper']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['kiper'][0]['keterangan3'])
                                    {{ $laporanDataManualCut['kiper'][0]['keterangan3']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['kiper'][0]['file_foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['kiper'][0]['file_foto_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['lk_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['lk_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['lk_1'][0]['kain_id'])
                                    {{ $laporanDataManualCut['lk_1'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['lk_1'][0]['kain_1'])
                                    {{ $laporanDataManualCut['lk_1'][0]['kain_1']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['lk_1'][0]['keterangan4'])
                                    {{ $laporanDataManualCut['lk_1'][0]['keterangan4']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['lk_1'][0]['file_foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['lk_1'][0]['file_foto_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_player'][0]['kain_id'])
                                    {{ $laporanDataManualCut['celana_player'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_player'][0]['kain_celana_player'])
                                    {{ $laporanDataManualCut['celana_player'][0]['kain_celana_player']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_player'][0]['keterangan5'])
                                    {{ $laporanDataManualCut['celana_player'][0]['keterangan5']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_player'][0]['file_foto_celana_player'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['celana_player'][0]['file_foto_celana_player']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_pelatih'][0]['kain_id'])
                                    {{ $laporanDataManualCut['celana_pelatih'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_pelatih'][0]['kain_celana_pelatih'])
                                    {{ $laporanDataManualCut['celana_pelatih'][0]['kain_celana_pelatih']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_pelatih'][0]['keterangan6'])
                                    {{ $laporanDataManualCut['celana_pelatih'][0]['keterangan6']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_pelatih'][0]['file_foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['celana_pelatih'][0]['file_foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_kiper'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_kiper'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_kiper'][0]['kain_id'])
                                    {{ $laporanDataManualCut['celana_kiper'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_kiper'][0]['kain_celana_kiper'])
                                    {{ $laporanDataManualCut['celana_kiper'][0]['kain_celana_kiper']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_kiper'][0]['keterangan7'])
                                    {{ $laporanDataManualCut['celana_kiper'][0]['keterangan7']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_kiper'][0]['file_foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['celana_kiper'][0]['file_foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['celana_1']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataManualCut['celana_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataManualCut['celana_1'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_1'][0]['kain_id'])
                                    {{ $laporanDataManualCut['celana_1'][0]['kain_id']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_1'][0]['kain_celana_1'])
                                    {{ $laporanDataManualCut['celana_1'][0]['kain_celana_1']}} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_1'][0]['keterangan8'])
                                    {{ $laporanDataManualCut['celana_1'][0]['keterangan8']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataManualCut['celana_1'][0]['file_foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataManualCut['celana_1'][0]['file_foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('barang_masuk_sortir_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk sortir</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>No eror</th>
                                <th>Jenis kertas</th>
                                <th>Jenis bahan kain</th>
                                <th>Panjang kertas</th>
                                <th>Berat</th>
                                <th>Bahan</th>
                                <th>keterangan</th>
                                <th>foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataSortir['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['player'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['no_error'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['no_error']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['kertas_id']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['cetak_id']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['panjang_kertas'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['panjang_kertas']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['berat'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['berat']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['bahan'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['bahan']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['keterangan'])
                                    {{ strtoupper($laporanDataSortir['player'][0]['keterangan']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['player'][0]['foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['player'][0]['foto']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['pelatih'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['pelatih'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['no_error_pelatih'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['no_error_pelatih'])
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['kertas_id']) }}
                                    Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['cetak_id']) }}
                                    Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['panjang_kertas_pelatih'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['panjang_kertas_pelatih']) }} Meter
                                    Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['berat_pelatih'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['berat_pelatih']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['bahan_pelatih'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['bahan_pelatih']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['keterangan2'])
                                    {{ strtoupper($laporanDataSortir['pelatih'][0]['keterangan2']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['pelatih'][0]['foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['pelatih'][0]['foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['no_error_kiper'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['no_error_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['kertas_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['cetak_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['panjang_kertas_kiper'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['panjang_kertas_kiper']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['berat_kiper'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['berat_kiper']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['bahan_kiper'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['bahan_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['keterangan3'])
                                    {{ strtoupper($laporanDataSortir['kiper'][0]['keterangan3']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['kiper'][0]['foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['kiper'][0]['foto_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['lk_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['no_error_1'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['no_error_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['panjang_kertas_1'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['panjang_kertas_1']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['kertas_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['cetak_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['berat_1'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['berat_1']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['bahan_1'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['bahan_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['keterangan4'])
                                    {{ strtoupper($laporanDataSortir['lk_1'][0]['keterangan4']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['lk_1'][0]['foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['lk_1'][0]['foto_1']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_player'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['no_error_celana_pelayer'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['no_error_celana_pelayer']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['kertas_id']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['cetak_id']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['panjang_kertas_celana_pelayer'])
                                    {{
                                    strtoupper($laporanDataSortir['celana_player'][0]['panjang_kertas_celana_pelayer'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['berat_celana_pelayer'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['berat_celana_pelayer']) }}
                                    Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['bahan_celana_pelayer'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['bahan_celana_pelayer']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['keterangan5'])
                                    {{ strtoupper($laporanDataSortir['celana_player'][0]['keterangan5']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_player'][0]['foto_celana_pelayer'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['celana_player'][0]['foto_celana_pelayer']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['no_error_celana_pelatih'])
                                    {{ strtoupper($laporanDataSortir['celana_pelatih'][0]['no_error_celana_pelatih']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['kertas_id'])
                                    {{
                                    strtoupper($laporanDataSortir['celana_pelatih'][0]['kertas_id'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['cetak_id'])
                                    {{
                                    strtoupper($laporanDataSortir['celana_pelatih'][0]['cetak_id'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['panjang_kertas_celana_pelatih'])
                                    {{
                                    strtoupper($laporanDataSortir['celana_pelatih'][0]['panjang_kertas_celana_pelatih'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['berat_celana_pelatih'])
                                    {{ strtoupper($laporanDataSortir['celana_pelatih'][0]['berat_celana_pelatih']) }}
                                    Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['bahan_celana_pelatih'])
                                    {{ strtoupper($laporanDataSortir['celana_pelatih'][0]['bahan_celana_pelatih']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['keterangan6'])
                                    {{ strtoupper($laporanDataSortir['celana_pelatih'][0]['keterangan6']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_pelatih'][0]['foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['celana_pelatih'][0]['foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataSortir['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_kiper'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataSortir['celana_kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['no_error_celana_kiper'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['no_error_celana_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['kertas_id'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['cetak_id'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['panjang_kertas_celana_kiper'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['panjang_kertas_celana_kiper'])
                                    }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['berat_celana_kiper'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['berat_celana_kiper']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['bahan_celana_kiper'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['bahan_celana_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['keterangan7'])
                                    {{ strtoupper($laporanDataSortir['celana_kiper'][0]['keterangan7']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_kiper'][0]['foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['celana_kiper'][0]['foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataManualCut['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['celana_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataSortir['celana_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['no_error_celana_1'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['no_error_celana_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['kertas_id'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['kertas_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['cetak_id'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['cetak_id']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['panjang_kertas_celana_1'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['panjang_kertas_celana_1']) }} Meter
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['berat_celana_1'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['berat_celana_1']) }} Kg
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['bahan_celana_1'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['bahan_celana_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['keterangan8'])
                                    {{ strtoupper($laporanDataSortir['celana_1'][0]['keterangan8']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataSortir['celana_1'][0]['foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataSortir['celana_1'][0]['foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('jahit_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk jahit</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>Nama Penjahit</th>
                                <th>Keterangan</th>
                                <th>Foto serah</th>
                                <th>Foto terima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataJahit['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['player'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['player'][0]['leher'])
                                    {{ strtoupper($laporanDataJahit['player'][0]['leher']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['player'][0]['keterangan'])
                                    {{ strtoupper($laporanDataJahit['player'][0]['keterangan']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['player'][0]['pola_badan'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['player'][0]['pola_badan']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['player'][0]['foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['player'][0]['foto']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['pelatih'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['pelatih'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['pelatih'][0]['leher_pelatih'])
                                    {{ strtoupper($laporanDataJahit['pelatih'][0]['leher_pelatih']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['pelatih'][0]['keterangan2'])
                                    {{ strtoupper($laporanDataJahit['pelatih'][0]['keterangan2']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['pelatih'][0]['pola_badan_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['pelatih'][0]['pola_badan_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['pelatih'][0]['foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['pelatih'][0]['foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['kiper'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['kiper'][0]['leher_kiper'])
                                    {{ strtoupper($laporanDataJahit['kiper'][0]['leher_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['kiper'][0]['keterangan3'])
                                    {{ strtoupper($laporanDataJahit['kiper'][0]['keterangan3']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['kiper'][0]['pola_badan_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['kiper'][0]['pola_badan_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['kiper'][0]['foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['kiper'][0]['foto_kiper']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['lk_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['lk_1'][0]['leher_1'])
                                    {{ strtoupper($laporanDataJahit['lk_1'][0]['leher_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['lk_1'][0]['keterangan4'])
                                    {{ strtoupper($laporanDataJahit['lk_1'][0]['keterangan4']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['lk_1'][0]['pola_badan_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['lk_1'][0]['pola_badan_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['lk_1'][0]['foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['lk_1'][0]['foto_1']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataJahit['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataJahit['celana_player'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_player'][0]['leher_celana_pelayer'])
                                    {{ strtoupper($laporanDataJahit['celana_player'][0]['leher_celana_pelayer']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_player'][0]['keterangan5'])
                                    {{ strtoupper($laporanDataJahit['celana_player'][0]['keterangan5']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_player'][0]['pola_badan_celana_pelayer'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_player'][0]['pola_badan_celana_pelayer']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_player'][0]['foto_celana_pelayer'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_player'][0]['foto_celana_pelayer']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataJahit['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataJahit['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_pelatih'][0]['leher_celana_pelatih'])
                                    {{ strtoupper($laporanDataJahit['celana_pelatih'][0]['leher_celana_pelatih']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_pelatih'][0]['keterangan6'])
                                    {{ strtoupper($laporanDataJahit['celana_pelatih'][0]['keterangan6']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_pelatih'][0]['pola_badan_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_pelatih'][0]['pola_badan_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_pelatih'][0]['foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_pelatih'][0]['foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataJahit['celana_kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['celana_kiper'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_kiper'][0]['leher_celana_kiper'])
                                    {{ strtoupper($laporanDataJahit['celana_kiper'][0]['leher_celana_kiper']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_kiper'][0]['keterangan7'])
                                    {{ strtoupper($laporanDataJahit['celana_kiper'][0]['keterangan7']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_kiper'][0]['pola_badan_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_kiper'][0]['pola_badan_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_kiper'][0]['foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_kiper'][0]['foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataJahit['celana_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['celana_1'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataJahit['celana_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_1'][0]['leher_celana_1'])
                                    {{ strtoupper($laporanDataJahit['celana_1'][0]['leher_celana_1']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_1'][0]['keterangan8'])
                                    {{ strtoupper($laporanDataJahit['celana_1'][0]['keterangan8']) }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_1'][0]['pola_badan_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_1'][0]['pola_badan_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataJahit['celana_1'][0]['foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataJahit['celana_1'][0]['foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif

        @if ($laporans->whereNotNull('finis_id')->count() > 0)
        <div class="card">
            <h5 class="card-header">Data masuk finish</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="atexco" class="table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Selesai</th>
                                <th>keterangan</th>
                                <th>foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($laporanDataFinis['player']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['player'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['player'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['player'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['player'][0]['keterangan'])
                                    {{ $laporanDataFinis['player'][0]['keterangan']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['player'][0]['foto'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['player'][0]['foto']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['pelatih']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['pelatih'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['pelatih'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['pelatih'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['pelatih'][0]['keterangan2'])
                                    {{ $laporanDataFinis['pelatih'][0]['keterangan2']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['pelatih'][0]['foto_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['pelatih'][0]['foto_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['kiper']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['kiper'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['kiper'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['kiper'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['kiper'][0]['keterangan3'])
                                    {{ $laporanDataFinis['kiper'][0]['keterangan3']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['kiper'][0]['foto_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['kiper'][0]['foto_kiper']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['lk_1']))
                            <tr>
                                <td>
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['lk_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['lk_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['lk_1'][0]['selesai'])->format('d F Y,
                                    H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['lk_1'][0]['keterangan4'])
                                    {{ $laporanDataFinis['lk_1'][0]['keterangan4']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['lk_1'][0]['foto_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['lk_1'][0]['foto_1']) }}" alt=""
                                        srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['celana_player']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_player'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_player'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_player'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_player'][0]['keterangan5'])
                                    {{ $laporanDataFinis['celana_player'][0]['keterangan5']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_player'][0]['foto_celana_pelayer'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['celana_player'][0]['foto_celana_pelayer']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['celana_pelatih']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_pelatih'][0]['deadline'])->format('d
                                    F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_pelatih'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_pelatih'][0]['selesai'])->format('d
                                    F Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_pelatih'][0]['keterangan6'])
                                    {{ $laporanDataFinis['celana_pelatih'][0]['keterangan6']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_pelatih'][0]['foto_celana_pelatih'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['celana_pelatih'][0]['foto_celana_pelatih']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['celana_kiper']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_kiper'][0]['deadline'])->format('d F
                                    Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_kiper'][0]['selesai'])
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_kiper'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_kiper'][0]['keterangan7'])
                                    {{ $laporanDataFinis['celana_kiper'][0]['keterangan7']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_kiper'][0]['foto_celana_kiper'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['celana_kiper'][0]['foto_celana_kiper']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if (!empty($laporanDataFinis['celana_1']))
                            <tr>
                                <td>
                                    {{
                                    \Carbon\Carbon::parse($laporanDataFinis['celana_1'][0]['deadline'])->format('d F Y')
                                    }}
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_1'][0]['selesai'])
                                    {{ \Carbon\Carbon::parse($laporanDataFinis['celana_1'][0]['selesai'])->format('d F
                                    Y, H:i:s
                                    A')
                                    }}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_1'][0]['keterangan8'])
                                    {{ $laporanDataFinis['celana_1'][0]['keterangan8']}}
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                                <td>
                                    @if($laporanDataFinis['celana_1'][0]['foto_celana_1'])
                                    <img style="height: 200px; width: 200px"
                                        src="{{ asset('storage/'.$laporanDataFinis['celana_1'][0]['foto_celana_1']) }}"
                                        alt="" srcset="">
                                    @else
                                    <p>BELUM MELAKUKAN UPDATE DATA</p>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        @endif
        <a href="{{ route('getIndexLaporan') }}" class="btn btn-outline-secondary"><i
                class="menu-icon tf-icons bx bx-undo"></i>Kembali</a>

    </div>
</div>

@endsection

@push('js')
<script>
    new DataTable('#cs');
</script>
@endpush
