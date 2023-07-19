<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="container d-flex justify-content-center mt-5">
            <span class="text-center">
                <h3>Laporan Konsumsi Obat Pasien HIV-AIDS</h3>
                <p>{{ $faskes->name }} <br>
                    Alamat : {{ $faskes->alamat }}</p>
            </span>
        </div>
    </center>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $user->nik }}</td>
        </tr>
        <tr>
            <td>No. Registrasi</td>
            <td>:</td>
            <td>{{ $user->no_reg_nas }}</td>
        </tr>
    </table>
    <center>
        <table border="1" style="width: 100%; margin-top: 3%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Target</th>
                    <th>Konsumsi</th>
                    <th>Terlewati</th>
                    <th>Klasifikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->periode }}</td>
                        <td>{{ $row->konsumsi + $row->terlewati }}</td>
                        <td>{{ $row->konsumsi }}</td>
                        <td>{{ $row->terlewati }}</td>
                        <td>
                            @if ($row->kepatuhan <= 80)
                                Pengecekan Laboratorium
                            @elseif($row->kepatuhan <= 95)
                                Dirujuk ke Faskes
                            @else
                                Minum Obat
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Target</th>
                    <th>Konsumsi</th>
                    <th>Terlewati</th>
                    <th>Klasifikasi</th>
                </tr>
            </tfoot>
        </table>
    </center>
</body>
<script>
    window.print()
</script>

</html>
