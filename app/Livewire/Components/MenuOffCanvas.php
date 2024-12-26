<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;

class MenuOffCanvas extends Component
{
    public $categories;
    public $menus;

    public function render()
    {
        return view('livewire.components.menu-off-canvas');
    }

    public function mount()
    {
        $this->categories = Category::all();

        $menusQuery = Menu::where('product_status', 'Ready')
            ->join('category_menus', 'menus.id', '=', 'category_menus.menu_id')
            ->select('menus.*')
            ->distinct();

        if (request()->has('category_id') && request()->category_id) {
            $menusQuery->where('category_menus.category_id', request()->category_id);
        }

        if (request()->has('search') && request()->search) {
            $menusQuery->where('menus.product_name', 'like', '%' . request()->search . '%');
        }

        $this->menus = $menusQuery->get();
    }

    public function addToCart($id)
    {
        $menu = Menu::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $menu->product_name,
                'price' => $menu->product_price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('orders.create');
    }
}
