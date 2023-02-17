<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index_blog()
    {
        $blogs = Blog::latest()->paginate(1);
        $blogss = Blog::inRandomOrder()->paginate(2);
        
        return view('index_blog', compact('blogs', 'blogss'));
    }

    public function create_blog()
    {
        $categories = Category::all();
        return view('create_blog', compact('categories'));
    }

    public function store_blog(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:4',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, \file_get_contents($file));

        Blog::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $path
        ]);

        $request->session()->flash('message', 'Add blog, Success !');
        return Redirect::route('index_blog');
    }

    public function show_blog(Blog $blog)
    {
        $blogss = Blog::inRandomOrder()->paginate(3);
        return view('show_blog', compact('blog', 'blogss'));
    }
}
