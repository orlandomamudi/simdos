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
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berkas</li>
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
                                                <th>Berkas</th>
                                                <th>Nama File</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Transkrip Pendidikan</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('transkrip_pendidikan')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('transkrip_pendidikan')->get() as $item)
                                                            <p>{{ $item->transkrip_pendidikan }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->transkrip_pendidikan) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahtp">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat Gelar Akademik</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('sertifikat_gelar_akademik')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('sertifikat_gelar_akademik')->get() as $item)
                                                            <p>{{ $item->sertifikat_gelar_akademik }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->sertifikat_gelar_akademik) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahsga">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Surat Keputusan Pengangkatan</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('surat_keputusan_pengangkatan')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('surat_keputusan_pengangkatan')->get() as $item)
                                                            <p>{{ $item->surat_keputusan_pengangkatan }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->surat_keputusan_pengangkatan) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahskp">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Publikasi Ilmiah</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('publikasi_ilmiah')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('publikasi_ilmiah')->get() as $item)
                                                            <p>{{ $item->publikasi_ilmiah }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->publikasi_ilmiah) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahpi">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kegiatan Pengembangan Diri</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('kegiatan_pengembangan_diri')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('kegiatan_pengembangan_diri')->get() as $item)
                                                            <p>{{ $item->kegiatan_pengembangan_diri }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->kegiatan_pengembangan_diri) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahkpd">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Catatan Kinerja Mengajar</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('catatan_kinerja_mengajar')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('catatan_kinerja_mengajar')->get() as $item)
                                                            <p>{{ $item->catatan_kinerja_mengajar }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->catatan_kinerja_mengajar) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahckm">
                                                        <i data-feather="plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Laporan Penelitian</strong></td>
                                                <td>
                                                    @if (count(Auth::user()->berkas()->whereNotNull('laporan_penelitian')->get()) > 0)
                                                        @foreach (Auth::user()->berkas()->whereNotNull('laporan_penelitian')->get() as $item)
                                                            <p>{{ $item->laporan_penelitian }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->laporan_penelitian) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm icon btn-success btn-sm rounded-circle {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#modaltambahlp">
                                                        <i data-feather="plus"></i>
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
                {{-- Modal tambah tp --}}
                <div class="modal fade text-left" id="modaltambahtp" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Transkrip Pendidikan</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-tp/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Transkrip Pendidikan</label>
                                        <input class="form-control" name="transkrip_pendidikan" accept="application/pdf"
                                            type="file" {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah sga --}}
                <div class="modal fade text-left" id="modaltambahsga" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Sertifikat Gelar Akademik</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-sga/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Sertifikat Gelar Akademik</label>
                                        <input class="form-control" name="sertifikat_gelar_akademik"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah skp --}}
                <div class="modal fade text-left" id="modaltambahskp" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Surat Keputusan Pengangkatan
                                </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-skp/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Surat Keputusan Pengangkatan</label>
                                        <input class="form-control" name="surat_keputusan_pengangkatan"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah pi --}}
                <div class="modal fade text-left" id="modaltambahpi" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Publikasi Ilmiah
                                </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-pi/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Publikasi Ilmiah</label>
                                        <input class="form-control" name="publikasi_ilmiah"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah kpd --}}
                <div class="modal fade text-left" id="modaltambahkpd" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Kegiatan Pengembangan Diri
                                </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-kpd/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Kegiatan Pengembangan Diri</label>
                                        <input class="form-control" name="kegiatan_pengembangan_diri"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah ckm --}}
                <div class="modal fade text-left" id="modaltambahckm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Catatan Kinerja Mengajar
                                </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-ckm/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Catatan Kinerja Mengajar</label>
                                        <input class="form-control" name="catatan_kinerja_mengajar"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal tambah lp --}}
                <div class="modal fade text-left" id="modaltambahlp" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Berkas Laporan Penelitian
                                </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ url('berkas/tambah-lp/' . Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="number" name="progress" value="100" hidden>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label">Catatan Kinerja Mengajar</label>
                                        <input class="form-control" name="laporan_penelitian"
                                            accept="application/pdf" type="file"
                                            {{ Auth::user()->progress_bar == 0 ? 'disabled' : '' }}>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
