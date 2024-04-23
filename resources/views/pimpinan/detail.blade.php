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
                                        src="{{ $detail->image ? asset('storage/photo-user/' . $detail->image) : asset('template/assets/compiled/jpg/2.jpg') }}"
                                        alt="{{ $detail->image }}">
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
                                <a href="{{ url('pimpinan/daftar-dosen/' . $detail->id . '/detail/cetak') }}"
                                    class="btn btn-primary">cetak</a>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted mb-0"><strong>Nama Lengkap</strong></p>
                                <h3>{{ $detail->name }}</h3>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Email</h6>
                                <h3>{{ $detail->email }}</h3>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Berkas</th>
                                                <th>Nama File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Transkrip Pendidikan</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('transkrip_pendidikan')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('transkrip_pendidikan')->get() as $item)
                                                            <p>{{ $item->transkrip_pendidikan }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->transkrip_pendidikan) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat Gelar Akademik</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('sertifikat_gelar_akademik')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('sertifikat_gelar_akademik')->get() as $item)
                                                            <p>{{ $item->sertifikat_gelar_akademik }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->sertifikat_gelar_akademik) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Surat Keputusan Pengangkatan</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('surat_keputusan_pengangkatan')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('surat_keputusan_pengangkatan')->get() as $item)
                                                            <p>{{ $item->surat_keputusan_pengangkatan }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->surat_keputusan_pengangkatan) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Publikasi Ilmiah</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('publikasi_ilmiah')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('publikasi_ilmiah')->get() as $item)
                                                            <p>{{ $item->publikasi_ilmiah }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->publikasi_ilmiah) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kegiatan Pengembangan Diri</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('kegiatan_pengembangan_diri')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('kegiatan_pengembangan_diri')->get() as $item)
                                                            <p>{{ $item->kegiatan_pengembangan_diri }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->kegiatan_pengembangan_diri) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Catatan Kinerja Mengajar</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('catatan_kinerja_mengajar')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('catatan_kinerja_mengajar')->get() as $item)
                                                            <p>{{ $item->catatan_kinerja_mengajar }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->catatan_kinerja_mengajar) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Laporan Penelitian</strong></td>
                                                <td>
                                                    @if (count($detail->berkas()->whereNotNull('laporan_penelitian')->get()) > 0)
                                                        @foreach ($detail->berkas()->whereNotNull('laporan_penelitian')->get() as $item)
                                                            <p>{{ $item->laporan_penelitian }} <a
                                                                    href="{{ asset('storage/file-berkas/' . $item->laporan_penelitian) }}"
                                                                    target="_blank"><u>lihat</u></a></p>
                                                        @endforeach
                                                    @else
                                                        <code>Data belum tersedia.</code>
                                                    @endif
                                                </td>
                                            </tr>
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
@endsection
