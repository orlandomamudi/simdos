@extends('theme.default')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Biodata</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Biodata</li>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end">
                                <button type="button" class="btn icon icon-left btn-success btn-sm rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i
                                        data-feather="plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted mb-0"><strong>Nama Lengkap</strong></p>
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Email</h6>
                                <h3>{{ Auth::user()->email }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <h5 class="card-title">Riwayat Pendidikan</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Pendidikan & Pengajaran</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        {{-- {{dd($detail->biodata()->whereNotNull('pendidikan_pengajaran')->first()->pendidikan_pengajaran)}} --}}
                                        @if (!empty($detail->biodata()->whereNotNull('pendidikan_pengajaran')->first()->pendidikan_pengajaran))
                                            @foreach ($pendidikan_pengajaran as $item)
                                                <p class="mb-0">{{ $item->pendidikan_pengajaran }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Pengabdian</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('pengabdian')->first()->pengabdian))
                                            @foreach ($pengabdian as $item)
                                                <p class="mb-0">{{ $item->pengabdian }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Penunjang</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('penunjang')->first()->penunjang))
                                            @foreach ($penunjang as $item)
                                                <p class="mb-0">{{ $item->penunjang }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Gelar Akademik</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('gelar_akademik')->first()->gelar_akademik))
                                            @foreach ($gelar_akademik as $item)
                                                <p class="mb-0">{{ $item->gelar_akademik }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Bidang Keahlian</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('bidang_keahlian')->first()->bidang_keahlian))
                                            @foreach ($bidang_keahlian as $item)
                                                <p class="mb-0">{{ $item->bidang_keahlian }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Pengalaman Mengajar</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('pengalaman_mengajar')->first()->pengalaman_mengajar))
                                            @foreach ($pengalaman_mengajar as $item)
                                                <p class="mb-0">{{ $item->pengalaman_mengajar }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Publikasi Ilmiah</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('publikasi_ilmiah')->first()->publikasi_ilmiah))
                                            @foreach ($publikasi_ilmiah as $item)
                                                <p class="mb-0">{{ $item->publikasi_ilmiah }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <h6>Aktivitas Penelitian</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-6">
                                        @if (!empty($detail->biodata()->whereNotNull('aktivitas_penelitian')->first()->aktivitas_penelitian))
                                            @foreach ($aktivitas_penelitian as $item)
                                                <p class="mb-0">{{ $item->aktivitas_penelitian }}</p>
                                            @endforeach
                                        @else
                                            <code>Data belum tersedia.</code>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table2">
                                <thead>
                                    <tr>
                                        <th>Gelar Akademik</th>
                                        <th>Bidang Keahlian</th>
                                        <th></th>
                                        <th>Riwayat Pendidikan</th>
                                        <th></th>
                                        <th>Pengalaman Mengajar</th>
                                        <th>Publikasi Ilmiah</th>
                                        <th>Aktivitas Penelitian</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Pendidikan & Pengajaran</th>
                                        <th>Pengabdian</th>
                                        <th>Penunjang</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail->biodata as $item)
                                        <tr>
                                            <td>{{ $item->gelar_akademik }}</td>
                                            <td>{{ $item->bidang_keahlian }}</td>
                                            <td>{{ $item->pendidikan_pengajaran }}</td>
                                            <td>{{ $item->pengabdian }}</td>
                                            <td>{{ $item->penunjang }}</td>
                                            <td>{{ $item->pengalaman_mengajar }}</td>
                                            <td>{{ $item->publikasi_ilmiah }}</td>
                                            <td>{{ $item->aktivitas_penelitian }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update/' . Auth::user()->id) }}" method="post">
                        @csrf
                        {{-- <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
                    </div> --}}
                        <input type="number" name="progress" value="50" hidden>
                        <div class="form-group">
                            <label for="phone" class="form-label">Gelar Akademik</label>
                            <input type="text" name="gelar_akademik" id="phone" class="form-control"
                                placeholder="Gelar Akademik" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Bidang Keahlian</label>
                            <textarea class="form-control" name="bidang_keahlian" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Bidang Keahlian"></textarea>
                        </div>
                        <hr>
                        <label class="">
                            <h5>Riwayat Pendidikan</h5>
                        </label>
                        {{-- <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Riwayat Pendidikan</label>
                            <textarea class="form-control" name="riwayat_pendidikan" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Riwayat Pendidikan"></textarea>
                        </div> --}}
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pendidikan & Pengajaran</label>
                            <textarea class="form-control" name="pendidikan_pengajaran" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Riwayat Pendidikan"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pengabdian</label>
                            <textarea class="form-control" name="pengabdian" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Riwayat Pendidikan"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Penunjang</label>
                            <textarea class="form-control" name="penunjang" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Riwayat Pendidikan"></textarea>
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pengalaman Mengajar</label>
                            <textarea class="form-control" name="pengalaman_mengajar" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Pengalaman Mengajar"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Publikasi Ilmiah</label>
                            <textarea class="form-control" name="publikasi_ilmiah" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Publikasi Ilmiah"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Aktivitas Penelitian</label>
                            <textarea class="form-control" name="aktivitas_penelitian" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Aktivitas Penelitian"></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Biodata</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- endmodal --}}
    {{-- <div class="card-body">
        <form action="{{ url('update/' . Auth::user()->id) }}" method="post">
            @csrf
            <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
        </div>
            <input type="number" name="progress" value="50" hidden>
            <div class="form-group">
                <label for="phone" class="form-label">Gelar Akademik</label>
                <input type="text" name="gelar_akademik" id="phone" class="form-control"
                    placeholder="Gelar Akademik" value="">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Bidang Keahlian</label>
                <textarea class="form-control" name="bidang_keahlian" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Bidang Keahlian"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Riwayat Pendidikan</label>
                <textarea class="form-control" name="riwayat_pendidikan" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Riwayat Pendidikan"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pengalaman Mengajar</label>
                <textarea class="form-control" name="pengalaman_mengajar" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Pengalaman Mengajar"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Publikasi Ilmiah</label>
                <textarea class="form-control" name="publikasi_ilmiah" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Publikasi Ilmiah"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Aktivitas Penelitian</label>
                <textarea class="form-control" name="aktivitas_penelitian" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Aktivitas Penelitian"></textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Biodata</button>
            </div>
        </form>
    </div> --}}
@endsection
