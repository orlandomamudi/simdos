<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .bio {
            text-align: center;
            margin-bottom: 20px;
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 16px;
        }

        .content {
            margin: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 3px;
        }

        th {
            background-color: #f2f2f2;
        }

        .noBorder {
            border: none !important;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h1>
        <h1>UNIVERSITAS SAM RATULANGI</h1>
        <h1>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h1>
        <p>Alamat Jl. KampusUnsratBahu-Manado 95115</p>
        <p>Telp. (0431) 864386, Fax (0431) 853715, HP. 08114314386</p>
        <p>Website : www.fmipa-unsrat.com; Email : fmipaunsrat@yahoo.com</p>
    </div>

    <div class="content">
        <h1 class="bio">BIODATA</h1>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Riwayat Pendidikan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="width: 40%">Pendidikan & Pengajaran</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('pendidikan_pengajaran')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('pendidikan_pengajaran')->get() as $item)
                                <p>{{ $item->pendidikan_pengajaran }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Pengabdian</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('pengabdian')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('pengabdian')->get() as $item)
                                <p>{{ $item->pengabdian }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Penunjang</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('penunjang')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('penunjang')->get() as $item)
                                <p>{{ $item->penunjang }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th style="width: 40%">Gelar Akademik</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('gelar_akademik')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('gelar_akademik')->get() as $item)
                                <p>{{ $item->gelar_akademik }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Bidang Keahlian</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('bidang_keahlian')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('bidang_keahlian')->get() as $item)
                                <p>{{ $item->bidang_keahlian }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Pengalaman Mengajar</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('pengalaman_mengajar')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('pengalaman_mengajar')->get() as $item)
                                <p>{{ $item->pengalaman_mengajar }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Publikasi Ilmiah</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('publikasi_ilmiah')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('publikasi_ilmiah')->get() as $item)
                                <p>{{ $item->publikasi_ilmiah }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%">Aktivitas Penelitian</th>
                    <td>
                        @if (count($user->biodata()->whereNotNull('aktivitas_penelitian')->get()) > 0)
                            @foreach ($user->biodata()->whereNotNull('aktivitas_penelitian')->get() as $item)
                                <p>{{ $item->aktivitas_penelitian }}</p>
                            @endforeach
                        @else
                            <p>Data belum tersedia.</p>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse: collapse; border: none;">
            <tbody>
                <tr style="border: none;">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="width: 30%; border: none;">
                        Manado, {{ date('d F Y') }}
                        <br>
                        Dekan
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="width: 30%; border: none;">
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="width: 40%; border: none;">
                        <p>Prof. Dr. Benny Pinontoan,MSc.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
