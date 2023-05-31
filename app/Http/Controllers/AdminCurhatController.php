<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Curhat;
use Illuminate\Support\Facades\Auth;

class AdminCurhatController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin') || Gate::allows('is-guru')) return $next($request);
            return redirect()->route('home')->with('error', 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index()
    {
        $curhatall = Curhat::latest()->paginate(10);
        return view('admin.curhat.index', compact('curhatall'));
    }

    public function edit(Curhat $curhat){
        return view('admin.curhat.edit', compact('curhat'));
    }

    public function update(Request $request, Curhat $curhat){
        $request->validate([
            'feedback' => 'required|string'
        ]);

        $curhat->update([
            'feedback' => $request->feedback
        ]);

        return redirect()->route('admin.curhat.index')->with('success', 'Curhat berhasil diupdate');
    }

    public function destroy(Curhat $curhat){
        $curhat->delete();
        return redirect()->route('admin.curhat.index')->with('success', 'Curhat berhasil dihapus');
    }
}
