<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Create New Category</h1>
            <div class="flex space-x-4">
                <a href="{{ route('categories.index') }}" class="block bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                    Back To List
                </a>
            </div>
        </div>
        @if ($errors->any())
            <div class="bg-red-500 text-gray-600 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Category Details -->
                    <div class="form-group mb-4">
                        <label for="category_name" class="block text-gray-800 text-sm font-semibold mb-2">Category Name</label>
                        <input type="text" id="category_name" name="category_name" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('category_name') }}" placeholder="Category Name.." required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="category_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="category_status" name="category_status" class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" required>
                            <option value="Active" {{ old('category_status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('category_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="category_description" name="category_description" rows="4" class="w-full bg-white border-gray-200 shadow px-3 py-2 text-gray-800 rounded" placeholder="Deskripsi singkat Category..">{{ old('category_description') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Category</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
