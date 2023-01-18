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
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Berat</th>
                    <th>Tinggi</th>
                    <th>Keluhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->berat }}</td>
                        <td>{{ $row->tinggi }}</td>
                        <td>{{ $row->keluhan }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
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
