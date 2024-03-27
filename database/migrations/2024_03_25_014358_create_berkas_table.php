<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('transkrip_pendidikan');
            $table->string('sertifikat_gelar_akademik');
            $table->string('surat_keputusan_pengangkatan');
            $table->string('publikasi_ilmiah');
            $table->string('kegiatan_pengembangan_diri');
            $table->string('catatan_kinerja_mengajar');
            $table->string('laporan_penelitian');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
