@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">

            <div class="section-header">
                {{-- <h1>{{ $modul }}</h1> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Tambah Data Pasien</a></div>
                    {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('faskes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Faskes</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Faskes"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email@example.com"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option selected disabled>Pilih</option>
                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                    <option value="Puskesmas">Puskesmas</option>
                                    <option value="Klinik">Klinik</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
