<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(40);

        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();
        $category = Category::create($data);

        return response()->json([
            'success' => true,
            'results' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'results' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $data = $request->all();
        $category->update($data);

        return response()->json([
            'success' => true,
            'results' => $category
        ]);
    }

    /**
     * Soft removes the specified resource.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => $category->name . " category has been (soft) deleted successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function permanentDestroy(string $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return response()->json([
            'success' => true,
            'message' => $category->name . " category has been permanently deleted"
        ]);
    }

    /**
     * Restores the specified resource from soft removal.
     */
    public function restore(string $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return response()->json([
            'success' => true,
            'message' => $category
        ]);
    }
}
