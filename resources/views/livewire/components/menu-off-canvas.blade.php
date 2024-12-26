<div>
    <!-- Daftar Menu (Sebelah Kanan) -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 50%">
        <div class="bg-white sticky top-0 z-10 py-4 px-4 flex justify-between items-center">
            <h5 class="text-2xl font-semibold">Data Menu</h5>
            <!-- Filter Kategori -->
            <form action="{{ route('orders.create') }}" method="GET">
                <select name="category_id" class="form-select mt-1 block w-full bg-white text-gray-800 border rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </form>
            <!-- Pencarian Menu -->
            <form action="{{ route('orders.create') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Cari Menu..." class="form-input block w-full bg-white border rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 flex items-center justify-center">
                    <i class="bx bx-search"></i>
                </button>
            </form>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="offcanvasRight" aria-label="Close"></button>
        </div>
        <div class="shadow-md rounded-lg overflow-auto w-full p-4 m-2">
            <!-- Card Menu -->
            <div class="offcanvas-body overflow-y-auto my-auto mx-0 flex-grow-0">
                <div class="flex flex-wrap -mx-2">
                    @foreach ($menus as $menu)
                    <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-4">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset($menu->product_image) }}" class="w-full h-32 object-cover" alt="{{ $menu->product_name }}">
                            <div class="p-4">
                                <h5 class="font-semibold text-lg">{{ $menu->product_name }}</h5>
                                <p class="text-gray-600">Rp{{ number_format($menu->product_price, 0, ',', '.') }},-</p>
                                <p class="text-gray-500 text-sm">Tersedia: {{ $menu->product_quantity }}</p>
                                <div class="flex justify-center mt-2">
                                    <button wire:click.prevent="addToCart({{ $menu->id }})" class="btn bg-blue-500 text-white rounded-md px-4 py-2">
                                        Add This!
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>