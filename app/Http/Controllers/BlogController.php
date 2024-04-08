<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use File;

class BlogController extends Controller
{
    private $uploadService;

    public function __construct(){

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('is-admin') || Gate::allows('is-guru')) return $next($request);
            return redirect()->route('home')->with('error', 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index()
    {
        // $blogall = Blog::with(['user','category'])->get();
        $blogall = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogall'));
    }

    // create blog
    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create')->with('category', $category);
    }

    // store blog
    public function store(Request $request)
    {
        $data = \Validator::make($request->all(), [
            'judul' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
            'excerpt' => 'required',
            'gambar' => 'required',
            'category_id' => 'required'
        ]);

        if ($file = $request->file('gambar')) {
            $destinationPath = 'blogs/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        $blog = Blog::create([
            'user_id' => auth()->user()->id,
            'judul' => $request->input('judul'),
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->input('deskripsi'),
            'excerpt' => Str::limit(strip_tags($request->deskripsi), 100),
            'gambar' => $input['gambar'],
            'category_id' => $request->input('category_id')
        ]);

        if($blog){
            return redirect()->route('admin.blog.index')->with(
                ['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('admin.blog.index')->with(
                ['error' => 'Data Gagal Disimpan!']);
        }
        
    }

    // show blog
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstorfail();
        return view('admin.blog.show', compact('blog'));
    }

    // edit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $category = Category::all();
        return view('admin.blog.edit', compact('blog', 'category'));
    }

    // update blog
    public function update(Request $request, $id)
    {
        $data = \Validator::make($request->all(), [
            'judul' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
            'excerpt' => 'required',
            'gambar' => 'required',
            'category_id' => 'required'
        ]);

        if ($file = $request->file('gambar')) {
            $destinationPath = 'blogs/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        $blog = Blog::findOrFail($id);
        $blog->update([
            'user_id' => auth()->user()->id,
            'judul' => $request->input('judul'),
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->input('deskripsi'),
            'excerpt' => Str::limit(strip_tags($request->deskripsi), 100),
            'gambar' => $input['gambar'],
            'category_id' => $request->input('category_id')
        ]);

        if($blog){
            return redirect()->route('admin.blog.index')->with(
                ['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('admin.blog.index')->with(
                ['error' => 'Data Gagal Diupdate!']);
        }
    }

    // delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        $image_path = public_path("blogs/{$blog->gambar}");
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $blog->delete();

        if($blog){
            return redirect()->route('admin.blog.index')->with(
                ['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('admin.blog.index')->with(
                ['error' => 'Data Gagal Dihapus!']);
        }
    }
    
}
