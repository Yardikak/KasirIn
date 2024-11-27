<x-layouts.layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Edit Menu</h1>
        <a href="{{ route('menus.index') }}" class="block mt-7 mb-7 bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded">Back to List</a>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Menu Details -->
                    <div class="form-group mb-4">
                        <label for="product_name" class="block text-gray-800 text-sm font-semibold mb-2">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-input bg-white border rounded w-full" value="{{ old('product_name', $menu->product_name) }}" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="product_cost" class="block text-gray-800 text-sm font-semibold mb-2">Product Cost</label>
                        <input type="number" id="product_cost" name="product_cost" class="form-input bg-white border rounded w-full" value="{{ old('product_cost', $menu->product_cost) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="product_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="product_description" name="product_description" rows="4" class="w-full bg-white px-3 py-2 border rounded"
                        placeholder="Deskripsi singkat menu">{{ old('product_description', $menu->product_description) }}</textarea>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="product_price" class="block text-gray-800 text-sm font-semibold mb-2">Product Price</label>
                        <input type="number" id="product_price" name="product_price" class="form-input bg-white border rounded w-full" value="{{ old('product_price', $menu->product_price) }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_quantity" class="block text-gray-800 text-sm font-semibold mb-2">Quantity</label>
                        <input type="number" id="product_quantity" name="product_quantity" class="form-input bg-white border rounded w-full" value="{{ old('product_quantity', $menu->product_quantity) }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="product_status" name="product_status" class="form-select bg-white border rounded w-full" required>
                            <option value="Ready" {{ old('product_status', $menu->product_status) == 'Ready' ? 'selected' : '' }}>Ready</option>
                            <option value="Not Ready" {{ old('product_status', $menu->product_status) == 'Not Ready' ? 'selected' : '' }}>Not Ready</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_image" class="block text-gray-800 text-sm font-semibold mb-2">Product Image</label>
                        <input type="file" id="product_image" name="product_image" class="form-input bg-white border rounded w-full">
                        @if ($menu->product_image)
                            <img src="{{ asset('storage/' . $menu->product_image) }}" alt="Product Image" class="mt-4 w-full h-auto rounded">
                        @endif
                    </div>

                    <!-- Category Selection -->
                    <div x-data="{ categoryFields: @json($selectedCategories) }" class="form-group mb-4">
                        <label class="block text-gray-800 text-sm font-semibold mb-2">Select Category</label>
                        <template x-for="(categoryId, index) in categoryFields" :key="index">
                            <div class="flex items-center mb-4">
                                <select class="form-select bg-white border rounded w-full" :name="'category_id['+index+']'" x-model="categoryFields[index]">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" :selected="categoryId == {{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" @click="categoryFields.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Remove</button>
                            </div>
                        </template>
                        <button type="button" @click="categoryFields.push(null)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-1">
                            + Category
                        </button>
                    </div>

                    <!-- Additional Selection -->
                    <div x-data="{ additionalFields: @json($selectedAdditionals) }" class="form-group mb-4">
                        <label class="block text-gray-800 text-sm font-semibold mb-2">Select Additional</label>
                        <template x-for="(additionalId, index) in additionalFields" :key="index">
                            <div class="flex items-center mb-4">
                                <select class="form-select bg-white border rounded w-full" :name="'additional_id['+index+']'" x-model="additionalFields[index]">
                                    <option value="">Select an Additional</option>
                                    @foreach ($additionals as $additional)
                                        <option value="{{ $additional->id }}" :selected="additionalId == {{ $additional->id }}">
                                            {{ $additional->additional_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" @click="additionalFields.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Remove</button>
                            </div>
                        </template>
                        <button type="button" @click="additionalFields.push(null)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-1">
                            + Additional
                        </button>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Menu</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
