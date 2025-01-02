<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Menu List</h1>
            <div class="flex space-x-4">
                <a href="{{ route('menus.create') }}" class="bg-green-500 text-white font-semibold py-2 px-3 rounded hover:bg-green-600 transition duration-300 ease-in-out">+ Create New Menu</a>
                @if(request('sort') === 'desc')
                <a href="{{ route('menus.index', ['sort' => 'asc']) }}" class="bg-blue-600 text-gray-800 font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAKtJREFUSEvtlcENgzAQBIcOKCElUAJURlIZKSElUEI6gPiHbIHWcHBE8kl+YJmd09iYCqeqnLgU8GXmi2p31a1xB+84b22PJ2Nwwrkd2E21sek0TvmOa6DJ7OQDfLfeUcBB+5AJ7oDkJC8zbg12U51pWVuuqI6THkAYyxqBMOTaA34CfUR4/Z7DvFx/BXZTLes8eoGYgNTf4imw3JvrlCb2nGqTRgrYRKMSMgO5kxQfRwhZ0wAAAABJRU5ErkJggg=="/>Descending 
                    </a>
                @else
                    <a href="{{ route('menus.index', ['sort' => 'desc']) }}" class="bg-blue-600 text-white font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAKtJREFUSEvtlcENgzAQBIcOKCElUAJURlIZKSElUEI6gPiHbIHWcHBE8kl+YJmd09iYCqeqnLgU8GXmi2p31a1xB+84b22PJ2Nwwrkd2E21sek0TvmOa6DJ7OQDfLfeUcBB+5AJ7oDkJC8zbg12U51pWVuuqI6THkAYyxqBMOTaA34CfUR4/Z7DvFx/BXZTLes8eoGYgNTf4imw3JvrlCb2nGqTRgrYRKMSMgO5kxQfRwhZ0wAAAABJRU5ErkJggg=="/>Ascending
                    </a>
                @endif
            </div>
        </div>
        <!-- Search Bar -->
        {{-- @livewire('search-menu', 'updateSearch') --}}
    
        @if (session('success'))
            <div class="bg-green-500 text-gray-800 font-semibold p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($menus->isEmpty())
            <p class="text-red-800 font-semibold">No menu found.</p>
        @else
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
        @endif
    </div>
</x-layouts.layout>
