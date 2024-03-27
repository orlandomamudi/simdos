<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index');
    }

    public function biodata($id)
    {
        // $detail = User::with('biodata')->findOrFail($id);
        // return view('dosen.detail', compact('detail'));

        $detail = User::with('biodata')->where('id', '=', $id)->first();
        return view('dosen.detail', compact('detail'));
    }

    public function update(User $user, Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'gelar_akademik' => 'required',
        //     'bidang_keahlian' => 'required',
        //     'riwayat_pendidikan' => 'required',
        //     'pengalaman_mengajar' => 'required',
        //     'publikasi_ilmiah' => 'required',
        //     'aktivitas_penelitian' => 'required',
        // ]);

        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $users = User::findOrFail($user->id);

        $users->biodata()->create([
            'gelar_akademik' => $request->gelar_akademik,
            'bidang_keahlian' => $request->bidang_keahlian,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
            'pengalaman_mengajar' => $request->pengalaman_mengajar,
            'publikasi_ilmiah' => $request->publikasi_ilmiah,
            'aktivitas_penelitian' => $request->aktivitas_penelitian,

        ]);

        $user->update(['progress_bar' => $request->progress]);

        return redirect(url('biodata/'. $user->id))->with('message', 'Data Berhasil Di Update');
    }

    public function berkas()
    {
        return view('dosen.berkas');
    }

    public function updateBerkas(User $user, Request $request){
        $validator = Validator::make($request->all(),[
            'transkrip_pendidikan' => 'required|mimes:pdf|max:2048',
            'sertifikat_gelar_akademik' => 'required|mimes:pdf|max:2048',
            'surat_keputusan_pengangkatan' => 'required|mimes:pdf|max:2048',
            'publikasi_ilmiah' => 'required|mimes:pdf|max:2048',
            'kegiatan_pengembangan_diri' => 'required|mimes:pdf|max:2048',
            'catatan_kinerja_mengajar' => 'required|mimes:pdf|max:2048',
            'laporan_penelitian' => 'required|mimes:pdf|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // dd($request->all());

        // transkrip pendidikan
        $file1  =   $request->file('transkrip_pendidikan');
        $filename1 = date('Y-m-d').'-'. $user->name . '-' . 'transkrip_pendidikan' . '.' . $file1->getClientOriginalExtension();
        $path1 = 'berkas/'.$filename1;
        // dd($path1);

        Storage::disk('public')->put($path1, file_get_contents($file1));

        // sertifikat gelar akademik
        $file2  =   $request->file('sertifikat_gelar_akademik');
        $filename2 = date('Y-m-d').'-'. $user->name . '-' . 'sertifikat_gelar_akademik' . '.' . $file2->getClientOriginalExtension();
        $path2 = 'berkas/'.$filename2;

        Storage::disk('public')->put($path2,file_get_contents($file2));

        // surat keputusan pengangkatan
        $file3  =   $request->file('surat_keputusan_pengangkatan');
        $filename3 = date('Y-m-d').'-'. $user->name . '-' . 'surat_keputusan_pengangkatan' . '.' . $file3->getClientOriginalExtension();
        $path3 = 'berkas/'.$filename3;

        Storage::disk('public')->put($path3,file_get_contents($file3));

        // publikasi ilmiah
        $file4  =   $request->file('publikasi_ilmiah');
        $filename4 = date('Y-m-d').'-'. $user->name . '-' . 'publikasi_ilmiah' . '.' . $file4->getClientOriginalExtension();
        $path4 = 'berkas/'.$filename4;

        Storage::disk('public')->put($path4,file_get_contents($file4));

        // kegiatan pengembangan diri
        $file5  =   $request->file('kegiatan_pengembangan_diri');
        $filename5 = date('Y-m-d').'-'. $user->name . '-' . 'kegiatan_pengembangan_diri' . '.' . $file5->getClientOriginalExtension();
        $path5 = 'berkas/'.$filename5;

        Storage::disk('public')->put($path5,file_get_contents($file5));

        // catatan kinerja mengajar
        $file6  =   $request->file('catatan_kinerja_mengajar');
        $filename6 = date('Y-m-d').'-'. $user->name . '-' . 'catatan_kinerja_mengajar' . '.' . $file6->getClientOriginalExtension();
        $path6 = 'berkas/'.$filename6;

        Storage::disk('public')->put($path6,file_get_contents($file6));

        // laporan penelitian
        $file7  =   $request->file('laporan_penelitian');
        $filename7 = date('Y-m-d').'-'. $user->name . '-' . 'laporan_penelitian' . '.' . $file7->getClientOriginalExtension();
        $path7 = 'berkas/'.$filename7;

        Storage::disk('public')->put($path7,file_get_contents($file7));

        $user->update(['progress_bar' => $request->progress]);

        $user->berkas()->update([
            'transkrip_pendidikan' => $filename1,
            'sertifikat_gelar_akademik' => $filename2,
            'surat_keputusan_pengangkatan' => $filename3,
            'publikasi_ilmiah' => $filename4,
            'kegiatan_pengembangan_diri' => $filename5,
            'catatan_kinerja_mengajar' => $filename6,
            'laporan_penelitian' => $filename7,
        ]);


        return redirect(route('dosen.berkas'))->with('message', 'Berkas Berhasil Di Update');
    }

    public function profile() {
        return view('dosen.profile');
    }

    public function updateProfile(Request $request, User $user) {
        $user->update(['name' => $request->name]);

        return redirect(route('dosen.profile'))->with('message', 'Profile Berhasil Di Update');
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

 // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }

}
