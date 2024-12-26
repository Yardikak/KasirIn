<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Models\Variant;
use Illuminate\Http\Request;


class AdditionalVariantController extends Controller
{
    /**
     * Show the form for creating a new association.
     */
    public function create()
    {
        $additionals = Additional::all();
        $variants = Variant::all();
        return view('additional_variant.create', compact('additionals', 'variants'));
    }

    /**
     * Store a newly created association in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'additional_id' => 'required|exists:additionals,id',
            'variant_id'    => 'required|exists:variant,id',
        ]);

        $additional = Additional::find($validated['additional_id']);
        $additional->variants()->attach($validated['variant_id']);

        return redirect()->route('additional_variant.index')->with('success', 'Variant successfully linked to additional!');
    }

    /**
     * Display a listing of the associations.
     */
    public function index()
    {
        $additionals = Additional::with('variants')->get();
        return view('additional_variant.index', compact('additionals'));
    }

    /**
     * Remove the specified association from storage.
     */
    public function destroy(Additional $additional, Variant $variant)
    {
        $additional->variants()->detach($variant->id);
        return redirect()->route('additional_variant.index')->with('success', 'Variant successfully unlinked from additional!');
    }

    // /**
    //  * Get variants related to the selected additional.
    //  */
    // public function getVariantsByAdditional(Request $request): JsonResponse
    // {
    //     $additionalId = $request->input('additional_id');
    //     $additional = Additional::with('variants')->find($additionalId);

    //     if (!$additional) {
    //         return response()->json([]);
    //     }

    //     return response()->json($additional->variants);
    // }
}
