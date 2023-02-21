@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                {{-- <h1>{{ $modul }}</h1> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Obat - Obatan</a></div>
                    {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item  active">
                            <a class="nav-link" data-toggle="tab" href="#obat">Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#distribusi">Distribusi</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="obat" class="tab-pane fade in active">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Obat - Obatan</h4>
                                @if (Auth::user()->role === 'faskes')
                                    <a href="{{ route('obat.create') }}" class="btn btn-primary float-right">Tambah</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $obat)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $obat->nama }}</td>
                                                    <td>{{ $obat->jenis }}</td>
                                                    <td>
                                                        <form action="{{ route('obat.destroy', $obat->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-warning"
                                                                href="{{ route('obat.edit', $obat->id) }}"><i
                                                                    class="fa fa-edit"></i> Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="distribusi" class="tab-pane fade">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Distribusi Obat</h4>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nik"
                                            placeholder="nomor registrasi">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success" id="btnCari" onclick="cari()"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="pasien">
                                <form action="{{ url('faskes/obat/ambil-obat') }}" method="POST">
                                    @csrf
                                    <div class="form-row" id="container">
                                        <div class="col-md-7" id="namaPasien">
                                        </div>
                                        <div class="col-md-5" id="pilihanObat">
                                            <div class="card">
                                                <div class="card-header bg-secondary">
                                                    <h4>Daftar Obat</h4>
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($data as $item)
                                                        <div class="row mt-2">
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="obat" name="obat[]"
                                                                        value="{{ $item->id }}" required>
                                                                    <label class="form-check-label" for="gridCheck1">
                                                                        {{ $item->nama }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Banyak" name="banyak[]" required>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function cari() {
            $("#idPasien").remove();
            $("#namePasien").remove();
            $("#button").remove();
            var nik = document.getElementById("nik").value;
            // console.log(nik);
            getNik(nik);
        }

        function getNik(nik) {
            $.ajax({
                type: "GET",
                url: '/obat/cari/' + nik,
                dataType: 'json',
                success: function(data) {
                    if (data.name !== undefined) {
                        $("#namaPasien").append(
                            `
                        <input type="text" class="form-control" id="namePasien" value="` + data.name + `" disabled>
                        <input type="hidden" name="userId" class="form-control" id="idPasien" value="` + data.id + `">
                         <input type="text" name="dosis" class="form-control mt-2" id="dosis" placeholder="dosis obat" required>
                         <textarea name="waktu" class="form-control mt-2">Keterangan Waktu Minum</textarea>
                        <button type="submit" class="btn btn-primary float-left mt-3" id="button">Konfirmasi</button>
                        `
                        );
                    } else {
                        $("#pilihanObat").remove();
                        $("#pasien").append(
                            `
                            <div class="container d-flex justify-content-center" id="container">
                                    <span>Data tidak ditemukan!</span>
                                </div>
                            `
                        );
                    }
                }
            });
        }
    </script>
@endsection
