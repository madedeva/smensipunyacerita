<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
        $categoryall = Category::all();

        // return to view index dan create
        return view('admin.category.index', compact('categoryall'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category berhasil ditambahkan');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category berhasil diupdate');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category berhasil dihapus');
    }
}
