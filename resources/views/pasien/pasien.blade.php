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
                            <form action="{{ route('data.post-pasien') }}" method="post">
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="col-10">
                                <select name="id" id="id"
                                    class="form-control @error('id')
                                    is-invalid
                                @enderror"
                                    required>
                                    <option disabled selected>Pilih Faskes</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
