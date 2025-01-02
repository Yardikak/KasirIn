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
        $this->cart = session()->get('cart', []);
        $this->calculateFinalPrice();
    }

    public function render()
    {
        return view('livewire.components.order-summary', [
            'finalPrice' => $this->finalPrice,
            'cart' => $this->cart
        ]);
    }

    public function updateCart()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateFinalPrice();
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

        $order = \App\Models\Order::create([
            'order_code' => $orderCode,
            'total_price' => $this->finalPrice,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'order_status' => 'Pending',
            'table_id' => null,
            'customer_id' => null,
        ]);

        foreach ($this->cart as &$item) {
            if (!isset($item['id'])) {
                $menu = \App\Models\Menu::where('product_name', $item['name'])->first();
    
                if ($menu) {
                    $item['id'] = $menu->id;
                } else {
                    session()->flash('error', 'Menu not found: ' . $item['name']);
                    return;
                }
            }
    
            $order->menus()->attach($item['id'], [
                'order_quantity' => $item['quantity'],
                'order_price' => $item['price'],
            ]);
        }

        session()->forget('cart');
        $this->cart = [];
        $this->discount = 0;
        $this->tax = 0;
        $this->finalPrice = 0;

        session()->flash('success', 'Order has been successfully placed.');
    }

}
