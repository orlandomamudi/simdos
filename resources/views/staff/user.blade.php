@extends('theme.default')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-light-success color-success alert-dismissible show fade">
                <i class="bi bi-check-circle"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        List User
                    </h5>
                    <div class="float-end">
                        <a href="{{ route('staff.create') }}" class="btn icon icon-left btn-primary"><i
                                class="bi bi-person-plus"></i> Tambah User</a>
                    </div>
                    <div class="card-body">
                    </div>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="avatar avatar-xl">
                                            <img src="{{ $i->image ? asset('storage/photo-user/' . $i->image) : asset('template/assets/compiled/jpg/2.jpg') }}"
                                                alt="{{ $i->image }}">
                                        </div>
                                    </td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->email }}</td>
                                    @if ($i->role_id == 1)
                                        <td>Staff</td>
                                    @elseif ($i->role_id == 2)
                                        <td>Dosen</td>
                                    @else
                                        <td>Pimpinan</td>
                                    @endif
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
