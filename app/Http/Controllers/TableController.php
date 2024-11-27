<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tables = Table::latest()->paginate(5);
        return view('tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tableName'     => 'required|string|max:100',
            'tableCapacity' => 'required|integer',
            'tableWidth'    => 'required|integer',
            'tableHeight'   => 'required|integer',
            'tableType'     => 'required|in:Persegi Panjang,Persegi,Lingkaran',
            'tableColor'    => 'required|string|max:100',
            'tableStatus'   => 'required|in:Empty,Filled',
            'tableFloor'    => 'required|in:1,2,3',
        ]);

        Table::create($validated);

        return redirect()->route('tables.index')->with('success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table): View
    {
        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table): View
    {
        return view('tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table): RedirectResponse
    {
        $validated = $request->validate([
            'tableName'     => 'required|string|max:100',
            'tableCapacity' => 'required|integer',
            'tableWidth'    => 'required|integer',
            'tableHeight'   => 'required|integer',
            'tableType'     => 'required|in:Persegi Panjang,Persegi,Lingkaran',
            'tableColor'    => 'required|string|max:100',
            'tableStatus'   => 'required|in:Empty,Filled',
            'tableFloor'    => 'required|in:1,2,3',
        ]);

        $table->update($validated);

        return redirect()->route('tables.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table): RedirectResponse
    {
        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Meja Berhasil Dihapus!');
    }
}
