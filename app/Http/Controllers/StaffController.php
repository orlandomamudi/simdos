<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index() {
        $user = User::all();
        $dosen = User::whereHas(
            'role', function($q){
                $q->where('role_id', 2);
            }
        )->get();
        return view('staff.index', compact('user', 'dosen'));
    }

    public function list() {
        // $users = User::all();
        // dd($users->biodatas);
        $users = DB::table('users')->where('role_id', '=', 2)->get();
        return view('staff.list', compact('users'));
    }

    public function user() {
        $users = DB::table('users')->get();
        return view('staff.user', compact('users'));
    }

    public function create() {
        return view('staff.create');
    }

    public function store1(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'nama' => 'required',
            'role' => 'required',
            'password' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // dd($request->all());

        $photo  =   $request->file('photo');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['role_id'] = $request->role;
        $data['image'] = $filename;
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('staff.index');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'nama' => 'required',
            'role' => 'required',
            'password' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo  =   $request->file('photo');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $user = User::create([
            'progress_bar' => 0,
            'email' => $request->email,
            'name' => $request->nama,
            'role_id' => $request->role,
            'image' => $filename,
            'password' => Hash::make($request->password),
        ]);

        // $user->biodata()->create();

        $user->berkas()->create();

        return redirect(route('staff.user'))->with('message', 'User Berhasil Ditambahkan');
    }

    public function detail($id) {
        $user = User::with('biodata', 'berkas')->where('id', '=', $id)->first();
        return view('staff.detail', compact('user'));
    }

    public function cetak($id) {
        $user = User::with('biodata', 'berkas')->where('id', '=', $id)->first();

        $pdf = PDF::loadview('theme.biodata_pdf', ['user' => $user]);
        return $pdf->download($user->name . 'biodata.pdf');
    }

    public function profile() {
        return view('staff.profile');
    }

    public function updateProfile(Request $request, User $user) {
        $user->update(['name' => $request->name]);

        return redirect(route('staff.profile'))->with('message', 'Profile Berhasil Di Update');
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
