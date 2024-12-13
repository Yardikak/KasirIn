<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $category->category_name }} Detail :</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category Details -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Category ID: {{ $category->id }}</h2>
                    <p class="text-gray-700"><strong>Category Name:</strong> {{ $category->category_name }}</p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $category->category_description }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $category->category_status }}</p>
                    
                    <!-- @if($category->category_image)
                        <div class="mt-4">
                            <strong>Category Image:</strong>
                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="{{ $category->category_name }}" class="w-full h-auto mt-2 rounded">
                        </div>
                    @endif -->
                </div>

                
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('categories.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
