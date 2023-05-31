<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin') || Gate::allows('is-guru')) return $next($request);
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index()
    {
        $siswa = User::where('role', 'siswa')->count();
        $guru = User::where('role', 'guru')->count();
        $admin = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('siswa', 'guru', 'admin'));
    }

    // about
    public function about()
    {
        return view('admin.about');
    }
}
