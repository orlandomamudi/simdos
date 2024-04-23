<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PimpinanController extends Controller
{
    public function index() {
        $user = User::all();
        $dosen = User::whereHas(
            'role', function($q){
                $q->where('role_id', 2);
            }
        )->get();
        return view('pimpinan.index', compact('user', 'dosen'));
    }

    public function list() {
        $users = DB::table('users')->where('role_id', '=', 2)->get();
        return view('pimpinan.list', compact('users'));
    }

    public function detail($id) {
        $detail = User::with('biodata')->where('id', '=', $id)->first();
        $pendidikan_pengajaran = $detail->biodata()->whereNotNull('pendidikan_pengajaran')->get();
        $pengabdian = $detail->biodata()->whereNotNull('pengabdian')->get();
        $penunjang = $detail->biodata()->whereNotNull('penunjang')->get();
        $gelar_akademik = $detail->biodata()->whereNotNull('gelar_akademik')->get();
        $bidang_keahlian = $detail->biodata()->whereNotNull('bidang_keahlian')->get();
        $riwayat_pendidikan = $detail->biodata()->whereNotNull('riwayat_pendidikan')->get();
        $pengalaman_mengajar = $detail->biodata()->whereNotNull('pengalaman_mengajar')->get();
        $publikasi_ilmiah = $detail->biodata()->whereNotNull('publikasi_ilmiah')->get();
        $aktivitas_penelitian = $detail->biodata()->whereNotNull('aktivitas_penelitian')->get();
        return view('pimpinan.detail', compact('detail', 'pendidikan_pengajaran', 'pengabdian', 'penunjang', 'gelar_akademik', 'bidang_keahlian', 'riwayat_pendidikan', 'pengalaman_mengajar', 'publikasi_ilmiah', 'aktivitas_penelitian'));
    }

    public function cetak($id) {
        $user = User::with('biodata', 'berkas')->where('id', '=', $id)->first();

        $pdf = PDF::loadview('theme.biodata_pdf', ['user' => $user]);
        return $pdf->download($user->name . 'biodata.pdf');
    }

    public function profile() {
        return view('pimpinan.profile');
    }

    public function updateProfile(Request $request, User $user) {
        $user->update(['name' => $request->name]);

        return redirect(route('pimpinan.profile'))->with('message', 'Profile Berhasil Di Update');
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
