<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backpanel.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = Category::create($request->only('name'));

        return redirect(route('category.index'))->with('success', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backpanel.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->only('name'));
        return redirect(route('category.index'))->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('success', 'Category Deleted Successfully');
    }

    public function trashedCategory()
    {

        $categories = Category::onlyTrashed()->get();
        return view('backpanel.categories.trash', compact('categories'));
    }

    public function restoreCategory($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect(route('category.index'))->with('success', 'Category Restored Successfully');
    }

    public function forcedeleteCategory($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect(route('category.index'))->with('success', 'Category Deleted Successfully');
    }
}