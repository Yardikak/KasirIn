<x-layouts.layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Edit Category</h1>
        <a href="{{ route('categories.index') }}" class="block mt-7 mb-7 bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded">Back to List</a>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Category Details -->
                    <div class="form-group mb-4">
                        <label for="category_name" class="block text-gray-800 text-sm font-semibold mb-2">Category Name</label>
                        <input type="text" id="category_name" name="category_name" class="form-input bg-white border rounded w-full" value="{{ old('category_name', $category->category_name) }}" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="category_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="category_status" name="category_status" class="form-select bg-white border rounded w-full" required>
                            <option value="Active" {{ old('category_status', $category->category_status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('category_status', $category->category_status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="category_description" name="category_description" rows="4" class="w-full bg-white px-3 py-2 border rounded"
                        placeholder="Deskripsi singkat menu">{{ old('category_description', $category->category_description) }}</textarea>
                    </div>


                    <!-- <div class="form-group mb-4">
                        <label for="category_image" class="block text-gray-800 text-sm font-semibold mb-2">Category Image</label>
                        <input type="file" id="category_image" name="category_image" class="form-input bg-white border rounded w-full">
                        @if ($category->category_image)
                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="Category Image" class="mt-4 w-full h-auto rounded">
                        @endif
                    </div> -->

                    
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Category</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
