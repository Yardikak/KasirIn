<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;


class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orderCode = 'ORD' . date('dmY') . '-' . strtoupper(substr(uniqid(), -5));
        $tableId =  $request->query('table_id');
        $tableName = $request->query('table_name');
        $table = null;
        if ($tableId) {
            $table = \App\Models\Table::find($tableId);
        }
        session(['tableId' => $tableId, 'tableName' => $tableName, 'orderCode' => $orderCode, 'table' => $table]);
        // Debugging
        \Log::info('Session Data in indexe:', [
            'tableId' => session('tableId'),
            'tableName' => session('tableName'),
            'orderCode' => session('orderCode'),
        ]);
        return view('orders.index', compact('tableId', 'tableName', 'orderCode','table'));
    }

    public function create(Request $request)
    {
        \Log::info('Session Data in Create:', [
            'tableId' => session('tableId'),
            'tableName' => session('tableName'),
            'orderCode' => session('orderCode'),
        ]);
         // Get the table ID and table name from the query parameters
         $orderCode = session('orderCode');
         $tableName = session('tableName'); // Default to null if not provided
         $tableId = session('tableId'); // Default to null if not provided
         $table=session('table');
         if ($tableId==null) {
             return view('orders.index', compact('orderCode'));
         }else{
             return view('orders.index', compact('tableId', 'tableName', 'orderCode','table'));
         }
    }

    public function searchCustomer(Request $request)
    {
        $search = $request->input('customer_search');
        $customer = Customer::where('name', 'like', "%{$search}%")->first();

        if (is_null($customer)) {
            return redirect()->route('orders.index')->with('error', '*Customer tidak ditemukan');
        } else {
            return redirect()->route('orders.index')->with('customer', $customer);
        }
    }

    public function createCustomer(Request $request)
    {
        // Validasi input nama
        $request->validate([
            'customer_full_name' => 'required|string|max:255',
        ]);

        // Membuat customer baru dengan hanya mengisi nama
        $customer = Customer::create([
            'customer_full_name' => $request->input('customer_full_name'),
        ]);

        // Mengembalikan respons dengan data customer yang baru dibuat
        return redirect()->route('orders.index')->with('success', 'Customer berhasil dibuat.');
    }
    
    public function show($id)
    {
        $order = Order::with('menus')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order telah berhasil dihapus.');
    }
}
