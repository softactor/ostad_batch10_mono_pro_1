<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkadmin:admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'status'=> $request->status,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success_message', 'Category has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();


        return redirect()
            ->route('admin.categories.index')
            ->with('success_message', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted Successfully'
        ]);

    }
}
