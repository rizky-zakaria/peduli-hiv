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
                {{-- <div class="card"> --}}
                {{-- batas --}}

                <div class="card">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-pasien"
                                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Daftar
                                Distribusi Obat</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-obat"
                                type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Obat-obatan</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-distribusi"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Distribusi
                                Obat</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-pasien" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="card-header">
                                Daftar Distribusi Obat
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Obat</th>
                                            <th>Jenis Obat</th>
                                            <th>Jumlah</th>
                                            <th>Dosis</th>
                                            <th>Waktu Minum</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($distribusi as $obat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $obat->name }}</td>
                                                <td>{{ $obat->nama }}</td>
                                                <td>{{ $obat->jenis }}</td>
                                                <td>{{ $obat->jumlah }}</td>
                                                <td>{{ $obat->dosis }}</td>
                                                <td>{{ $obat->jam . ':' . $obat->menit }}</td>
                                                <td>
                                                    <a href="{{ url('faskes/obat/delete-distribusi-obat/' . $obat->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Obat</th>
                                            <th>Jenis Obat</th>
                                            <th>Jumlah</th>
                                            <th>Dosis</th>
                                            <th>Waktu Minum</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-obat" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                        <div class="tab-pane fade show" id="nav-distribusi" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                    <div class="row mt-2">
                                                        @foreach ($data as $item)
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="obat" name="obat[]"
                                                                        value="{{ $item->id }}">
                                                                    <label class="form-check-label" for="gridCheck1">
                                                                        {{ $item->nama . ' (' . $item->jenis . ')' }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control"
                                                                placeholder="Banyak" name="banyak" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- end batas --}}

                {{-- </div> --}}
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
                         <div class="row  mt-2">
                            <div class="col">
                                <label for="jam">Jam</label>
                                 <input type="number" name="jam" id="jam" class="form-control">
                            </div>
                            <div class="col">
                                <label for="menit">Menit</label>
                                <input type="number" name="menit" id="menit" class="form-control">
                            </div>
                        </div>    
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
