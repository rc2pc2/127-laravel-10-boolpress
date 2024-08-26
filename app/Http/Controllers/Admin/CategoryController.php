<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|min:2|max:50|unique:categories",
            "color" => "required|hex_color",
        ]);

        $category = Category::create($data);

        return redirect()->route("admin.categories.show", $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            "name" => ["required", "string", "min:2", "max:50", Rule::unique("categories")->ignore($category->id)],
            "color" => "required|hex_color",
        ]);

        $category->update($data);

        return redirect()->route("admin.categories.show", $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("admin.categories.index");
    }
}
