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
                        <form action="{{ route('art.post') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-10">
                                    <select name="periode" id="periode" class="form-control">
                                        <option disabled selected>Pilih Periode</option>
                                        <option value="Jan">Januari</option>
                                        <option value="Feb">Februari</option>
                                        <option value="Mar">Maret</option>
                                        <option value="Apr">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Jun">Juni</option>
                                        <option value="Jul">Juli</option>
                                        <option value="Agt">Agustus</option>
                                        <option value="Sep">September</option>
                                        <option value="Okt">Oktober</option>
                                        <option value="Nov">November</option>
                                        <option value="Des">Desember</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-warning"><i
                                            class="fas fa-print"></i>Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
