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
}
