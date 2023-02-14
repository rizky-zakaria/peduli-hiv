@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pasien</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Konsumsi Obat</h4>
                        <a href="{{ route('kesehatan.printAll') }}" class="btn btn-warning"><i class="fas fa-print"></i>
                            Print Semua Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Berat</th>
                                        <th>Efek Samping</th>
                                        <th>Keluhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->berat }}</td>
                                            <td>{{ $row->efek }}</td>
                                            <td>{{ $row->keluhan }}</td>
                                            <td>
                                                <a href="{{ route('kesehatan.print', $row->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Berat</th>
                                        <th>Efek Samping</th>
                                        <th>Keluhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
