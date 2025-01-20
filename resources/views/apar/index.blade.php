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
                            <div class="card-header">
                                <a href="{{ route('apar.create') }}" class="btn btn-icon btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Kode</th>
                                                <th>Merk</th>
                                                <th>Tipe</th>
                                                <th>Divisi</th>
                                                <th>Lokasi</th>
                                                <th>Berat</th>
                                                <th>Tanggal Pembelian</th>
                                                <th class="text-center">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($apars as $index => $apar)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td>{{ $apar->kode_apar }}</td>
                                                    <td>{{ $apar->merk }}</td>
                                                    <td>{{ $apar->tipe }}</td>
                                                    <td>{{ $apar->divisi }}</td>
                                                    <td>{{ $apar->lokasi }}</td>
                                                    <td>{{ $apar->berat }} kg</td>
                                                    @if ($apar->tanggal_pembelian == null)
                                                        <td> - </td>
                                                    @else
                                                        <td>{{ \Carbon\Carbon::parse($apar->tanggal_pembelian)->format('d-m-Y') }}
                                                        </td>
                                                    @endif
                                                    <td class="text-center">
                                                        <a href="{{ route('apar.edit', $apar->apar_id) }}"
                                                            class="btn btn-icon btn-primary">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-icon btn-danger" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal-{{ $apar->apar_id }}"><i
                                                                class="fas fa-times"></i></button>
                                                        <button class="btn btn-icon btn-success" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#refillModal-{{ $apar->apar_id }}"><i
                                                                class="fas fa-gas-pump"></i></button>
                                                        <button class="btn btn-icon btn-warning" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#kondisiAparModal-{{ $apar->apar_id }}"><i
                                                                class="fas fa-check-circle"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @foreach ($apars as $apar)
        <div class="modal fade" tabindex="-1" role="dialog" id="kondisiAparModal-{{ $apar->apar_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Kondisi Apar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kondisi-apar.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_apar" value="{{ $apar->apar_id }}">

                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="month" class="form-control" name="bulan">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Segel</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="segel" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="segel" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jarum</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jarum" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jarum" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tabung</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="tabung" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="tabung" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Selang</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="selang" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="selang" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nozzle</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nozzle" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nozzle" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Judge</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="judge" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">OK</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="judge" value="TB" class="selectgroup-input">
                                        <span class="selectgroup-button">TIDAK</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="refillModal-{{ $apar->apar_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Data Refill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('refill.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_apar" value="{{ $apar->apar_id }}">
                            <input type="hidden" name="tipe" value="{{ $apar->tipe }}">
                            <div class="form-group">
                                <label>Terakhir Refill</label>
                                <input type="date" class="form-control" placeholder="Masukkan tanggal terakhir refill"
                                    name="terakhir_refill">
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal-{{ $apar->apar_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('apar.delete', $apar->apar_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
