<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $menu->product_name }} Detail :</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Menu Details -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Menu ID: {{ $menu->id }}</h2>
                    <p class="text-gray-700"><strong>Product Name:</strong> {{ $menu->product_name }}</p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $menu->product_description }}</p>
                    <p class="text-gray-700"><strong>Product Cost:</strong> Rp.{{ number_format($menu->product_cost, 2) }}</p>
                    <p class="text-gray-700"><strong>Product Price:</strong> Rp.{{ number_format($menu->product_price, 2) }}</p>
                    <p class="text-gray-700"><strong>Quantity:</strong> {{ $menu->product_quantity }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $menu->product_status }}</p>
                    
                    @if($menu->product_image)
                        <div class="mt-4">
                            <strong>Product Image:</strong>
                            <img src="{{ asset('storage/' . $menu->product_image) }}" alt="{{ $menu->product_name }}" class="w-full h-auto mt-2 rounded">
                        </div>
                    @endif
                </div>

                <!-- Related Categories -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Related Categories</h2>
                    @if($menu->categories->isEmpty())
                        <p class="text-gray-900">No categories assigned to this menu.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach ($menu->categories as $category)
                                <li class="text-gray-700">{{ $category->category_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Related Additionals -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Related Additionals</h2>
                    @if($menu->additionals->isEmpty())
                        <p class="text-gray-900">No additional items assigned to this menu.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach ($menu->additionals as $additional)
                                <li class="text-gray-700">{{ $additional->additional_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('menus.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                <a href="{{ route('menus.edit', $menu->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
