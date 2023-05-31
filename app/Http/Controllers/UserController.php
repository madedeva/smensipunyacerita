<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\UserImport;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin')) return $next($request);
            return redirect()->route('welcome')->with('error', 'Anda tidak memiliki cukup hak akses');
        });
    }

    // public function user(){

    //     $user = User::all();
    //     return view('admin.users.edit', compact('siswa'));
    // }

    public function index(){
        $siswa = User::where('role', 'siswa')->paginate(10);
        return view('admin.users.index', compact('siswa'));
    }

    public function guru(){
        $guru = User::where('role', 'guru')->paginate(10);
        return view('admin.users.guru', compact('guru'));
    }

    public function admin(){
        $admin = User::where('role', 'admin')->paginate(10);
        return view('admin.users.admin', compact('admin'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $data = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email|regex:/^.+@smensi\.sch\.id$/i',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('admin.users.create')->with('success', 'User berhasil ditambahkan');
    }

    // edit
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diubah');
    }

    // delete
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_import',$nama_file);
 
		// import data
        Excel::import(new UserImport, public_path('/file_import/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data User Berhasil Diimport!');
        
		// alihkan halaman kembali
		return redirect()->route('admin.users.index')->with('success', 'User berhasil diimport');
	}
}
