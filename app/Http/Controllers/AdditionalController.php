<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Models\Menu;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdditionalController extends Controller
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

        // Get Additionals with sorting
        $additionals = Additional::orderBy('additional_name', $sortOrder)->latest()->paginate(10);
        return view('additionals.index', compact('additionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $menus = Menu::all(); // Fetch all menu
        $variants = Variant::all(); // Fetch all variants
        return view('additionals.create', compact('menus', 'variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'additional_name'             => 'required|string|max:100',
            'additional_description'      => 'required|string',
            'additional_status'           => 'required|in:Active,Inactive',
            'product_id.*'                => 'nullable|integer',
            'variant_id.*'                => 'nullable|integer',
        ]);

        $additional= Additional::create($validated);

        // Kaitkan kategori yang dipilih dengan menu
        if ($request->has('product_id')) {
            // dd($request->all());
            $additional->menus()->attach($request->input('product_id'));
        }

        if ($request->has('variant_id')) {
            $additional->variants()->attach($request->input('variant_id'));
        }

        return redirect()->route('additionals.index')->with('success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Additional $additional): View
    {
        $additional->load('menus', 'variants'); // Mengambil data variant yang terasosiasi
        return view('additionals.show', compact('additional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Additional $additional): View
    {
        $menus = Menu::all();
        $variants = Variant::all(); // Fetch all variants
        $selectedMenus = $additional->menus->pluck('id')->toArray();
        // $selectedVariants = $additional->variants->pluck('id')->toArray();
        return view('additionals.edit', compact('additional', 'menus', 'variants', 'selectedMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Additional $additional): RedirectResponse
    {
        $validated = $request->validate([
            'additional_name'             => 'required|string|max:100',
            'additional_description'      => 'required|string',
            'additional_status'           => 'required|in:Active,Inactive',
            // 'product_id.*'                => 'nullable|integer',
            // 'variant_id.*'                => 'nullable|integer',
        ]);

        // Perbarui Additional
        $additional->update($validated);

        // Kaitkan additional yang dipilih dengan menu
        // if ($request->has('product_id')) {
        //     $additional->menus()->sync($request->input('product_id'));
        // } else {
        //     $additional->menus()->detach(); // Hapus pengaitan jika tidak ada menu yang dipilih
        // }
        // Kaitkan additional yang dipilih dengan variant
        // if ($request->has('variant_id')) {
        //     $additional->variants()->sync($request->input('variant_id'));
        // } else {
        //     $additional->variants()->detach(); // Hapus pengaitan jika tidak ada menu yang dipilih
        // }

        return redirect()->route('additionals.index')->with('success', 'Data berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Additional $additional): RedirectResponse
    {
        // Hapus kaitan dengan menu di tabel pivot
        $additional->menus()->detach();
        $additional->variants()->detach();
        
        $additional->delete();

        return redirect()->route('additionals.index')->with('success', 'Data berhasil Dihapus!');
    }
}
