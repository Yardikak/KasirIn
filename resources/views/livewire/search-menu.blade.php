<div>
    <!-- Search Bar -->
    <div class="flex items-center rounded-lg overflow-hidden">
        <input type="text" wire:model="search" class="form-input" placeholder="Cari Menu...">
    </div>

    <div class="overflow-x-auto mb-4 shadow-lg rounded">
        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-gray-700 text-white text-base">
                <tr>
                    <th class="px-4 py-2 text-center">Menu ID</th>
                    <th class="px-4 py-2 text-center">Product Name</th>
                    <th class="px-4 py-2 text-center">Cost</th>
                    <th class="px-4 py-2 text-center">Price</th>
                    <th class="px-4 py-2 text-center">Quantity</th>
                    <th class="px-4 py-2 text-center">Status</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="shadow-inner">
                @foreach ($menus as $menu)
                    <tr class="text-center text-gray-800 border-gray-700 font-semibold text-base hover:bg-blue-200">
                        <td class="px-4 py-3 text-center">{{ $menu->id }}</td>
                        <td class="px-4 py-3 text-center">{{ $menu->product_name }}</td>
                        <td class="px-4 py-3 text-center">{{ $menu->product_cost }}</td>
                        <td class="px-4 py-3 text-center">{{ $menu->product_price }}</td>
                        <td class="px-4 py-3 text-center">{{ $menu->product_quantity }}</td>
                        <td class="px-4 py-3 text-center">{{ $menu->product_status }}</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('menus.show', $menu->id) }}" class="btn rounded-pill btn-primary py-1 px-3 font-semibold">View</a>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn rounded-pill btn-warning py-1 px-3 font-semibold">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn rounded-pill py-1 px-3 btn-danger font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $menus->links() }}
    </div>
</div>
