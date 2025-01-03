<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Check if the position filter is provided
        $position = $request->get('position');

        // Fetch all tables or filter by the provided position
        if ($position) {
            $tables = Table::where('table_position', $position)->paginate(10); // Pagination for filtered tables
        } else {
            $tables = Table::paginate(10); // Fetch all tables
        }

        return view('tables.index', compact('tables', 'position'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Get the last table's ID
        $lastTable = Table::latest('id')->first();
        $nextId = $lastTable ? $lastTable->id + 1 : 1; // Increment the ID or start at 1 if no tables exist

        // Generate the next table_name and table_number
        $nextTableName = "Table $nextId";
        $nextTableNumber = $nextId;

        // Pass the generated values to the view
        return view('tables.create', compact('nextTableName', 'nextTableNumber'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    // Validate the fields except table_name and table_number (they will be auto-generated)
    $validated = $request->validate([
        'table_capacity' => 'required|integer',
        'table_width'    => 'required|integer',
        'table_height'   => 'required|integer',
        'table_color'    => 'required|string|max:100',
        'table_status'   => 'required|in:Empty,Filled',
        'table_position' => 'required|in:1,2,3',
    ]);

    // Get the next table ID
    $lastTable = Table::latest('id')->first(); // Get the last inserted table
    $nextId = $lastTable ? $lastTable->id + 1 : 1; // Increment the ID or start at 1 if no tables exist

    // Auto-generate table_name and table_number
    $validated['table_name'] = "Table $nextId";
    $validated['table_number'] = $nextId;

    // Create a new table with the validated data
    Table::create($validated);

    return redirect()->route('tables.index')->with('success', 'Table created successfully!');
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
        // Adjusted the field names to match the migration and model
        $validated = $request->validate([
            'table_name'     => 'required|string|max:100',
            'table_capacity' => 'required|integer',
            'table_width'    => 'required|integer',
            'table_height'   => 'required|integer',
            'table_color'    => 'required|string|max:100',
            'table_status'   => 'required|in:Empty,Filled',
            'table_position'    => 'required|in:1,2,3',
        ]);

        // Update the table with the validated data
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

    public function filterByPosition($position)
    {
        $tables = Table::where('table_position', $position)->paginate(10); // Paginate the filtered data
        return view('tables.index', compact('tables', 'position'));
    }

}
