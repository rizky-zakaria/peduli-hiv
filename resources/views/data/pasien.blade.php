<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        @page {
            size: auto;
            margin: 0mm;
        }
    </style>
    <title>Data Pasien</title>
</head>

<body>

    <div class="container d-flex justify-content-center mt-5">
        <span class="text-center">
            <h3>Laporan Pasien HIV-AIDS</h3>
            <p>{{ $faskes->name }} <br>
                Alamat : {{ $faskes->alamat }}</p>
        </span>
    </div>
    <div class="container d-flex justify-content-center mt-1">
        <table cellspacing="7" border="1" class="text-center" style="width: 100%">
            <tr>
                <td>No. Regis Nasional</td>
                <td>Nama</td>
                <td>NIK</td>
                <td>Diagnosa</td>
                <td>Tgl Lahir</td>
                <td>JK</td>
                <td>Alamat</td>
                <td>Kehamilan</td>
                <td>Telp.</td>
                <td>Fungsional</td>
                <td>Pendidikan</td>
                <td>Pekerjaan</td>
            </tr>
            @foreach ($biodata as $item)
                <tr>
                    <td>{{ $item->no_reg_nas }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->jk }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->hamil }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->fungsional }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>
</body>

</html>
