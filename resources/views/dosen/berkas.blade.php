@extends('theme.default')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Berkas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                Daftar Berkas
                            </h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if (Auth::user()->progress_bar == 0)
                                    <div class="alert alert-light-danger color-danger"><i
                                            class="bi bi-exclamation-circle"></i> Harap Melengkapi Data Biodata Terlebih
                                        Dahulu.</div>
                                @endif
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
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
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
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
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
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
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
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalpublikasiilmiah">
                                                        <i data-feather="eye"></i>
                                                        Lihat Berkas
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Kegiatan Pengembangan Diri</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalkegiatanpengembangandiri">
                                                        <i data-feather="eye"></i>
                                                        Lihat Berkas
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Catatan Kinerja Mengajar</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalcatatankinerjamengajar">
                                                        <i data-feather="eye"></i>
                                                        Lihat Berkas
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Laporan Penelitian</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn icon icon-left btn-warning btn-sm rounded-pill
                                                        {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modallaporanpenelitian">
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
                <!-- Modal transkrip pendidikan -->
                <div class="modal fade" id="modaltranskrippendidikan" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Transkrip Pendidikan
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="{{ asset('storage/berkas/' . Auth::user()->berkas->transkrip_pendidikan) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Sertifikat Gelar Akademik
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->sertifikat_gelar_akademik) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Surat Keputusan Pengangkatan
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->surat_keputusan_pengangkatan) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Publikasi Ilmiah
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->publikasi_ilmiah) }}"
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

                {{-- Modal Kegiatan Pengembangan Diri --}}
                <div class="modal fade" id="modalkegiatanpengembangandiri" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Kegiatan Pengembangan Diri
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->kegiatan_pengembangan_diri) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Catatan Kinerja Mengajar
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->catatan_kinerja_mengajar) }}"
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Laporan Penelitian
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe
                                    src="{{ asset('storage/berkas/' . Auth::user()->berkas->laporan_penelitian) }}"
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
                {{-- <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ url('berkas/update/' . Auth::user()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="progress" value="50" hidden>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload Transkrip Pendidikan</label>
                                            <input class="form-control" name="transkrip_pendidikan" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload Sertifikat</label>
                                            <input class="form-control" name="sertifikat_gelar_akademik" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload SKP</label>
                                            <input class="form-control" name="surat_keputusan_pengangkatan"
                                                type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload Publikasi Ilmiah</label>
                                            <input class="form-control" name="publikasi_ilmiah" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload KPD</label>
                                            <input class="form-control" name="kegiatan_pengembangan_diri" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload Catatan Kinerja Mengajar</label>
                                            <input class="form-control" name="catatan_kinerja_mengajar" type="file">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Upload Laporan Penelitian</label>
                                            <input class="form-control" name="laporan_penelitian" type="file">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ url('berkas/update/' . Auth::user()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="progress" value="100" hidden>
                                    <div class="card-header">
                                        <h4 class="card-title">Upload Berkas</h4>
                                        <code>*Harap Diperhatikan. Format File Yang Diterima Hanya .pdf Dengan Ukuran
                                            Maksimal 2MB</code>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Transkrip Pendidikan</label>
                                                            <input class="form-control" name="transkrip_pendidikan"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Sertifikat Gelar Akademik</label>
                                                            <input class="form-control" name="sertifikat_gelar_akademik"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Surat Keputusan Pengangkatan</label>
                                                            <input class="form-control"
                                                                name="surat_keputusan_pengangkatan" type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Publikasi Ilmiah</label>
                                                            <input class="form-control" name="publikasi_ilmiah"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Kegiatan Pengembangan Diri</label>
                                                            <input class="form-control" name="kegiatan_pengembangan_diri"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Catatan Kinerja Mengajar</label>
                                                            <input class="form-control" name="catatan_kinerja_mengajar"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Laporan Penelitian</label>
                                                            <input class="form-control" name="laporan_penelitian"
                                                                type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1 {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}">Upload
                                                            Berkas</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
