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
                                                <th rowspan="2">
                                                    Merk
                                                </th>
                                                <th colspan="2">Kondisi Apar</th>
                                                <th rowspan="2">Jumlah</th>
                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($allSummaryMerkApar as $summary)
                                                @foreach ($summary as $data)
                                                    <tr>
                                                        <td>{{ $data->merk }}</td>
                                                        <td>{{ $data->kondisi_b }}</td>
                                                        <td>{{ $data->kondisi_tb }}</td>
                                                        <td>{{ $data->kondisi_b + $data->kondisi_tb }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ $totatKondisiAparMerkB }}</td>
                                                <td>{{ $totatKondisiAparMerkTB }}</td>
                                                <td>{{ $totatKondisiAparMerkB + $totatKondisiAparMerkTB }}</td>
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
