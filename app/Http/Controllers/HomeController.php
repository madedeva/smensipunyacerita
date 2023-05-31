<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Curhat;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin') || Gate::allows('is-guru') || Gate::allows('is-siswa')) return $next($request);
            return redirect()->route('home')->with('error', 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index()
    {
        $curhats = Curhat::where('status', 'public')->latest()->paginate(5);
        return view('welcome', compact('curhats'));
    }

    public function mycurhat(){
        $curhats = Curhat::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('curhat.mycurhat', compact('curhats'));
    }

    public function show(Curhat $curhats, $slug){
        $curhats = Curhat::where('slug', $slug)->firstorfail();
        return view('curhat.show', compact('curhats'));
    }

    public function blog(){
        $bloghome = Blog::latest()->paginate(6);
        return view('blog.index', compact('bloghome'));
    }

    public function blogshow(Blog $blog){
        return view('blog.show', compact('blog'));
    }
}
