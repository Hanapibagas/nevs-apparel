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
            width: 150px;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center; margin-top: -30px;">LEMBARAN KERJA</h3>
    <h4 style="display: flex; margin-top: -210px; text-transform: uppercase;">DISINER : {{ $dataLk->Users->name }}</h4>
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
            <td>TANNGAL JAHIT</td>
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
            <td>JENIS SUBLIM</td>
            <td>{{ $dataLk->jenis_sablon_baju }}</td>
        </tr>
        <tr>
            <td>JENIS KAIN</td>
            <td>{{ $dataLk->jenis_kain_baju }}</td>
        </tr>
        <tr>
            <td>NAMA PENJAHIT</td>
            <td></td>
        </tr>
    </table>

    <table style="margin-top: 208px; margin-left: 150px; width: 50%; text-transform: uppercase;">
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->Kera->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->Kera->jenis_kera }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/' . $dataLk->Lengan->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->Lengan->jenis_kera }}</td>
        </tr>
        @if ($dataLk->Celana)
        <tr>
            <td style="text-align: center">
                <img style="width: 30px; height: 30px;" src="{{ public_path('storage/'. $dataLk->Celana->gambar) }}"
                    alt="">
            </td>
            <td>{{ $dataLk->Celana->jenis_kera }}</td>
        </tr>
        @else
        <tr>
            <td>
                -
            </td>
            <td>-</td>
        </tr>
        @endif
    </table>

    <table style="margin-left: -20px; margin-top: 10px; width: 100%">
        <tr>
            <th colspan="2"><br>
                <img class="gambar" style="margin-top: 20px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                @if ($dataLk->file_baju_player)
                <img class="gambar" src="{{ public_path('storage/'. $dataLk->file_baju_player)}}"><br>
                @else
                <img class="gambar" src=""><br>
                @endif
                @if ($dataLk->file_baju_player)
                <img class="gambar" style="margin-bottom: 2px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                @else
                <img class="gambar" style="margin-bottom: -30px;" src="">
                @endif
                @if ($dataLk->file_baju_player)
                <img class="gambar" style="margin-bottom: 2px;"
                    src="{{ public_path('storage/'. $dataLk->file_baju_player)}}">
                @else
                <img class="gambar" style="margin-bottom: 0px;" src="">
                @endif
                <h3 style="margin-bottom: 5px; margin-top: -20px">
                    Player:
                    XS: , S: , M: , L: , XL: , 2XL: , 3XL: , 4XL: , 5XL:
                    <br>
                    Kiper:
                    XS: , S: , M: , L: , XL: , 2XL: , 3XL: , 4XL: , 5XL:
                    <br>
                    @if ($dataLk->ukuran_s_pelatih_baju || $dataLk->ukuran_m_pelatih_baju ||
                    $dataLk->ukuran_l_pelatih_baju || $dataLk->ukuran_xl_pelatih_baju || $dataLk->ukuran_xs_pelatih_baju
                    || $dataLk->ukuran_2xl_pelatih_baju || $dataLk->ukuran_3xl_pelatih_baju ||
                    $dataLk->ukuran_4xl_pelatih_baju || $dataLk->ukuran_5xl_pelatih_baju)
                    Pelatih:
                    XS: @isset($dataLk->ukuran_xs_pelatih_baju) {{ $dataLk->ukuran_xs_pelatih_baju }} @else @endisset,
                    S: @isset($dataLk->ukuran_s_pelatih_baju) {{ $dataLk->ukuran_s_pelatih_baju }} @else @endisset,
                    M: @isset($dataLk->ukuran_m_pelatih_baju) {{ $dataLk->ukuran_m_pelatih_baju }} @else @endisset,
                    L: @isset($dataLk->ukuran_l_pelatih_baju) {{ $dataLk->ukuran_l_pelatih_baju }} @else @endisset,
                    XL: @isset($dataLk->ukuran_xl_pelatih_baju) {{ $dataLk->ukuran_xl_pelatih_baju }} @else @endisset,
                    2XL: @isset($dataLk->ukuran_2xl_pelatih_baju) {{ $dataLk->ukuran_2xl_pelatih_baju }} @else
                    @endisset,
                    3XL: @isset($dataLk->ukuran_3xl_pelatih_baju) {{ $dataLk->ukuran_3xl_pelatih_baju }} @else
                    @endisset,
                    4XL: @isset($dataLk->ukuran_4xl_pelatih_baju) {{ $dataLk->ukuran_4xl_pelatih_baju }} @else
                    @endisset,
                    5XL: @isset($dataLk->ukuran_5xl_pelatih_baju) {{ $dataLk->ukuran_5xl_pelatih_baju }} @else
                    @endisset,
                    @else
                    @endif
                    <br>
                    @if ($dataLk->ukuran_s_1_baju || $dataLk->ukuran_m_1_baju || $dataLk->ukuran_l_1_baju ||
                    $dataLk->ukuran_xl_1_baju || $dataLk->ukuran_xs_1_baju || $dataLk->ukuran_2xl_1_baju ||
                    $dataLk->ukuran_3xl_1_baju || $dataLk->ukuran_4xl_1_baju || $dataLk->ukuran_5xl_1_baju)
                    Player 1:
                    XS: @isset($dataLk->ukuran_xs_1_baju) {{ $dataLk->ukuran_xs_1_baju }} @else @endisset,
                    S: @isset($dataLk->ukuran_s_1_baju) {{ $dataLk->ukuran_s_1_baju }} @else @endisset,
                    M: @isset($dataLk->ukuran_m_1_baju) {{ $dataLk->ukuran_m_1_baju }} @else @endisset,
                    L: @isset($dataLk->ukuran_l_1_baju) {{ $dataLk->ukuran_l_1_baju }} @else @endisset,
                    XL: @isset($dataLk->ukuran_xl_1_baju) {{ $dataLk->ukuran_xl_1_baju }} @else @endisset,
                    2XL: @isset($dataLk->ukuran_2xl_1_baju) {{ $dataLk->ukuran_2xl_1_baju }} @else @endisset,
                    3XL: @isset($dataLk->ukuran_3xl_1_baju) {{ $dataLk->ukuran_3xl_1_baju }} @else @endisset,
                    4XL: @isset($dataLk->ukuran_4xl_1_baju) {{ $dataLk->ukuran_4xl_1_baju }} @else @endisset,
                    5XL: @isset($dataLk->ukuran_5xl_1_baju) {{ $dataLk->ukuran_5xl_1_baju }} @else @endisset,
                    @else
                    @endif
                </h3>
            </th>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">TOTAL = {{ $dataLk->total_baju }} PCS</td>
        </tr>
    </table>

    <table style="margin-top: 10px; margin-left: -20px; text-transform: uppercase;">
        <tr>
            <td>KET.KUMIS</td>
            <td>{{ $dataLk->ket_kumis_baju }}</td>
            <td rowspan="3">KET {{ $dataLk->ket_tambahan_baju }}</td>
        </tr>
        <tr>
            <td>KET.BANTALAN</td>
            <td>{{ $dataLk->ket_bantalan_baju }}</td>
        </tr>
        <tr>
            <td>KET.CELANA</td>
            <td>{{ $dataLk->ket_celana }}</td>
        </tr>
    </table>


    {{-- data celana --}}


</body>

</html>