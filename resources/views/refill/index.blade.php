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
