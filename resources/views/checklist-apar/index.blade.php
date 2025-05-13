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
                            @if (session('level') != 'Asst. Sub Div' && session('level') != 'Asst. HSE & DP')
                                <div class="card-header">
                                    <a href="{{ route('checklist-apar.create') }}" class="btn btn-icon btn-primary">Tambah
                                        Data</a>
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="GET" action="{{ route('checklist-apar') }}" class="mb-3">
                                    <div class="form-row align-items-end">
                                        <div class="col-md-3">
                                            <label for="start_date">Tanggal Mulai</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                value="{{ request('start_date') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="end_date">Tanggal Akhir</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                value="{{ request('end_date') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a href="{{ route('checklist-apar') }}" class="btn btn-secondary">Reset</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr class="text-center">
                                                {{-- <th rowspan="2">Bulan</th> --}}
                                                <th>Tanggal Pengecekan</th>
                                                <th>Nama Lokasi / Kode Lokasi</th>
                                                <th>Kode APAR</th>
                                                {{-- <th colspan="4">APAR</th> --}}
                                                <th>Kondisi Segel</th>
                                                <th>Jarum berada pada warna hijau</th>
                                                <th>Selang baik (tidak retak/cacat)</th>
                                                <th>Tabung tidak berkarat</th>
                                                <th>Apakah air penuh (Drum 2 bh)</th>
                                                <th>Apakah karung goni baik dan lengkap (5 bh)</th>
                                                <th>Apakah box dalam kondisi bersih</th>
                                                <th>Lain-lain</th>
                                                <th>Komentar</th>
                                                <!-- <th colspan="5">Approve</th> -->
                                            </tr>
                                            {{-- <tr> --}}
                                            {{-- <th>Kondisi Segel</th> --}}
                                            {{-- <th>Jarum berada pada warna hijau</th> --}}
                                            {{-- <th>Selang baik (tidak retak/cacat)</th> --}}
                                            {{-- <th>Tabung tidak berkarat</th> --}}
                                            <!-- <th>Petugas</th>
                                                                                                                <th>Asst. Sub. Div</th>
                                                                                                                <th>Asst. DP</th>
                                                                                                                <th>Asst. HSE & DP</th>
                                                                                                                <th>Mng. HSE & DP</th> -->
                                            {{-- </tr> --}}
                                        </thead>
                                        {{-- <tbody class="text-center">
                                            @foreach ($checklistApars as $bulan => $dataBulan)
                                                <tr>
                                                    <td rowspan="{{ count($dataBulan) + 1 }}">{{ $bulan }}</td>
                                                </tr>
                                                @foreach ($dataBulan as $data)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_pengecekan)->format('d/M/y') }}
                                                        </td>
                                                        <td>{{ $data->lokasi }}</td>
                                                        <td>{{ $data->kode_apar }}</td>

                                                        @if ($data->kondisi_segel == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_segel == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->posisi_jarum == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->posisi_jarum == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->kondisi_selang == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_selang == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->kondisi_tabung == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_tabung == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->kondisi_air == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_air == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->kondisi_karung == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_karung == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->kondisi_box == 'B')
                                                            <td><span class="badge badge-success"><i
                                                                        class="fas fa-check"></i></span></td>
                                                        @elseif($data->kondisi_box == null)
                                                            <td><span class="badge badge-secondary">-</span></td>
                                                        @else
                                                            <td><span class="badge badge-danger"><i
                                                                        class="fas fa-times"></i></span></td>
                                                        @endif

                                                        @if ($data->lain_lain != null)
                                                            <td>{{ $data->lain_lain }}</td>
                                                        @else
                                                            <td>-</td>
                                                        @endif

                                                        @if ($data->kondisi_box == 'B')
                                                            <td>{{ $data->komentar }}</td>
                                                        @else
                                                            <td>-</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody> --}}

                                        <tbody class="text-center">
                                            @foreach ($checklistApars as $index => $checklistApar)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($checklistApar->tanggal_pengecekan)->format('d/M/y') }}
                                                    </td>
                                                    <td>{{ $checklistApar->lokasi }}</td>
                                                    <td>{{ $checklistApar->kode_apar }}</td>
                                                    @if ($checklistApar->kondisi_segel == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_segel == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->posisi_jarum == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->posisi_jarum == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_selang == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_selang == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_tabung == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_tabung == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_air == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_air == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_karung == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_karung == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_box == 'B')
                                                        <td><span class="badge badge-success"><i
                                                                    class="fas fa-check"></i></span></td>
                                                    @elseif($checklistApar->kondisi_box == null)
                                                        <td><span class="badge badge-secondary">-</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"><i
                                                                    class="fas fa-times"></i></span></td>
                                                    @endif

                                                    @if ($checklistApar->lain_lain != null)
                                                        <td>{{ $checklistApar->lain_lain }}</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif

                                                    @if ($checklistApar->kondisi_box == 'B')
                                                        <td>{{ $checklistApar->komentar }}</td>
                                                    @else
                                                        <td>-</td>
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
