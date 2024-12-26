<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryMenuController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(9);
        return view('category_menus.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $menus = Menu::all();
        $assignedMenus = $category->menus->pluck('id')->toArray();
    
        $availableMenus = $menus->filter(function ($menu) use ($assignedMenus) {
            return !in_array($menu->id, $assignedMenus);
        });
    
        $assignedMenusList = $menus->filter(function ($menu) use ($assignedMenus) {
            return in_array($menu->id, $assignedMenus);
        });
    
        return view('category_menus.show', compact('category', 'availableMenus', 'assignedMenusList'));
    }

    public function search(Category $category, Request $request)
    {
        $search = $request->get('search');
        
        $menus = Menu::query();
        
        if ($search) {
            $menus->where('product_name', 'like', "%{$search}%");
        }
        
        $menus = $menus->get();
        
        $assignedMenus = $category->menus->pluck('id')->toArray();
        
        $availableMenus = $menus->filter(function ($menu) use ($assignedMenus) {
            return !in_array($menu->id, $assignedMenus);
        });
        
        $assignedMenusList = $menus->filter(function ($menu) use ($assignedMenus) {
            return in_array($menu->id, $assignedMenus);
        });
        
        return view('category_menus.show', compact('category', 'availableMenus', 'assignedMenusList'));
    }    

    public function update(Request $request, Category $category)
    {
        $category->menus()->sync($request->input('menus', []));
        return redirect()->route('category_menus.index')->with('success', 'Menu updated successfully.');
    }

    public function add(Category $category, Menu $menu): RedirectResponse
    {
        $category->menus()->attach($menu->id);
        return redirect()->route('category_menus.show', $category)->with('success', 'Menu added successfully.');
    }

    public function remove(Category $category, Menu $menu): RedirectResponse
    {
        $category->menus()->detach($menu->id);
        return redirect()->route('category_menus.show', $category)->with('success', 'Menu removed successfully.');
    }
}
