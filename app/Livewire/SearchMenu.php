<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;

class SearchMenu extends Component
{
    public $search = '';
    public $menus = [];
    
    public function render()
    {
        return view('livewire.components.search-menu');
    }

    public function updatedSearch()
    {
        $this->menus = Menu::where('product_name', 'like', '%' . $this->search . '%')->get();
    }
}
