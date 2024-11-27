<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Additional;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sortOrder = $request->input('sort', 'asc'); // Default to ascending if no sort parameter is provided

        // Validate sort order
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Get menus with sorting
        $menus = Menu::orderBy('product_name', $sortOrder)->latest()->paginate(10);

        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all(); // Fetch all categories
        $additionals = Additional::all(); // Fetch all additionals
        return view('menus.create', compact('categories', 'additionals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_name'          => 'required|string|max:100',
            'product_description'   => 'nullable|string',
            'product_cost'          => 'required|integer',
            'product_price'         => 'required|numeric',
            'product_quantity'      => 'nullable|integer|min:0',
            'product_image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'product_status'        => 'required|in:Ready,Not Ready',
            'category_id.*'         => 'nullable|integer|exists:category,id',
            'additional_id.*'       => 'nullable|integer|exists:additional,id',
        ]);

        // Buat menu
        $menu = Menu::create($validated);

        // Kaitkan kategori yang dipilih dengan menu
        if ($request->has('category_id')) {
            // dd($request->all());
            $menu->categories()->attach($request->input('category_id'));
        }

        // Kaitkan additional yang dipilih dengan menu
        if ($request->has('additional_id')) {
            $menu->additionals()->attach($request->input('additional_id'));
        }

        return redirect()->route('menus.index')->with('success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu): View
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu): View
    {
        $categories = Category::all(); // Fetch all categories
        $additionals = Additional::all(); // Fetch all additionals
        $selectedCategories = $menu->categories->pluck('id')->toArray();
        $selectedAdditionals = $menu->additionals->pluck('id')->toArray();
        return view('menus.edit', compact('menu', 'categories', 'additionals', 'selectedCategories', 'selectedAdditionals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu): RedirectResponse
{
    $validated = $request->validate([
        'product_name'          => 'required|string|max:100',
        'product_description'   => 'nullable|string',
        'product_cost'          => 'required|integer',
        'product_price'         => 'required|numeric',
        'product_quantity'      => 'nullable|integer|min:0',
        'product_image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'product_status'        => 'required|in:Ready,Not Ready',
        'category_id.*'         => 'nullable|integer|exists:category,id',
        'additional_id.*'       => 'nullable|integer|exists:additional,id',
    ]);

    // Perbarui menu
    $menu->update($validated);

    // Kaitkan kategori yang dipilih dengan menu
    $categories = $request->input('category_id', []);
    if (!empty($categories)) {
        $menu->categories()->sync($categories);
    } else {
        $menu->categories()->detach(); // Hapus pengaitan jika tidak ada kategori yang dipilih
    }

    // Kaitkan additional yang dipilih dengan menu
    $additionals = $request->input('additional_id', []);
    if (!empty($additionals)) {
        $menu->additionals()->sync($additionals);
    } else {
        $menu->additionals()->detach(); // Hapus pengaitan jika tidak ada additional yang dipilih
    }

    return redirect()->route('menus.index')->with('success', 'Data berhasil Diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        // Hapus kaitan dengan kategori di tabel pivot
        $menu->categories()->detach();

        // Hapus kaitan dengan additional di tabel pivot
        $menu->additionals()->detach();
        
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Data berhasil Dihapus!');
    }
}
