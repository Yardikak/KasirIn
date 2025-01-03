<?php

namespace App\Livewire\Components;

use Livewire\Component;

class OrderSummary extends Component
{

    public $cart = [];
    public $discount = 0;
    public $tax = 0;
    public $finalPrice = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
        $this->calculateFinalPrice();
    }

    public function render()
    {
        $this->updateCart();

        return view('livewire.components.order-summary');
    }
    
    public function updateCart()
    {
        $this->cart = session()->get('cart', []);
        if (empty($this->cart)) {
            $this->cart = [];
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'discount' || $propertyName === 'tax') {
            $this->calculateFinalPrice();
        }
    }

    private function calculateFinalPrice()
    {
        $totalPrice = $this->getTotalPrice();
        $discountAmount = ($this->discount / 100) * $totalPrice;
        $taxAmount = ($this->tax / 100) * $totalPrice;
        $this->finalPrice = $totalPrice - $discountAmount + $taxAmount;
    }

    private function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }

    public function confirmOrder()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty. Please add items before confirming the order.');
            return;
        }

        $this->calculateFinalPrice();

        $orderCode = session('orderCode');
        $tableId = session('tableId');
        $table  =session('table');
        $order = \App\Models\Order::create([
            'order_code' => $orderCode,
            'total_price' => $this->finalPrice,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'order_status' => 'Pending',
            'table_id' => $tableId,
            'customer_id' => null,
        ]);
        // dd($orderCode);
        $table->update([
            'table_status' => 'Filled',
        ]);

        foreach ($this->cart as &$item) {
            if (!isset($item['id'])) {
                $menu = \App\Models\Menu::where('product_name', $item['name'])->first();
    
                if (!$menu) {
                    session()->flash('error', 'Menu not found: ' . $item['name']);
                    return;
                }
    
                $item['id'] = $menu->id;
            }
        
            // Validasi dan kurangi stok
            $menu = \App\Models\Menu::find($item['id']);
            if ($menu->product_quantity < $item['quantity']) {
                session()->flash('error', 'Insufficient stock for menu: ' . $menu->product_name);
                return;
            }
            $menu->product_quantity -= $item['quantity'];
            $menu->save();

            // Tambahkan menu ke order
            $order->menus()->attach($item['id'], [
                'order_quantity' => $item['quantity'],
                'order_price' => $item['price'],
            ]);
        }
        

        session()->forget('cart');
        session()->forget('orderCode');
        session()->forget('tableId');
        session()->forget('tableName');
        $this->cart = [];
        session()->flash('success', 'Order has been successfully placed.');
        return redirect()->route('orders.index');
    }

}
