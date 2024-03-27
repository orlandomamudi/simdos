<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::with('biodata', 'berkas')->where('id', '=', $id)->first();
        return view('pimpinan.detail', compact('user'));
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
