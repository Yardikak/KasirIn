<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $sortOrder = $request->input('sort', 'asc'); // Default to ascending if no sort parameter is provided

        // Validate sort order
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Get customers with sorting
        $customers = Customer::orderBy('customer_fullname', $sortOrder)->latest()->paginate(10);

        return view('customers.index', compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'customer_fullname'          => 'required|string|max:100',
            'customer_gender'            => 'required|string|in:Male,Female',
            'customer_email'             => 'required|string|email|unique:customers,customer_email',
            'customer_phone'             => 'required|string',
            'customer_birth'             => 'required|string',
            'customer_status'            => 'required|in:Active,Inactive',
            
        ]);

        // Buat customer
        $customer = Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Data berhasil Disimpan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View
    {
        return view('customers.show', compact('customer'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
       
        return view('customers.edit', compact('customer'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
{
    $validated = $request->validate([
        'customer_fullname'              => 'required|string|max:100',
            'customer_gender'            => 'required|string|in:Male,Female',
            'customer_email'             => 'required|string|email|unique:customers,customer_email',
            'customer_phone'             => 'required|string',
            'customer_birth'             => 'required|string',
            'customer_status'            => 'required|in:Active,Inactive',
    ]);
    // Perbarui customer
    $customer->update($validated);
    return redirect()->route('customers.index')->with('success', 'Data berhasil Diperbarui!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Data berhasil Dihapus!');
    }
}
