<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        // Generate unique order code
        $orderCode = 'ORD' . date('dmY') . '-' . strtoupper(substr(uniqid(), -5));

        // Kembalikan tampilan dengan data kategori dan menu
        return view('orders.create', compact('orderCode'));
    }

    public function addToCart(Request $request)
    {
        $menuId = $request->input('id');
        $menu = Menu::findOrFail($menuId);

        $cart = session()->get('cart', []);

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity']++;
        } else {
            $cart[$menuId] = [
                'name' => $menu->product_name,
                'price' => $menu->product_price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('orders.create');
    }

    public function searchCustomer(Request $request)
    {
        $search = $request->input('customer_search');
        $customer = Customer::where('name', 'like', "%{$search}%")->first();

        if (is_null($customer)) {
            return redirect()->route('orders.create')->with('error', '*Customer tidak ditemukan');
        } else {
            // Mengarahkan kembali ke halaman dengan data customer jika diperlukan
            return redirect()->route('orders.create')->with('customer', $customer);
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
        return redirect()->route('orders.create')->with('success', 'Customer berhasil dibuat.');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'cart' => 'required|array',
    //         'cart.*.id' => 'required|exists:menus,id',
    //         'cart.*.quantity' => 'required|integer|min:1',
    //         'customer_id' => 'required|exists:customers,id',
    //     ]);


    //     // Ambil orderCode dari request
    //     $orderCode = $request->input('order_code');

    //     $order = new Order();
    //     $order->order_code = $orderCode;
    //     $order->status = 'Pending';
    //     $order->notes = $request->input('notes', '');
    //     $order->customer_id = $request->input('customer_id');
    //     $order->save();

    //     $totalPrice = 0;

    //     foreach ($request->cart as $item) {
    //         $menu = Menu::find($item['id']);

    //         // Check if there is enough stock
    //         if ($menu->product_quantity < $item['quantity']) {
    //             return redirect()->back()->with('error', 'Stok untuk menu: ' . $menu->product_name . ' tidak memadai.');
    //         }

    //         // Attach menu to order with additional details
    //         $order->menus()->attach($menu, [
    //             'quantity' => $item['quantity'],
    //             'price' => $menu->product_price,
    //             'notes' => $request->input('notes', ''),
    //         ]);

    //         // Pengurangan jumlah stock dari kuantitas yang dipesan
    //         $menu->product_quantity -= $item['quantity'];
    //         $menu->save();

    //         $totalPrice += $menu->product_price * $item['quantity'];
    //     }

    //     // Update total price in order
    //     $order->total_price = $totalPrice;
    //     $order->save();

    //     return redirect()->route('orders.index')->with('success', 'Order telah berhasil dilakukan.');
    // }

    // public function show($id)
    // {
    //     $order = Order::with('menus')->findOrFail($id);
    //     return view('orders.show', compact('order'));
    // }

    // public function confirm($id, Request $request)
    // {
    //     $order = Order::findOrFail($id);

    //     // Kalkulasi harga dengan jumlah barang
    //     $totalPrice = $order->menus->sum(function ($menu) {
    //         return $menu->pivot->quantity * $menu->pivot->price;
    //     });

    //     // Mengambil nilai diskon dari input user (jika ada)
    //     $discounts = $request->input('discount', 0); // Jika tidak ada diskon, default 0%
    //     $discount = ($discounts / 100) * $totalPrice;

    //     $discount = 0; // Inisiasi diskon
    //     $tax = 0; // Inisiasi pajak
    //     $finalPrice = $totalPrice - $discount + $tax;

    //     // Membuat dan memasukkan data ke dalam bill
    //     $bill = new Bill();
    //     $bill->order_id = $order->id;
    //     $bill->bill_number = 'BILL-' . strtoupper(uniqid());
    //     $bill->total_price = $totalPrice;
    //     $bill->discount = $discount;
    //     $bill->tax = $tax;
    //     $bill->final_price = $finalPrice;
    //     $bill->payment_status = 'Unpaid';
    //     $bill->save();

    //     $order->status = 'Confirmed';
    //     $order->save();

    //     return redirect()->route('orders.index')->with('success', 'Order confirmed and bill generated.');
    // }

    // public function destroy($id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->delete();

    //     return redirect()->route('orders.index')->with('success', 'Order telah berhasil dihapus.');
    // }
}
