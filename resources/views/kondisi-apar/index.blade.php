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
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Kode</th>
                                                <th>Divisi</th>
                                                <th>Lokasi</th>
                                                <th>Segel</th>
                                                <th>Jarum</th>
                                                <th>Tabung</th>
                                                <th>Selang</th>
                                                <th>Nozzle</th>
                                                <th>Judge</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kondisiApars as $index => $kondisiApar)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($kondisiApar->bulan)->format('Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($kondisiApar->bulan)->format('F') }}</td>
                                                    <td>{{ $kondisiApar->kode_apar }}</td>
                                                    <td>{{ $kondisiApar->divisi }}</td>
                                                    <td>{{ $kondisiApar->lokasi }}</td>

                                                    @if ($kondisiApar->segel == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($kondisiApar->jarum == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($kondisiApar->tabung == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($kondisiApar->selang == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($kondisiApar->nozzle == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($kondisiApar->judge == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
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
@endsection
