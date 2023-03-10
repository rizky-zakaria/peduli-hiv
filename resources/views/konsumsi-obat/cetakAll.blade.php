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
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Periode</th>
                    <th>Target</th>
                    <th>Konsumsi</th>
                    <th>Terlewati</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->periode }}</td>
                        <td>{{ $row->konsumsi + $row->terlewati }}</td>
                        <td>{{ $row->konsumsi }}</td>
                        <td>{{ $row->terlewati }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Periode</th>
                    <th>Target</th>
                    <th>Konsumsi</th>
                    <th>Terlewati</th>
                </tr>
            </tfoot>
        </table>
    </center>
</body>
<script>
    window.print()
</script>

</html>
