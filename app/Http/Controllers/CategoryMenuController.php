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
        $menus = Menu::all(); // Atau sesuai dengan logika pencarian
        $assignedMenus = $category->menus->pluck('id')->toArray();
    
        // Pisahkan menu yang tersedia dan yang sudah terdaftar
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
        // Ambil string pencarian dari request
        $search = $request->get('search');
        
        // Buat query untuk menu
        $menus = Menu::query();
        
        // Jika ada string pencarian, tambahkan filter
        if ($search) {
            $menus->where('product_name', 'like', "%{$search}%");
        }
        
        // Ambil hasil pencarian
        $menus = $menus->get();
        
        // Ambil daftar ID menu yang sudah terdaftar di kategori
        $assignedMenus = $category->menus->pluck('id')->toArray();
        
        // Pisahkan menu yang tersedia dan yang sudah terdaftar
        $availableMenus = $menus->filter(function ($menu) use ($assignedMenus) {
            return !in_array($menu->id, $assignedMenus);
        });
        
        $assignedMenusList = $menus->filter(function ($menu) use ($assignedMenus) {
            return in_array($menu->id, $assignedMenus);
        });
        
        // Kirim data ke view
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
