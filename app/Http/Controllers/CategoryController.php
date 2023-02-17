<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index_category()
    {
        $categorys = Category::orderBY('created_at', 'desc')->paginate(8);

        return view('index_category', compact('categorys'));
    }

    public function create_category()
    {
        return view('create_category');
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        $request->session()->flash('message', 'Add Category, Success !');
        return Redirect::route('index_category');
    }

    public function edit_category(Category $category)
    {
        return view('edit_category', compact('category'));
    }

    public function update_category(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        $request->session()->flash('message', 'Edit Category, Success !');
        return Redirect::route('index_category', $category);

    }

    public function delete_category(Request $request, Category $category)
    {
        $category->delete();

        $request->session()->flash('message', 'Delete category, Success !');
        return Redirect::route('index_category');
    }
}
