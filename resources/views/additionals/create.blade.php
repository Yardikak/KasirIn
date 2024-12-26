<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Create Additional</h1>
            <div class="flex space-x-4">
                <a href="{{ route('additionals.index') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Additional List</a>
            </div>
        </div>
        @if ($errors->any())
            <div class="bg-red-500 text-gray-800 p-4 rounded mb-6">
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
                <div class="form-group">
                    <label for="additional_name" class="block text-gray-800 text-sm font-semibold mb-2">Additional Name :</label>
                    <input type="text" id="additional_name" name="additional_name" class="form-input bg-white text-gray-800 shadow border rounded w-full" value="{{ old('additional_name') }}" placeholder="Additional Name.." required>
                </div>
                <div class="form-group">
                    <label for="additional_description" class="block text-gray-800 text-sm font-semibold mb-2">Description :</label>
                    <input type="text" id="additional_description" name="additional_description" class="form-input bg-white text-gray-800 shadow border rounded w-full" value="{{ old('additional_description') }}" placeholder="Description.." required>
                </div>
                <div class="form-group">
                    <label for="additional_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                    <select id="additional_status" name="additional_status" class="form-select bg-white text-gray-800 shadow border rounded w-full" required>
                        <option value="">Select Status</option>
                        <option value="Ready" {{ old('additional_status') == 'Ready' ? 'selected' : '' }}>Ready</option>
                        <option value="Not Ready" {{ old('additional_status') == 'Not Ready' ? 'selected' : '' }}>Not Ready</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id" class="block text-gray-800 text-sm font-semibold mb-2">Menu</label>
                    <select id="product_id" name="product_id" class="form-select bg-white text-gray-800 shadow border rounded w-full">
                        <option value="">Select Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ old('product_id') == $menu->id ? 'selected' : '' }}>{{ $menu->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-green-600 shadow-lg hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Create</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
