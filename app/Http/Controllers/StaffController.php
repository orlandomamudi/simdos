<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index() {
        return view('staff.index');
    }

    public function list() {
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

    public function store(Request $request) {
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
}
