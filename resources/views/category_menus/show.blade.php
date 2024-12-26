<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Manage Categories : {{ $category->category_name }}</h1>
            <a href="{{ route('category_menus.index') }}" class="block bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                Back To List
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border shadow-lg p-6">
            <!-- Search Bar -->
            <div class="mb-6">
                <form action="{{ route('category_menus.search', $category) }}" method="GET">
                    <div class="flex items-center border rounded-lg overflow-hidden">
                        <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Find Menu..." class="p-2 w-full bg-white border text-gray-800 rounded-md">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4">
                            Find
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex space-x-6">
                <!-- Available Menus -->
                <div class="w-1/2">
                    <h5 class="text-xl font-semibold text-gray-800 mb-4">Menu Tersedia</h5>
                    <ul class="list-none max-h-96 overflow-y-auto">
                        @foreach ($availableMenus as $menu)
                            <li class="bg-white border shadow-md mb-2 p-4 rounded flex justify-between items-center">
                                <span class="text-gray-800 text-base font-semibold">{{ $menu->product_name }}</span>
                                <form action="{{ route('category_menus.add', [$category, $menu]) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Add
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Assigned Menus -->
                <div class="w-1/2">
                    <h5 class="text-xl font-semibold text-gray-800 mb-4">Menu Terdaftar</h5>                    
                    <ul class="list-none max-h-96 overflow-y-auto">
                        @foreach ($assignedMenusList as $menu)
                            <li class="bg-white border shadow-md mb-2 p-4 rounded flex justify-between items-center">
                                <span class="text-gray-800">{{ $menu->product_name }}</span>
                                <form action="{{ route('category_menus.remove', [$category, $menu]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Remove
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
