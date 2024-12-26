<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Custom Categories</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white py-2 px-4 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($categories->isEmpty())
            <p class="text-gray-600">No categories found.</p>
        @else
        <div class="overflow-x-auto shadow-lg rounded">
            <table class="table-auto w-full bg-white shadow rounded">
                <thead class="bg-gray-700 text-white text-base">
                    <tr class="text-center text-lg font-bold">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Category Name</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 shadow-inner">
                    @foreach ($categories as $category)
                        <tr class="text-center border-gray-700 font-semibold hover:bg-blue-200">
                            <td class="px-4 py-2 whitespace-no-wrap">{{ $category->id }}</td>
                            <td class="px-4 py-3 whitespace-no-wrap">{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ route('category_menus.show', $category) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-pill">
                                        Manage
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</x-layouts.layout>
