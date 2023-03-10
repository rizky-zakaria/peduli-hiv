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
                                        <th>Nomor Regis Nasional</th>
                                        <th>Nama Pasien</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $pasien)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pasien->no_reg_nas }}</td>
                                            <td>{{ $pasien->name }}</td>
                                            <td>{{ $pasien->email }}</td>
                                            <td>
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                                    <a class="btn btn-success"
                                                        href="{{ route('pasien.edit', $pasien->id) }}"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i> Hapus</button>
                                                </form>
                                                <a href="{{ route('cd4.create', $pasien->id) }}"
                                                    class="btn btn-warning mt-1"><i class="fas fa-chart-bar"></i> ART</a>
                                                {{-- <a href="{{ url('faskes/data-master/art/' . $pasien->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-chart-bar">
                                                    </i> Data ART</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Regis Nasional</th>
                                        <th>Nama Pasien</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
