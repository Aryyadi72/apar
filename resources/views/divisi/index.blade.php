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
                                <button class="btn btn-icon btn-primary" id="modal-1" data-toggle="modal"
                                    data-target="#createModal"> Tambah Data</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Divisi</th>
                                                {{-- <th>Petugas</th> --}}
                                                {{-- <th>Asst. Sub Div</th> --}}
                                                <th class="text-center">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($divisis as $index => $divisi)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td>{{ $divisi->divisi }}</td>

                                                    {{-- @if ($divisi->level == 'Petugas' && $divisi->name == null)
                                                        <td>-</td>
                                                    @else
                                                        <td>{{ $divisi->name }}</td>
                                                    @endif

                                                    @if ($divisi->level == 'Asst. Sub Div' && $divisi->name == null)
                                                        <td>-</td>
                                                    @else
                                                        <td>{{ $divisi->name }}</td>
                                                    @endif --}}

                                                    <td class="text-center">
                                                        <button class="btn btn-icon btn-primary" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#editModal-{{ $divisi->id }}"><i
                                                                class="far fa-edit"></i></button>
                                                        <button class="btn btn-icon btn-danger" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal-{{ $divisi->id }}"><i
                                                                class="fas fa-times"></i></button>
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

    {{-- Modal Create --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('divisi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Masukkan nama divisi" name="divisi">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($divisis as $divisi)
        {{-- Modal Update --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="editModal-{{ $divisi->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Masukkan nama divisi" name="divisi"
                                    value="{{ $divisi->divisi }}">
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Delete --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal-{{ $divisi->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('divisi.delete', $divisi->id) }}" method="POST">
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
