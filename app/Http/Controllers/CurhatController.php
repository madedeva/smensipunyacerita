<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curhat;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CurhatController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin') || Gate::allows('is-guru') || Gate::allows('is-siswa')) return $next($request);
            return redirect()->route('home')->with('error', 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index(){
        $curhats = Curhat::latest()->paginate(5);
        return view('curhat.create', compact('curhats'));
    }

    public function create(){
        return view('curhat.create');
    }

    public function store(Request $request){
        $data = \Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'cerita' => 'required',
            'status' => 'required',
            'feedback' => 'required'
        ]);

        $curhat = Curhat::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'slug' => Str::slug($request->title),
            'cerita' => $request->input('cerita'),
            'status' => $request->input('status'),
            'feedback' => $request->input('feedback')
        ]);

        return redirect()->route('curhat.mycurhat')->with('success', 'Curhat berhasil ditambahkan');
    }

    public function show($slug){
        $curhat = Curhat::where('slug', $slug)->firstorfail();
        return view('curhat.show', compact('curhat'));
    }

    public function destroy(Curhat $curhat){
        $curhat->delete();
        return redirect()->route('curhat.mycurhat')->with('success', 'Curhat berhasil dihapus');
    }

    // show curhat showDetail
    public function showDetail($slug){
        $curhatdetail = Curhat::where('slug', $slug)->firstorfail();
        return view('curhat.detail', compact('curhatdetail'));
    }
}
