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
                        <h4>DATA ART</h4>
                        {{-- <a href="{{ route('kesehatan.printAll') }}" class="btn btn-warning"><i class="fas fa-print"></i> --}}
                        {{-- Print Semua Data</a> --}}
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->role === 'dikes')
                            <form action="{{ route('art-dikes.post') }}" method="post">
                            @else
                                <form action="{{ route('art.post') }}" method="post">
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="col-10">
                                <select name="periode" id="periode" class="form-control">
                                    <option disabled selected>Pilih Periode</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                    {{-- <option disabled selected>Pilih Periode</option>
                                    <option value="{{ 'Jan-' . date('Y') }}">Januari</option>
                                    <option value="{{ 'Feb-' . date('Y') }}">Februari</option>
                                    <option value="{{ 'Mar-' . date('Y') }}">Maret</option>
                                    <option value="{{ 'Apr-' . date('Y') }}">April</option>
                                    <option value="{{ 'May-' . date('Y') }}">Mei</option>
                                    <option value="{{ 'Jun-' . date('Y') }}">Juni</option>
                                    <option value="{{ 'Jul-' . date('Y') }}">Juli</option>
                                    <option value="{{ 'Aug-' . date('Y') }}">Agustus</option>
                                    <option value="{{ 'Sep-' . date('Y') }}">September</option>
                                    <option value="{{ 'Oct-' . date('Y') }}">Oktober</option>
                                    <option value="{{ 'Nov-' . date('Y') }}">November</option>
                                    <option value="{{ 'Dec-' . date('Y') }}">Desember</option> --}}
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i>Cetak</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
