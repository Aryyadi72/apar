@extends('layout.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('divisi') }}">{{ $title }}</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('apar.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Apar</label>
                                        <input type="text" class="form-control" placeholder="Masukkan kode apar"
                                            name="kode_apar">
                                    </div>

                                    <div class="form-group">
                                        <label>Merk</label>
                                        <select class="form-control" name="id_merk">
                                            <option selected disabled>Pilih Merk Apar</option>
                                            @foreach ($merks as $merk)
                                                <option value="{{ $merk->id }}">{{ $merk->merk }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tipe</label>
                                        <select class="form-control" name="id_tipe">
                                            <option selected disabled>Pilih Tipe Apar</option>
                                            @foreach ($tipeApars as $tipeApar)
                                                <option value="{{ $tipeApar->id }}">{{ $tipeApar->tipe }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select class="form-control" name="id_lokasi">
                                            <option selected disabled>Pilih Lokasi Apar</option>
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->id_lokasi }}">{{ $lokasi->nama_divisi }} -
                                                    {{ $lokasi->nama_lokasi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Berat</label>
                                        <input type="text" class="form-control" placeholder="Masukkan berat apar"
                                            name="berat">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Pembelian</label>
                                        <input type="date" class="form-control"
                                            placeholder="Masukkan tanggal pembelian apar" name="tanggal_pembelian">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('apar') }}" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
