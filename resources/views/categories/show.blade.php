<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-8">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800 flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 00-2 0v2a1 1 0 002 0V7zm-1 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $category->category_name }} Details</span>
                </h1>
                <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <!-- Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category Details -->
                <div class="bg-blue-50 rounded-lg p-6 shadow-md">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Category Information</h2>
                    <div class="text-gray-700 space-y-3">
                        <p><strong>Category ID:</strong> {{ $category->id }}</p>
                        <p><strong>Name:</strong> {{ $category->category_name }}</p>
                        <p><strong>Description:</strong> {{ $category->category_description }}</p>
                        <p><strong>Status:</strong> 
                            <span class="px-3 py-1 rounded-full text-sm {{ $category->category_status == 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $category->category_status }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Image Section -->
                @if($category->category_image)
                <div class="rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset('storage/' . $category->category_image) }}" alt="{{ $category->category_name }}" class="w-full h-56 object-cover">
                </div>
                @endif
            </div>

            <!-- Actions Section -->
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('categories.edit', $category->id) }}" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    
                    Edit
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
