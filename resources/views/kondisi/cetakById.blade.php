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
                <h3>Laporan Kesehatan Pasien HIV-AIDS</h3>
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
            <td>No. Rekamedis</td>
            <td>:</td>
            <td>{{ $user->no_rekamedik }}</td>
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
                    <th>Berat</th>
                    <th>Tinggi</th>
                    <th>Keluhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->berat }}</td>
                        <td>{{ $row->tinggi }}</td>
                        <td>{{ $row->keluhan }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Berat</th>
                    <th>Tinggi</th>
                    <th>Keluhan</th>
                </tr>
            </tfoot>
        </table>
    </center>
</body>
<script>
    window.print()
</script>

</html>
