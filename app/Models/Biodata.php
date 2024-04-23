<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas';

    protected $fillable = [
        'user_id',
        'gelar_akademik',
        'bidang_keahlian',
        'riwayat_pendidikan',
        'pendidikan_pengajaran',
        'pengabdian',
        'penunjang',
        'pengalaman_mengajar',
        'publikasi_ilmiah',
        'aktivitas_penelitian',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
