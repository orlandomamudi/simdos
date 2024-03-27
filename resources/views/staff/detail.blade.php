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
                            <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Dashboard</a></li>
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
                                        src="{{ $user->image ? asset('storage/photo-user/' . $user->image) : asset('template/assets/compiled/jpg/2.jpg') }}"
                                        alt="{{ $user->image }}">
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
                                <a href="{{ url('daftar-dosen/' . $user->id . '/detail/cetak') }}"
                                    class="btn btn-primary">cetak</a>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted mb-0"><strong>Nama Lengkap</strong></p>
                                <h3>{{ $user->name }}</h3>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Email</h6>
                                <h3>{{ $user->email }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table2">
                                <thead>
                                    <tr>
                                        <th>Gelar Akademik</th>
                                        <th>Bidang Keahlian</th>
                                        <th>Riwayat Pendidikan</th>
                                        <th>Pengalaman Mengajar</th>
                                        <th>Publikasi Ilmiah</th>
                                        <th>Aktivitas Penelitian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{dd($user)}} --}}
                                    @foreach ($user->biodata as $item)
                                        <tr>
                                            <td>{{ $item->gelar_akademik ? $item->gelar_akademik : 'Data Belum Diupload' }}
                                            </td>
                                            <td>{{ $item->bidang_keahlian ? $item->bidang_keahlian : 'Data Belum Diupload' }}
                                            </td>
                                            <td>{{ $item->riwayat_pendidikan ? $item->riwayat_pendidikan : 'Data Belum Diupload' }}
                                            </td>
                                            <td>{{ $item->pengalaman_mengajar ? $item->pengalaman_mengajar : 'Data Belum Diupload' }}
                                            </td>
                                            <td>{{ $item->publikasi_ilmiah ? $item->publikasi_ilmiah : 'Data Belum Diupload' }}
                                            </td>
                                            <td>{{ $item->aktivitas_penelitian ? $item->aktivitas_penelitian : 'Data Belum Diupload' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama Berkas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">Transkrip Pendidikan</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modaltranskrippendidikan">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Sertifikat Gelar Akademik</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modalsertifikat">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Surat Keputusan Pengangkatan</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalsuratkeputusanpengangkatan">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Publikasi Ilmiah</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modalpublikasiilmiah">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Kegiatan Pengembangan Diri</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modalkegiatanpengembangandiri">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Catatan Kinerja Mengajar</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modalcatatankinerjamengajar">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Laporan Penelitian</td>
                                            <td>
                                                <button type="button"
                                                    class="btn icon icon-left btn-warning btn-sm rounded-pill"
                                                    data-bs-toggle="modal" data-bs-target="#modallaporanpenelitian">
                                                    <i data-feather="eye"></i>
                                                    Lihat Berkas
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                </div>
            </div>
        </div>
    </div>
    {{-- endmodal --}}

    <!-- Modal transkrip pendidikan -->
    <div class="modal fade" id="modaltranskrippendidikan" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Transkrip Pendidikan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->transkrip_pendidikan) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal sertifikat --}}
    <div class="modal fade" id="modalsertifikat" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sertifikat Gelar Akademik
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->sertifikat_gelar_akademik) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal surat keputusan pengangkatan --}}
    <div class="modal fade" id="modalsuratkeputusanpengangkatan" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Surat Keputusan Pengangkatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->surat_keputusan_pengangkatan) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Publikasi Ilmiah --}}
    <div class="modal fade" id="modalpublikasiilmiah" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Publikasi Ilmiah
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->publikasi_ilmiah) }}" height="700"
                        width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Kegiatan Pengembangan Diri --}}
    <div class="modal fade" id="modalkegiatanpengembangandiri" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Kegiatan Pengembangan Diri
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->kegiatan_pengembangan_diri) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Catatan Kinerja Mengajar --}}
    <div class="modal fade" id="modalcatatankinerjamengajar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Catatan Kinerja Mengajar
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->catatan_kinerja_mengajar) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Laporan Penelitian --}}
    <div class="modal fade" id="modallaporanpenelitian" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Laporan Penelitian
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $user->berkas->laporan_penelitian) }}"
                        height="700" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

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
