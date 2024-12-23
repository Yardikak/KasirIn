<x-layouts.layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Edit additional</h1>
        <a href="{{ route('additionals.index') }}" class="block mt-7 mb-7 bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded">Back to List</a>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('additionals.update', $additional->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- additional Details -->
                    <div class="form-group mb-4">
                        <label for="additional_name" class="block text-gray-800 text-sm font-semibold mb-2">additional Name</label>
                        <input type="text" id="additional_name" name="additional_name" class="form-input bg-white border rounded w-full" value="{{ old('additional_name', $additional->additional_name) }}" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="additional_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="additional_status" name="additional_status" class="form-select bg-white border rounded w-full" required>
                            <option value="Active" {{ old('additional_status', $additional->additional_status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('additional_status', $additional->additional_status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="additional_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="additional_description" name="additional_description" rows="4" class="w-full bg-white px-3 py-2 border rounded"
                        placeholder="Deskripsi singkat menu">{{ old('additional_description', $additional->additional_description) }}</textarea>
                    </div>


                    <!-- <div class="form-group mb-4">
                        <label for="additional_image" class="block text-gray-800 text-sm font-semibold mb-2">additional Image</label>
                        <input type="file" id="additional_image" name="additional_image" class="form-input bg-white border rounded w-full">
                        @if ($additional->additional_image)
                            <img src="{{ asset('storage/' . $additional->additional_image) }}" alt="additional Image" class="mt-4 w-full h-auto rounded">
                        @endif
                    </div> -->

                    
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update additional</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
