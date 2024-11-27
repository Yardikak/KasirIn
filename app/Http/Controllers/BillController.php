<?php
namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }

    public function show($id)
    {
        $bill = Bill::with('order')->findOrFail($id);
        return view('bills.show', compact('bill'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|string',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->payment_status = $request->payment_status;
        $bill->save();

        return redirect()->route('bills.index')->with('success', 'Payment status updated.');
    }
}
