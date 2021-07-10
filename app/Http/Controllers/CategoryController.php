<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = Category::latest()->paginate(5);
        return view('pages.admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.categories-create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.categories');
    }

    public function edit($id) 
    {
        $category = Category::findOrFail($id);

        return view('pages.admin.categories-edit', compact('category'));
    }

    public function update($id, CategoryUpdateRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        Category::findOrFail($id)->update($data);

        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.categories');
    }
}
