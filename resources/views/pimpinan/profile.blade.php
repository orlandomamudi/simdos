@extends('theme.default')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pimpinan.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
        @if ($errors->any())
            {!! implode(
                '',
                $errors->all('<div class="alert alert-light-danger color-danger alert-dismissible show fade">
                        <i class="bi bi-exclamation-circle"></i>
                        :message
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'),
            ) !!}
        @endif
        @if (Session::get('error') && Session::get('error') != null)
            <div class="alert alert-light-danger color-danger alert-dismissible show fade">
                <i class="bi bi-exclamation-circle"></i>
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php
                Session::put('error', null);
            @endphp
        @endif
        @if (Session::get('success') && Session::get('success') != null)
            <div class="alert alert-light-success color-success alert-dismissible show fade">
                <i class="bi bi-check-circle"></i>
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php
                Session::put('success', null);
            @endphp
        @endif
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div>
                                    <img style="width: 200px" class="rounded-circle"
                                        src="{{ Auth::user()->image ? asset('storage/photo-user/' . Auth::user()->image) : asset('template/assets/compiled/jpg/2.jpg') }}"
                                        alt="{{ Auth::user()->image }}">
                                </div>
                                {{-- {{ dd(Auth::user()->load('biodata')) }} --}}
                                <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                                <p class="text-small">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('pimpinan/profile/update/' . Auth::user()->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update Biodata</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('pimpinan/profile/change-password') }}" method="POST">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control" placeholder="Enter your current password"
                                        value="">
                                </div>
                                <div class="form-group my-2">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control"
                                        placeholder="Enter new password" value="">
                                </div>
                                <div class="form-group my-2">
                                    <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                        class="form-control" placeholder="Enter confirm password" value="">
                                </div>

                                <div class="form-group my-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
