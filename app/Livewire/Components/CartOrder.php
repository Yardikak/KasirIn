<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CartOrder extends Component
{
    public $cart = [];

    protected $listeners = ['cartUpdated' => '$refresh'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function render()
    {
        return view('livewire.components.cart-order');
    }

    public function removeFromCart($id)
    {
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
        }

        session()->put('cart', $this->cart);

        $this->dispatch('cartUpdated');
    }

    public function updateQuantity($id, $action)
    {
        if (isset($this->cart[$id])) {
            if ($action == 'increase') {
                $this->cart[$id]['quantity']++;
            } elseif ($action == 'decrease' && $this->cart[$id]['quantity'] > 1) {
                $this->cart[$id]['quantity']--;
            } elseif ($action == 'set') {
                $newQuantity = (int) $this->cart[$id]['quantity'];

                if ($newQuantity > 0) {
                    $this->cart[$id]['quantity'] = $newQuantity;
                }
            }

            session()->put('cart', $this->cart);

            $this->dispatch('cartUpdated');
        }
    }

    public function updateVariant($index, $variantId)
    {
        if (isset($this->cart[$index])) {
            $this->cart[$index]['selected_variant'] = $variantId;
            session()->put('cart', $this->cart);

            $this->dispatch('cartUpdated');
        }
    }
}
