<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Additional;
use App\Models\Menu;

class AdditionalMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $additionals = Additional::all();
        return view('additionals_menus.index', compact('additionals'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Additional $additional)
    {
        $menus = Menu::all(); // Atau sesuai dengan logika pencarian
        $assignedMenus = $additional->menus->pluck('id')->toArray();
    
        // Pisahkan menu yang tersedia dan yang sudah terdaftar
        $availableMenus = $menus->filter(function ($menu) use ($assignedMenus) {
            return !in_array($menu->id, $assignedMenus);
        });
    
        $assignedMenusList = $menus->filter(function ($menu) use ($assignedMenus) {
            return in_array($menu->id, $assignedMenus);
        });
    
        return view('additional_menus.show', compact('additional', 'availableMenus', 'assignedMenusList'));
    }

    /**
     * Search a whole additional in storage.
     */
    public function search(Additional $additional, Request $request)
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
        
        // Ambil daftar ID menu yang sudah terdaftar di additional
        $assignedMenus = $additional->menus->pluck('id')->toArray();
        
        // Pisahkan menu yang tersedia dan yang sudah terdaftar
        $availableMenus = $menus->filter(function ($menu) use ($assignedMenus) {
            return !in_array($menu->id, $assignedMenus);
        });
        
        $assignedMenusList = $menus->filter(function ($menu) use ($assignedMenus) {
            return in_array($menu->id, $assignedMenus);
        });
        
        // Kirim data ke view
        return view('additional_menus.show', compact('additional', 'availableMenus', 'assignedMenusList'));
    } 

    public function add(Additional $additional, Menu $menu): RedirectResponse
    {
        $additional->menus()->attach($menu->id);
        return redirect()->route('additional_menus.show', $additional)->with('success', 'Additional added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Additional $additional)
    {
        $additional->menus()->sync($request->input('menus', []));
        return redirect()->route('additional_menus.index')->with('success', 'Additional updated successfully.');
    }
}
