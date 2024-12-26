<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(9);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_name'             => 'required|string|max:100',
            'category_description'      => 'required|string',
            'category_status'           => 'required|in:Active,Inactive',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'category_name'             => 'required|string|max:100',
            'category_description'      => 'required|string',
            'category_status'           => 'required|in:Active,Inactive',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Data berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->menus()->detach();
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Data berhasil Dihapus!');
    }
}
