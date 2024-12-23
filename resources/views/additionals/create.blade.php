<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Create New Additional</h1>
            <div class="flex space-x-4">
                <a href="{{ route('additionals.index') }}" class="block bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
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

        <form action="{{ route('additionals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- additional Details -->
                    <div class="form-group mb-4">
                        <label for="additional_name" class="block text-gray-800 text-sm font-semibold mb-2">Additional Name</label>
                        <input type="text" id="additional_name" name="additional_name" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('additional_name') }}" placeholder="Additional Name.." required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="additional_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="additional_status" name="additional_status" class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" required>
                            <option value="Active" {{ old('additional_status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('additional_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="additional_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="additional_description" name="additional_description" rows="4" class="w-full bg-white border-gray-200 shadow px-3 py-2 text-gray-800 rounded" placeholder="Deskripsi singkat additional..">{{ old('additional_description') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create additional</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
