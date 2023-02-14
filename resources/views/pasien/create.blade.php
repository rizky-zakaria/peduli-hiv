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
                        <form action="{{ route('pasien.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="noreg">No. Registrasi</label>
                                        <input type="text" class="form-control" id="noreg"
                                            placeholder="Nomor Registrasi" name="noreg" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="norek">No. Rekamedis</label>
                                        <input type="text" class="form-control" id="norek"
                                            placeholder="Nomor Rekamedis" name="norek" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama Pasien</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Nama Pasien"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" placeholder="NIK"
                                            name="nik" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="email@example.com" name="email" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                            name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ims">Infeksi Menular Seksual</label>
                                        <input type="text" class="form-control" id="ims"
                                            placeholder="Infeksi Menular Seksual" name="ims" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cd4">Nilai CD4</label>
                                        <input type="text" class="form-control" id="cd4" placeholder="Nilai CD4"
                                            name="cd4" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fungsional">Status Fungsional</label>
                                        <select name="fungsional" id="fungsional" class="form-control" required>
                                            <option selected disabled>Pilih</option>
                                            <option value="Kerja">Kerja</option>
                                            <option value="Ambulatori">Ambulatori</option>
                                            <option value="Baring">Baring</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="notelp">No. Telepon</label>
                                        <input type="text" class="form-control" id="notelp"
                                            placeholder="Nomor Telepon" name="notelp" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir"
                                            placeholder="Tanggal Lahir" name="tgl_lahir" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Data Kehamilan</label>
                                        <select name="hamil" id="hamil" class="form-control" required>
                                            <option selected disabled>Pilih</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control" id="jk" name="jk" required>
                                            <option selected disabled>Pilih</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <select class="form-control" id="pendidikan" name="pendidikan" required>
                                            <option selected disabled>Pilih</option>
                                            <option value="SD / MI / Sederajat">SD / MI / Sederajat</option>
                                            <option value="SMP / MTs / Sederajat">SMP / MTs / Sederajat</option>
                                            <option value="SMA / MA / Sederajat">SMA / MA / Sederajat</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan"
                                                placeholder="Pekerjaan" name="pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
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
