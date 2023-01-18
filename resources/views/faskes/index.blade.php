@extends('layouts.template')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            {{-- <h1>{{ $modul }}</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Faskes</a></div>
                {{-- <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div> --}}
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Fasilitas Kesehatan</h4>
                    @if (Auth::user()->role === 'dikes')
                    <a href="{{ route('faskes.create') }}" class="btn btn-primary float-right">Tambah</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Faskes</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $faskes)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$faskes->name}}</td>
                                    <td>{{$faskes->email}}</td>
                                    <td>{{$faskes->role}}</td>
                                    <td>
                                        <form action="{{ route('faskes.destroy', $faskes->id) }}" method="POST">
                                            <a class="btn btn-warning" href="{{route('faskes.edit', $faskes->id)}}"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Faskes</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;height: 100%">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection