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
                                {{-- <a href="{{ route('apar.create') }}" class="btn btn-icon btn-primary">Tambah Data</a> --}}
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
                                                <th>Divisi</th>
                                                <th>Lokasi</th>
                                                <th>Standard Pengisian</th>
                                                <th>Terakhir Refill</th>
                                                <th>Next Refill</th>
                                                <th>Keterangan</th>
                                                @if (session('level') != 'Asst. Sub Div')
                                                    <th>Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($refills as $index => $refill)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td>{{ $refill->kode_apar }}</td>
                                                    <td>{{ $refill->divisi }}</td>
                                                    <td>{{ $refill->lokasi }}</td>
                                                    <td>{{ $refill->standard_pengisian }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($refill->terakhir_refill)->format('F Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($refill->next_refill)->format('F Y') }}
                                                    </td>
                                                    @php
                                                        $next_refill = $refill->next_refill;
                                                    @endphp
                                                    @if ($next_refill == $today)
                                                        <td>Perlu Refill!!!</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                    @if ($next_refill <= $today)
                                                        @if (session('level') != 'Asst. Sub Div')
                                                            <td>
                                                                <button class="btn btn-icon btn-primary" id="modal-1"
                                                                data-toggle="modal"
                                                                data-target="#refillModal-{{ $refill->apar_id }}"><i
                                                                    class="fas fa-gas-pump"></i></button>
                                                            </td>
                                                        @endif
                                                    @else
                                                        @if (session('level') != 'Asst. Sub Div')
                                                            <td><button class="btn btn-icon btn-secondary" disabled><i
                                                                        class="fas fa-gas-pump"></i></button></td>
                                                        @endif
                                                    @endif
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

    @foreach ($refills as $refill)
    <div class="modal fade" tabindex="-1" role="dialog" id="refillModal-{{ $refill->apar_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Data Refill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('refill.update', $refill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="id_apar" value="{{ $refill->apar_id }}">
                            <input type="hidden" name="tipe" value="{{ $refill->tipe }}">
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
    @endforeach
@endsection
