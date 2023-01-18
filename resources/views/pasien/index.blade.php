@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                {{-- <h1>{{ $modul }}</h1> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pasien</a></div>
                    {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
                </div>
            </div>
            <div class="section-body">
                <div class="card">


                    <ul class="nav nav-tabs">
                        <li class="nav-item  active">
                            <a class="nav-link" data-toggle="tab" href="#pasien">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#konfigurasi">Konfigurasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#manajemen">Cluster</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="pasien" class="tab-pane fade in active">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Pasien</h4>
                                @if (Auth::user()->role === 'faskes')
                                    <a href="{{ route('pasien.create') }}" class="btn btn-primary float-right">Tambah</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $pasien)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pasien->name }}</td>
                                                    <td>{{ $pasien->email }}</td>
                                                    <td>{{ $pasien->role }}</td>
                                                    <td>
                                                        <form action="{{ route('pasien.destroy', $pasien->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-warning"
                                                                href="{{ route('pasien.edit', $pasien->id) }}"><i
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
                                                <th>Nama Pasien</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="konfigurasi" class="tab-pane fade">
                            <form action="{{ url('dikes/pasien/manajemen-user') }}" method="post">
                                @csrf
                                <div class="card-header d-flex justify-content-between">
                                    <h4>Manajemen User</h4>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                <div class="card-body" id="pasien">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pasien">Pilih Pasien</label>
                                                <select class="form-control" id="pasien" name="pasien" required>
                                                    <option selected disabled>Pilih pasien</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="faskes">Pilih Faskes</label>
                                                <select class="form-control" id="faskes" name="faskes" required>
                                                    <option selected disabled>Pilih faskes</option>
                                                    @foreach ($faskes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="manajemen" class="tab-pane fade">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Nama Faskes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cluster as $pasien)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pasien->pasien->name }}</td>
                                                    <td>{{ $pasien->faskes->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Nama Faskes</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
