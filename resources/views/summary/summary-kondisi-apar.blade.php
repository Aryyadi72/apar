@extends('layout.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }} - {{ $yearNow }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('divisi') }}">{{ $title }} - {{ $yearNow }}</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title }} - {{ $yearNow }}</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2">
                                                    No
                                                </th>
                                                <th rowspan="2">
                                                    Bulan
                                                </th>
                                                <th colspan="2">Kondisi Apar</th>
                                                <th rowspan="2">Jumlah</th>
                                                <th rowspan="2">Option</th>
                                            </tr>
                                            <tr>
                                                <th>OK</th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>Januari</td>

                                                @if ($summaryKondisiAparJan == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJan }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJanTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJanTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJanTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJanTotal }}</td>
                                                @endif

                                                <td>
                                                    <form action="{{ route('summary-kondisi-apar-lokasi') }}"
                                                        method="GET">
                                                        @csrf
                                                        <input type="hidden" name="bulan" id="" value="January">
                                                        <input type="hidden" name="tahun" id=""
                                                            value="{{ $yearNow }}">
                                                        <button type="submit" class="btn btn-icon btn-primary"><i
                                                                class="fas fa-location-arrow"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Februari</td>
                                                @if ($summaryKondisiAparFeb == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparFeb }}</td>
                                                @endif

                                                @if ($summaryKondisiAparFebTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparFebTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparFebTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparFebTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Maret</td>
                                                @if ($summaryKondisiAparMar == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMar }}</td>
                                                @endif

                                                @if ($summaryKondisiAparMarTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMarTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparMarTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMarTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>April</td>
                                                @if ($summaryKondisiAparApr == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparApr }}</td>
                                                @endif

                                                @if ($summaryKondisiAparAprTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparAprTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparAprTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparAprTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Mei</td>
                                                @if ($summaryKondisiAparMei == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMei }}</td>
                                                @endif

                                                @if ($summaryKondisiAparMeiTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMeiTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparMeiTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparMeiTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Juni</td>
                                                @if ($summaryKondisiAparJun == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJun }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJunTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJunTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJunTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJunTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Juli</td>
                                                @if ($summaryKondisiAparJul == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJul }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJulTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJulTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparJulTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparJulTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Agustus</td>
                                                @if ($summaryKondisiAparAug == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparAug }}</td>
                                                @endif

                                                @if ($summaryKondisiAparAugTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparAugTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparAugTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparAugTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>September</td>
                                                @if ($summaryKondisiAparSep == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparSep }}</td>
                                                @endif

                                                @if ($summaryKondisiAparSepTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparSepTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparSepTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparSepTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Oktober</td>
                                                @if ($summaryKondisiAparOkt == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparOkt }}</td>
                                                @endif

                                                @if ($summaryKondisiAparOktTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparOktTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparOktTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparOktTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>November</td>
                                                @if ($summaryKondisiAparNov == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparNov }}</td>
                                                @endif

                                                @if ($summaryKondisiAparNovTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparNovTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparNovTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparNovTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Desember</td>
                                                @if ($summaryKondisiAparDes == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparDes }}</td>
                                                @endif

                                                @if ($summaryKondisiAparDesTB == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparDesTB }}</td>
                                                @endif

                                                @if ($summaryKondisiAparDesTotal == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $summaryKondisiAparDesTotal }}</td>
                                                @endif

                                                <td>
                                                    <a href="#" class="btn btn-icon btn-primary">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                </td>
                                            </tr>
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
