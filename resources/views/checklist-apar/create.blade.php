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
                            <form action="{{ route('checklist-apar.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Apar</label>
                                        <select class="form-control" name="id_apar">
                                            <option selected disabled>Pilih Apar</option>
                                            @foreach ($apars as $apar)
                                                <option value="{{ $apar->id_apar }}">{{ $apar->divisi }} -
                                                    {{ $apar->lokasi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Pengecekan</label>
                                        <input type="date" class="form-control"
                                            placeholder="Masukkan tanggal pengecekan apar" name="tanggal_pengecekan">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Kondisi Segel</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_segel" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_segel" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Jarum berada pada warna hijau</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="posisi_jarum" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="posisi_jarum" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Selang baik (tidak retak/cacat)</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_selang" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_selang" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tabung tidak berkarat</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_tabung" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_tabung" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Apakah air penuh (Drum 2 bh)</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_air" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_air" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Apakah Karung goni baik dan lengkap (5 bh)</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_karung" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_karung" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Apakah box dalam kondisi bersih</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_box" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="kondisi_box" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Approve Petugas</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="approve_petugas" value="B"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">OK</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="approve_petugas" value="TB"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">TIDAK</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Lain-lain</label>
                                        <input type="text" class="form-control"
                                            placeholder="Tambahkan jika ada hal lain" name="lain_lain">
                                    </div>

                                    <div class="form-group">
                                        <label>Komentar</label>
                                        <input type="text" class="form-control" placeholder="Tambahkan komentar"
                                            name="komentar">
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('checklist-apar') }}" class="btn btn-danger">Kembali</a>
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
