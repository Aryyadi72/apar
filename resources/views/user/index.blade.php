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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th class="text-center">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->level }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-icon btn-primary" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#editModal-{{ $user->id_user }}"><i
                                                                class="far fa-edit"></i></button>
                                                        <button class="btn btn-icon btn-danger" id="modal-1"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal-{{ $user->id_user }}"><i
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
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Masukkan nama" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Masukkan email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Masukkan password" name="password">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="level">
                                <option value="" selected disabled>Pilih Level</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Asst. Sub Div">Asst. Sub Div</option>
                                <option value="Asst. DP">Asst. DP</option>
                                <option value="Mng. HRD & GA">Mng. HRD & GA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_divisi">
                                <option value="" selected disabled>Pilih Divisi</option>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->divisi_id }}">{{ $divisi->divisi }}</option>
                                @endforeach
                            </select>
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

    @foreach ($users as $user)
        {{-- Modal Update --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="editModal-{{ $user->id_user }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.update', $user->id_user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Masukkan nama" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Masukkan email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Masukkan password"
                                    name="password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="level">
                                    <option value="" selected disabled>Pilih Level</option>
                                    <option value="Petugas" {{ $user->level == 'Petugas' ? 'selected' : '' }}>Petugas
                                    </option>
                                    <option value="Asst. Sub Div" {{ $user->level == 'Asst. Sub Div' ? 'selected' : '' }}>
                                        Asst. Sub Div</option>
                                    <option value="Asst. DP" {{ $user->level == 'Asst. DP' ? 'selected' : '' }}>Asst. DP
                                    </option>
                                    <option value="Mng. HRD & GA" {{ $user->level == 'Mng. HRD & GA' ? 'selected' : '' }}>
                                        Mng. HRD & GA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="id_divisi">
                                    @foreach ($divisis as $divisi)
                                        <option value="" {{ $divisi->divisi_id == null ? 'selected' : '' }}>Pilih
                                            Divisi</option>
                                        <option value="{{ $divisi->id }}"
                                            {{ $divisi->id == $user->id_divisi ? 'selected' : '' }}>
                                            {{ $divisi->divisi }}</option>
                                    @endforeach
                                </select>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal-{{ $user->id_user }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.delete', $user->id_user) }}" method="POST">
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
