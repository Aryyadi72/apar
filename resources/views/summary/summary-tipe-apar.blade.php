@extends('layout.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('divisi') }}">{{ $title }}</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Lokasi</th>
                                                <th>Foam</th>
                                                <th>Powder</th>
                                                <th>CO</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($summaryTipeApar as $tipeApar)
                                                <tr>
                                                    <td>{{ $tipeApar->divisi }}</td>
                                                    <td>{{ $tipeApar->foam ?: '-' }}</td>
                                                    <td>{{ $tipeApar->powder ?: '-' }}</td>
                                                    <td>{{ $tipeApar->co ?: '-' }}</td>
                                                    <td>{{ $tipeApar->foam + $tipeApar->powder + $tipeApar->co }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ $totals['foam'] }}</td>
                                                <td>{{ $totals['powder'] }}</td>
                                                <td>{{ $totals['co'] }}</td>
                                                <td>{{ $totals['jumlah'] }}</td>
                                            </tr>
                                        </tfoot>
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
