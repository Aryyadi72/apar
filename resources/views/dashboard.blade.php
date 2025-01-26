@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-fire-extinguisher"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Apar</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalApar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-fire-extinguisher"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Jenis Apar</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalJenisApar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Merk Apar</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalMerkApar }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Maps --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lokasi Apar</h4>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 440px;"></div>
                            <script>
                                var map = L.map('map').setView([-3.62661997195365, 114.86067632270333], 18);

                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 50,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                                @foreach ($apars as $apar)
                                    L.marker([{{ $apar->latitude }}, {{ $apar->longitude }}])
                                        .addTo(map)
                                        .bindPopup("{{ $apar->kode_apar }} - {{ $apar->lokasi }}");
                                @endforeach
                            </script>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50"
                                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-primary">Now</div>
                                        <div class="media-title">Farhan A Mujib</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50"
                                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">12m</div>
                                        <div class="media-title">Ujang Maman</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50"
                                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">17m</div>
                                        <div class="media-title">Rizal Fakhri</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50"
                                        src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">21m</div>
                                        <div class="media-title">Alfa Zulkarnain</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="#" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    </div>
@endsection
