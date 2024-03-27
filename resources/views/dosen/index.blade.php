@extends('theme.default')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kelengkapan Data</h4>
                                <p>Harap Memperhatikan Kelengkapan Data Anda.</p>
                                <p>Kunjungi Biodata dan Berkas Untuk Melihat Kelengkapan Data Anda.</p>
                            </div>
                            <div class="card-body">
                                <div class="progress progress-success mt-2">
                                    <div class="progress-bar progress-label" role="progressbar"
                                        style="width: {{ Auth::user()->progress_bar }}%"
                                        aria-valuenow="{{ Auth::user()->progress_bar }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ Auth::user()->image ? asset('storage/photo-user/' . Auth::user()->image) : asset('template/assets/compiled/jpg/2.jpg') }}"
                                    alt="{{ Auth::user()->image }}">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
