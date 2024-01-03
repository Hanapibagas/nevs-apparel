<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data LK Baju {{ $dataLk->BarangMasukDisainer->nama_tim }}</title>
    <style>
        table {
            border-collapse: collapse;
            margin-right: 20px;
        }

        .posisi {
            float: left;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        .gambar {
            width: 350px;
        }

        .celana {
            width: 250px;
        }
    </style>
</head>

<body>
    @if ($dataLk->file_baju_1)
    <h3 style="text-align: center; margin-top: -30px;">LEMBARAN KERJA</h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_baju_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_kain_baju_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraPlayer->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraPlayer->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPlayer->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPlayer->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar1 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PLAYER</td>
            <td>{{ $dataLk->ket_kumis_baju_player }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PLAYER</td>
            <td>{{ $dataLk->ket_bantalan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PLAYER</td>
            <td>{{ $dataLk->ket_celana_player }}</td>
        </tr>
    </table>
    {{-- baju pelatih --}}
    <h3 style="text-align: center; margin-top: 100px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_kain_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/'. $dataLk->KeraPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->KeraPelatih->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPelatih->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar2 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PELATIH</td>
            <td>{{ $dataLk->ket_kumis_baju_pelatih }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PELATIH</td>
            <td>{{ $dataLk->ket_bantalan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PELATIH</td>
            <td>{{ $dataLk->ket_celana_pelatih }}</td>
        </tr>
    </table>
    {{-- baju kiper --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU KIPER</td>
            <td>{{ $dataLk->jenis_sablon_baju_kiper }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU KIPER</td>
            <td>{{ $dataLk->jenis_kain_baju_kiper }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar3 {
                    max-width: 230px;
                    min-width: 230px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_kiper)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju kiper</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_kiper !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS KIPER</td>
            <td>{{ $dataLk->ket_kumis_baju_kiper }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_kiper }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN KIPER</td>
            <td>{{ $dataLk->ket_bantalan_baju_kiper }}</td>
        </tr>
        <tr>
            <td>KET.CELANA KIPER</td>
            <td>{{ $dataLk->ket_celana_kiper }}</td>
        </tr>
    </table>
    {{-- baju 1 --}}
    <h3 style="text-align: center; margin-top: 110px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU 1</td>
            <td>{{ $dataLk->jenis_sablon_baju_1 }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU 1</td>
            <td>{{ $dataLk->jenis_kain_baju_1 }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->Kera1->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->Kera1->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/' . $dataLk->Lengan1->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->Lengan1->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar4 {
                    max-width: 230px;
                    min-width: 230px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar4" style="margin-top: 20px;" src="{{ public_path('storage/'. $dataLk->file_baju_1)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju kiper</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_1 !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS 1</td>
            <td>{{ $dataLk->ket_kumis_baju_1 }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_1 }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN 1</td>
            <td>{{ $dataLk->ket_bantalan_baju_1 }}</td>
        </tr>
        <tr>
            <td>KET.CELANA 1</td>
            <td>{{ $dataLk->ket_celana_1 }}</td>
        </tr>
    </table>

    @if ($dataLk->file_celana_player)
    {{-- celana pelayer --}}
    <h3 style="text-align: center; margin-top: 110px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_celana_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_kain_celana_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana1 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana1 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPlayer->gambar)}}">
                <p>{{ $dataLk->CelanaPlayer->jenis_kera }}</p><br>
                <img class="desaincelana1" src="{{ public_path('storage/'. $dataLk->file_celana_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PLAYER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_player }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_player }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PLAYER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_player }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_pelatih)
    {{-- celana pelatih --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_kain_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana2 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana2 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPelatih->gambar)}}">
                <p>{{ $dataLk->CelanaPelatih->jenis_kera }}</p><br>
                <img class="desaincelana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PELATIH</td>
            <td>{{ $dataLk->ket_warna_kain_celana_pelatih }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PELATIH</td>
            <td>{{ $dataLk->ket_bis_celana_celana_pelatih }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_kiper)
    {{-- celana kiper --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA KIPER</td>
            <td>{{ $dataLk->jenis_sablon_celana_kiper }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA KIPER</td>
            <td>{{ $dataLk->jenis_kain_celana_kiper }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana3 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana3 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaKiper->gambar)}}">
                <p>{{ $dataLk->CelanaKiper->jenis_kera }}</p><br>
                <img class="desaincelana3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_kiper)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana kiper</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_kiper !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN KIPER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_kiper }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_kiper }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA KIPER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_kiper }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_1)
    {{-- celana pelayer 1 --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PLAYER 1</td>
            <td>{{ $dataLk->jenis_sablon_celana_1 }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PLAYER 1</td>
            <td>{{ $dataLk->jenis_kain_celana_1 }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana4 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana4 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana4" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->Celana1->gambar)}}">
                <p>{{ $dataLk->Celana1->jenis_kera }}</p><br>
                <img class="desaincelana4" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_1)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana 1</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_1 !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PLAYER 1</td>
            <td>{{ $dataLk->ket_warna_kain_celana_1 }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_1 }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PLAYER 1</td>
            <td>{{ $dataLk->ket_bis_celana_celana_1 }}</td>
        </tr>
    </table>
    @endif

    <style>
        .font {
            font-size: 30px;
        }
    </style>
    <div class="font"><br>
        <h1 style="margin-top: 230px;">
            {!! $dataLk->keterangan_lengkap !!}
        </h1>
    </div>

    @elseif ($dataLk->file_baju_kiper)
    <h3 style="text-align: center; margin-top: -30px;">LEMBARAN KERJA</h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_baju_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_kain_baju_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraPlayer->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraPlayer->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPlayer->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPlayer->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar1 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PLAYER</td>
            <td>{{ $dataLk->ket_kumis_baju_player }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PLAYER</td>
            <td>{{ $dataLk->ket_bantalan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PLAYER</td>
            <td>{{ $dataLk->ket_celana_player }}</td>
        </tr>
    </table>
    {{-- baju pelatih --}}
    <h3 style="text-align: center; margin-top: 100px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_kain_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/'. $dataLk->KeraPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->KeraPelatih->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPelatih->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar2 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PELATIH</td>
            <td>{{ $dataLk->ket_kumis_baju_pelatih }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PELATIH</td>
            <td>{{ $dataLk->ket_bantalan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PELATIH</td>
            <td>{{ $dataLk->ket_celana_pelatih }}</td>
        </tr>
    </table>
    {{-- baju kiper --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU KIPER</td>
            <td>{{ $dataLk->jenis_sablon_baju_kiper }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU KIPER</td>
            <td>{{ $dataLk->jenis_kain_baju_kiper }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar3 {
                    max-width: 230px;
                    min-width: 230px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_kiper)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju kiper</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_kiper !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS KIPER</td>
            <td>{{ $dataLk->ket_kumis_baju_kiper }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_kiper }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN KIPER</td>
            <td>{{ $dataLk->ket_bantalan_baju_kiper }}</td>
        </tr>
        <tr>
            <td>KET.CELANA KIPER</td>
            <td>{{ $dataLk->ket_celana_kiper }}</td>
        </tr>
    </table>

    @if ($dataLk->file_celana_player)
    {{-- celana pelayer --}}
    <h3 style="text-align: center; margin-top: 110px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_celana_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_kain_celana_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana1 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana1 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPlayer->gambar)}}">
                <p>{{ $dataLk->CelanaPlayer->jenis_kera }}</p><br>
                <img class="desaincelana1" src="{{ public_path('storage/'. $dataLk->file_celana_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PLAYER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_player }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_player }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PLAYER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_player }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_pelatih)
    {{-- celana pelatih --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_kain_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana2 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana2 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPelatih->gambar)}}">
                <p>{{ $dataLk->CelanaPelatih->jenis_kera }}</p><br>
                <img class="desaincelana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PELATIH</td>
            <td>{{ $dataLk->ket_warna_kain_celana_pelatih }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PELATIH</td>
            <td>{{ $dataLk->ket_bis_celana_celana_pelatih }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_kiper)
    {{-- celana kiper --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA KIPER</td>
            <td>{{ $dataLk->jenis_sablon_celana_kiper }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA KIPER</td>
            <td>{{ $dataLk->jenis_kain_celana_kiper }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana3 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana3 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaKiper->gambar)}}">
                <p>{{ $dataLk->CelanaKiper->jenis_kera }}</p><br>
                <img class="desaincelana3" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_kiper)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana kiper</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_kiper !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN KIPER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_kiper }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_kiper }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA KIPER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_kiper }}</td>
        </tr>
    </table>
    @endif

    <style>
        .font {
            font-size: 30px;
        }
    </style>
    <div class="font"><br>
        <h1 style="margin-top: 230px;">
            {!! $dataLk->keterangan_lengkap !!}
        </h1>
    </div>
    @elseif ($dataLk->file_baju_pelatih)
    <h3 style="text-align: center; margin-top: -30px;">LEMBARAN KERJA</h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_baju_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_kain_baju_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraPlayer->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraPlayer->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPlayer->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPlayer->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar1 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PLAYER</td>
            <td>{{ $dataLk->ket_kumis_baju_player }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PLAYER</td>
            <td>{{ $dataLk->ket_bantalan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PLAYER</td>
            <td>{{ $dataLk->ket_celana_player }}</td>
        </tr>
    </table>
    {{-- baju pelatih --}}
    <h3 style="text-align: center; margin-top: 100px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PELATIH</td>
            <td>{{ $dataLk->jenis_kain_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/'. $dataLk->KeraPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->KeraPelatih->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPelatih->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPelatih->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambar2 {
                    max-width: 250px;
                    min-width: 250px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambar2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PELATIH</td>
            <td>{{ $dataLk->ket_kumis_baju_pelatih }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PELATIH</td>
            <td>{{ $dataLk->ket_bantalan_baju_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PELATIH</td>
            <td>{{ $dataLk->ket_celana_pelatih }}</td>
        </tr>
    </table>

    @if ($dataLk->file_celana_player)
    {{-- celana pelayer --}}
    <h3 style="text-align: center; margin-top: 110px; page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_celana_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_kain_celana_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana1 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana1 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPlayer->gambar)}}">
                <p>{{ $dataLk->CelanaPlayer->jenis_kera }}</p><br>
                <img class="desaincelana1" src="{{ public_path('storage/'. $dataLk->file_celana_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PLAYER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_player }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_player }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PLAYER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_player }}</td>
        </tr>
    </table>
    @endif

    @if ($dataLk->file_celana_pelatih)
    {{-- celana pelatih --}}
    <h3 style="text-align: center; margin-top: 110px;page-break-before: always;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_sablon_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PELATIH</td>
            <td>{{ $dataLk->jenis_kain_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana2 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana2 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPelatih->gambar)}}">
                <p>{{ $dataLk->CelanaPelatih->jenis_kera }}</p><br>
                <img class="desaincelana2" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_celana_pelatih)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana pelatih</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelatih !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PELATIH</td>
            <td>{{ $dataLk->ket_warna_kain_celana_pelatih }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_pelatih }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PELATIH</td>
            <td>{{ $dataLk->ket_bis_celana_celana_pelatih }}</td>
        </tr>
    </table>
    @endif

    <style>
        .font {
            font-size: 30px;
        }
    </style>
    <div class="font"><br>
        <h1 style="margin-top: 230px;">
            {!! $dataLk->keterangan_lengkap !!}
        </h1>
    </div>
    @elseif ($dataLk->file_baju_player)
    <h3 style="text-align: center; margin-top: -30px;">LEMBARAN KERJA</h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>JENIS SUBLIM BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_baju_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN BAJU PLAYER</td>
            <td>{{ $dataLk->jenis_kain_baju_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraPlayer->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraPlayer->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganPlayer->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganPlayer->jenis_kera }}</td>
        </tr>
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .gambarplayer {
                    max-width: 230px;
                    min-width: 230px;
                }
            </style>
            <th colspan="2"><br>
                <img class="gambarplayer" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran baju player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_baju_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS PLAYER</td>
            <td>{{ $dataLk->ket_kumis_baju_player }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN PLAYER</td>
            <td>{{ $dataLk->ket_bantalan_baju_player }}</td>
        </tr>
        <tr>
            <td>KET.CELANA PLAYER</td>
            <td>{{ $dataLk->ket_celana_player }}</td>
        </tr>
    </table>

    @if ($dataLk->file_celana_player)
    {{-- celana pelayer --}}
    <h3 style="text-align: center; margin-top: 110px;"></h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}
    </h4>
    <table class="posisi" style="width: 52%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td>KOTA PRODUKSI</td>
            <td>{{ $dataLk->kota_produksi }}</td>
        </tr>
        <tr>
            <td>NO.ORDER</td>
            <td>{{ $dataLk->no_order }}</td>
        </tr>
        <tr>
            <td>NAMA TEAM</td>
            <td>{{ $dataLk->BarangMasukDisainer->nama_tim }}</td>
        </tr>
        <tr>
            <td>ADMIN</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>LAYOUT</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
        <tr>
            <td>TANGAL JAHIT</td>
            <td></td>
        </tr>
    </table>
    <table class="posisi" style="width: 50%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">DEADLINE EXPRESS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
        <tr>
            <td>JENIS MESIN</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>SUBLIM CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_sablon_celana_player }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN CELANA PLAYER</td>
            <td>{{ $dataLk->jenis_kain_celana_player }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>
    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        {{-- <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->KeraKiper->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->KeraKiper->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;"
                    src="{{ public_path('storage/' . $dataLk->LenganKiper->gambar) }}" alt="">
            </td>
            <td>{{ $dataLk->LenganKiper->jenis_kera }}</td>
        </tr> --}}
    </table>
    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <style>
                .celana1 {
                    max-width: 135px;
                    min-width: 135px;
                }

                .desaincelana1 {
                    margin-top: -10px;
                    max-width: 190px;
                    min-width: 190px;
                }
            </style>
            <th colspan="2"><br>
                <img class="celana1" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->CelanaPlayer->gambar)}}">
                <p>{{ $dataLk->CelanaPlayer->jenis_kera }}</p><br>
                <img class="desaincelana1" src="{{ public_path('storage/'. $dataLk->file_celana_player)}}">
                <h2 style="text-transform: uppercase;">Keterangan ukuran celana player</h2>
                <hr style="margin-top: -20px; margin-bottom: 30px;">
                <h5 style="margin-bottom: 5px; margin-top: -20px">
                    {!! $dataLk->keterangan_celana_pelayer !!}
                </h5>
            </th>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.WARNA KAIN PLAYER</td>
            <td>{{ $dataLk->ket_warna_kain_celana_player }}</td>
            <td rowspan="2">KET {{ $dataLk->ket_tambahan_celana_player }}</td>
        </tr>
        <tr>
            <td>KET.BIS CELANA PLAYER</td>
            <td>{{ $dataLk->ket_bis_celana_celana_player }}</td>
        </tr>
    </table>
    @endif

    <style>
        .font {
            font-size: 30px;
        }
    </style>
    <div class="font"><br>
        <h1 style="margin-top: 230px;">
            {!! $dataLk->keterangan_lengkap !!}
        </h1>
    </div>
    @endif
</body>

</html>