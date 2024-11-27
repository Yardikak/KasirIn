<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Additional;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $variants = Variant::latest()->paginate(5);
        return view('variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
{
    $additionals = Additional::all(); // Ambil semua additional
    $selectedAdditionalId = $request->query('additional_id'); // Ambil additional_id dari request jika ada

    return view('variants.create', compact('additionals', 'selectedAdditionalId'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'variant_name'      => 'required|string|max:100',
            'variant_status'    => 'required|in:Ready,Not Ready',
            'additional_id'     => 'nullable|exists:additional,id', // Validasi tambahan_id
        ]);

        $variant = Variant::create([
            'variant_name'   => $validated['variant_name'],
            'variant_status' => $validated['variant_status'],
        ]);
        
        // Hubungkan variant dengan additional
        // Periksa apakah additional_id ada di request
        if (isset($validated['additional_id'])) {
            $variant->additionals()->attach($validated['additional_id']);
        }

        return redirect()->route('additionals.show', $validated['additional_id'])->with('success', 'Variant berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant): View
    {
        return view('variants.show', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variant $variant): View
{
    // Get all possible additionals
    $additionals = Additional::all();
    
    // Get the selected additionals for the current variant
    $selectedAdditionals = $variant->additionals->pluck('additional_id')->toArray();

    return view('variants.edit', compact('variant', 'additionals', 'selectedAdditionals'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variant $variant): RedirectResponse
{
    $validated = $request->validate([
        'variant_name'   => 'required|string|max:255',
        'variant_status' => 'required|in:Ready,Not Ready',
        'additional_id.*'=> 'nullable|exists:additional,id',
    ]);

    $variant->update($validated);

    if ($request->has('additional_id')) {
        $variant->additionals()->sync($request->input('additional_id'));
    } else {
        $variant->additionals()->detach();
    }

    return redirect()->route('variants.index')->with('success', 'Variant updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant): RedirectResponse
    {
        $variant->additionals()->detach();
        
        $variant->delete();

        return redirect()->route('variants.index')->with('success', 'Variant berhasil dihapus!');
    }
}
