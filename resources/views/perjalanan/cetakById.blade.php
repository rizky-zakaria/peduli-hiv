<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
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
                    <th>Nama Pasien</th>
                    <th>Tanggal Pergi</th>
                    <th>Tanggal Kembali</th>
                    <th>Tujuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->tgl_kunjungan }}</td>
                        <td>{{ $row->tgl_pulang }}</td>
                        <td>{{ $row->tujuan }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Pergi</th>
                    <th>Tanggal Kembali</th>
                    <th>Tujuan</th>
                </tr>
            </tfoot>
        </table>
    </center>
</body>
<script>
    window.print()
</script>

</html>
