<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Data ART</title>
</head>

<body>

    <h4 style="margin-left: 10px">Data Pasien ART</h4>
    <table border="1" style="width: 90%; margin: 10px">
        <tr>
            <td>No. Registrasi Nasional</td>
            <td>{{ $biodata->no_reg_nas }}</td>
        </tr>
        <tr>
            <td>Tanggal Mulai ART</td>
            <td>{{ $biodata->tgl_kunjungan }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $biodata->name }}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>{{ $umur }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $biodata->jk }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $biodata->alamat }}</td>
        </tr>
        <tr>
            <td>Hamil / Tidak</td>
            <td>{{ $biodata->hamil }}</td>
        </tr>
        <tr>
            <td>Nomor Telpon</td>
            <td>{{ $biodata->no_telp }}</td>
        </tr>
    </table>

    <h4 style="margin-left: 10px">Data ART / Bulan</h4>
    <table border="1" style="width: 90%; margin: 10px">
        <tr>
            <td>Periode/Bulan Laporan</td>
            <td colspan="3">{{ date('M') }}</td>
        </tr>
        <tr>
            <td>Nomor Registrasi Nasional</td>
            <td colspan="3">{{ $biodata->no_reg_nas }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td colspan="3">{{ $biodata->name }}</td>
        </tr>
        <tr>
            <td>Status Fungsional</td>
            <td>
                @if ($biodata->fungsional === 'Kerja')
                    <input type="checkbox" checked>
                @endif
                Kerja
            </td>
            <td>
                @if ($biodata->fungsional === 'Ambulatori')
                    <input type="checkbox" checked>
                @endif
                Ambulatori
            </td>
            <td>
                @if ($biodata->fungsional === 'Baring')
                    <input type="checkbox" checked>
                @endif
                Baring
            </td>
        </tr>
        <tr>
            <td>Berat Badan</td>
            <td colspan="3">{{ $biodata->name }}</td>
        </tr>
        <tr>
            <td>Nilai CD4</td>
            <td colspan="3">{{ $biodata->cd4 }}</td>
        </tr>
        <tr>
            <td>IMS</td>
            <td colspan="3">{{ $biodata->ims }}</td>
        </tr>
        <tr>
            <td>ADHERENC</td>
            <td colspan="3">{{ $adher }} %</td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        window.print();
    </script>
</body>

</html>
