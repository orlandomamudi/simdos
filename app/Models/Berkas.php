<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';

    protected $fillable = [
        'user_id',
        'transkrip_pendidikan',
        'sertifikat_gelar_akademik',
        'surat_keputusan_pengangkatan',
        'publikasi_ilmiah',
        'kegiatan_pengembangan_diri',
        'catatan_kinerja_mengajar',
        'laporan_penelitian',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
