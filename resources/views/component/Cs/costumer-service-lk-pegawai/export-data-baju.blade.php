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

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    {{-- player --}}
    <h3 style="text-align: center; margin-top: -30px; text-transform: uppercase;">{{
        $dataLk->BarangMasukDisainer->nama_tim }}</h3><br>
    <h4 style="margin-top: -40px; text-align: center; text-transform: uppercase;">{{ $dataLk->no_order }}</h4><br>
    <h4 style="margin-top: -80px; text-transform: uppercase;">{{ $dataLk->kota_produksi }}</h4>

    <table class="posisi" style="width: 72%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <style>
                .gambar1 {
                    max-width: 630px;
                    min-width: 630px;
                    margin-left: 50px;
                }
            </style>
            <td colspan="2">
                <img class="gambar1" src="{{ public_path('storage/'. $dataLk->Gambar->file_baju_pelatih)}}">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{!! $dataLk->keterangan_baju_pelayer !!} </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">TOTAL {{ $dataLk->total_baju_player }} PCS</td>
        </tr>
    </table>

    <style>
        .posisi {
            float: left;
        }

        .posisi1 {
            clear: both;
            width: 30%;
            margin-left: 743px;
            margin-top: -410px;
            text-transform: uppercase;
        }

        .posisi2 {
            position: absolute;
            width: 30%;
            text-transform: uppercase;
            margin-left: 743px;
            margin-top: -245px;
        }

        .posisi3 {
            position: absolute;
            width: 30%;
            text-transform: uppercase;
            margin-left: 743px;
            margin-top: 40px;
        }
    </style>

    <table class="posisi" style="width: 30%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">
                @if ($dataLk->ket_hari == 'Express')
                <span style="color: red">DEADLINE EXPRESS</span>
                @elseif ($dataLk->ket_hari == 'SNormal')
                DEADLINE Normal
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
    </table>

    <table class="posisi1">
        <style>
            .gambarket {
                max-width: 60px;
                min-width: 60px;
                margin-left: 15px;
            }
        </style>
        <tr>
            <td>
                <img class="gambarket" src="{{ public_path('storage/'. $dataLk->KeraPlayer->gambar)}}">
            </td>
            <td>{{ $dataLk->KeraPlayer->jenis_kera }}</td>
        </tr>
        <tr>
            <td>
                <img class="gambarket" src="{{ public_path('storage/'. $dataLk->LenganPlayer->gambar)}}">
            </td>
            <td>{{ $dataLk->LenganPlayer->jenis_kera }}</td>
        </tr>
    </table>

    <table class="posisi2">
        <tr>
            <td>Jenis mesin</td>
            <td>{{ $dataLk->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>jenis sublim</td>
            <td>{{ $dataLk->jenis_sablon_baju_player }}</td>
        </tr>
        <tr>
            <td>jenis kain</td>
            <td>{{ $dataLk->jenis_kain_baju_player }}</td>
        </tr>
        <tr>
            <td>ket. kumis</td>
            <td>{{ $dataLk->ket_kumis_baju_player }}</td>
        </tr>
        <tr>
            <td>ket. bantalan</td>
            <td>{{ $dataLk->ket_bantalan_baju_player }}</td>
        </tr>
        <tr>
            <td>ket. celana</td>
            <td>{{ $dataLk->ket_celana_player }}</td>
        </tr>
        <tr>
            <td colspan="2">keterangan tambahan <br>
                {{ $dataLk->ket_tambahan_baju_player }}
            </td>
        </tr>
    </table>

    <table class="posisi3">
        <tr>
            <td>Admin</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>Layout</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
    </table>



























    {{-- celana --}}
    {{-- <h3 style="text-align: center; margin-top: -30px; text-transform: uppercase; page-break-before: always;">{{
        $dataLk->BarangMasukDisainer->nama_tim }}</h3><br>
    <h4 style="margin-top: -40px; text-align: center; text-transform: uppercase;">{{ $dataLk->no_order }}</h4><br>
    <h4 style="margin-top: -80px; text-transform: uppercase;">{{ $dataLk->kota_produksi }}</h4>

    <table class="posisi" style="width: 72%; margin-left: -20px; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <style>
                .gambarcelanaplayer {
                    max-width: 330px;
                    min-width: 330px;
                    margin-left: 200px;
                }

                .ketcelana {
                    max-width: 130px;
                    min-width: 130px;
                    margin-left: 100px;
                }
            </style>
            <td colspan="2">
                <img class="gambarcelanaplayer" src="{{ public_path('storage/'. $dataLk->Gambar->file_celana_player)}}">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{!! $dataLk->keterangan_celana_pelayer !!} </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">TOTAL {{ $dataLk->total_celana_player }} PCS</td>
        </tr>
        <tr>
            <td style="text-align: center">keterangan tambahan <br> {{ $dataLk->ket_tambahan_celana_player }}</td>
            <td>
                <img class="ketcelana" src="{{ public_path('storage/'. $dataLk->CelanaPlayer->gambar)}}">
            </td>
        </tr>
    </table>
    <table class="posisi" style="width: 30%; margin-top: -20px; text-transform: uppercase;">
        <tr>
            <td colspan="2" style="text-align: center">
                @if ($dataLk->ket_hari == 'Express')
                <span style="color: red">DEADLINE EXPRESS</span>
                @elseif ($dataLk->ket_hari == 'Normal')
                DEADLINE Normal
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">{{ $dataLk->deadline }}</td>
        </tr>
    </table>

    <style>
        .posisicelanaplayer {
            clear: both;
            width: 30%;
            margin-left: 743px;
            margin-top: -440px;
            text-transform: uppercase;
        }

        .posisicelana1 {
            position: absolute;
            width: 30%;
            margin-left: 743px;
            margin-top: -340px;
            text-transform: uppercase;
        }

        .posisicelana2 {
            position: absolute;
            width: 30%;
            margin-left: 743px;
            margin-top: -240px;
            text-transform: uppercase;
        }

        .posisicelana3 {
            position: absolute;
            width: 30%;
            margin-left: 743px;
            margin-top: -140px;
            text-transform: uppercase;
        }
    </style>
    <table class="posisicelanaplayer">
        <tr>
            <td>Admin</td>
            <td>{{ $dataLk->UsersOrder->name }}</td>
        </tr>
        <tr>
            <td>Layout</td>
            <td>{{ $dataLk->UsersLk->name }}</td>
        </tr>
    </table>
    <table class="posisicelana1">
        <tr>
            <td colspan="2">ket. warna kain</td>
        </tr>
        <tr>
            <td colspan="2">{{ $dataLk->ket_warna_kain_celana_player }}</td>
        </tr>
    </table>
    <table class="posisicelana2">
        <tr>
            <td colspan="2">ket bis celana</td>
        </tr>
        <tr>
            <td colspan="2">{{ $dataLk->ket_bis_celana_celana_player }}</td>
        </tr>
    </table> --}}
    {{-- <table class="posisicelana3">
        <tr>
            <td colspan="2">ket kumis</td>
        </tr>
        <tr>
            <td colspan="2">{{ $dataLk->UsersLk->name }}</td>
        </tr>
    </table> --}}










    {{-- @if ($dataLk->Gambar->file_baju_1)
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
                    src="{{ public_path('storage/'. $dataLk->Gambar->file_baju_player)}}">
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

    @if ($dataLk->Gambar->file_celana_player)
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

    @if ($dataLk->Gambar->file_celana_pelatih)
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

    @if ($dataLk->Gambar->file_celana_kiper)
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

    @if ($dataLk->Gambar->file_celana_1)
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

    @elseif ($dataLk->Gambar->file_baju_kiper)
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
                    src="{{ public_path('storage/'. $dataLk->Gambar->file_baju_player)}}">
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

    @if ($dataLk->Gambar->file_celana_player)
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

    @if ($dataLk->Gambar->file_celana_pelatih)
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

    @if ($dataLk->Gambar->file_celana_kiper)
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
    @elseif ($dataLk->Gambar->file_baju_pelatih)
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
                    src="{{ public_path('storage/'. $dataLk->Gambar->file_baju_player)}}">
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

    @if ($dataLk->Gambar->file_celana_player)
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

    @if ($dataLk->Gambar->file_celana_pelatih)
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
    @elseif ($dataLk->Gambar->file_baju_player)
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

    @if ($dataLk->Gambar->file_celana_player)
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
    @endif --}}
</body>

</html>