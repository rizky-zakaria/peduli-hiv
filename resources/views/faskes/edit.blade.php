@extends('layouts.template')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            {{-- <h1>{{ $modul }}</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Edit Data Pasien</a></div>
                {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('faskes.update', $faske->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Faskes</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Faskes" value="{{old('name', $faske->name)}}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email@example.com" value="{{old('email', $faske->email)}}" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" value="{{old('password', $faske->password)}}" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>


@endsection