<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Create New Menu</h1>
            <div class="flex space-x-4">
                <a href="{{ route('menus.index') }}" class="block bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
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

        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Menu Details -->
                    <div class="form-group mb-4">
                        <label for="product_name" class="block text-gray-800 text-sm font-semibold mb-2">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('product_name') }}" placeholder="Product Name.." required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="product_cost" class="block text-gray-800 text-sm font-semibold mb-2">Product Cost</label>
                        <input type="number" id="product_cost" name="product_cost" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('product_cost') }}" placeholder="Cost.." required>
                    </div>

                    <div class="form-group">
                        <label for="product_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                        <textarea id="product_description" name="product_description" rows="4" class="w-full bg-white border-gray-200 shadow px-3 py-2 text-gray-800 rounded" placeholder="Deskripsi singkat menu..">{{ old('product_description') }}</textarea>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="product_price" class="block text-gray-800 text-sm font-semibold mb-2">Product Price</label>
                        <input type="number" id="product_price" name="product_price" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('product_price') }}" placeholder="Price.." required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_quantity" class="block text-gray-800 text-sm font-semibold mb-2">Quantity</label>
                        <input type="number" id="product_quantity" name='product_quantity' class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('product_quantity') }}" placeholder="Quantity.." required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="product_status" name="product_status" class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" required>
                            <option value="Ready" {{ old('product_status') == 'Ready' ? 'selected' : '' }}>Ready</option>
                            <option value="Not Ready" {{ old('product_status') == 'Not Ready' ? 'selected' : '' }}>Not Ready</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_image" class="block text-gray-800 text-sm font-semibold mb-2">Product Image</label>
                        <input type="file" id="product_image" name="product_image" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full">
                    </div>

                    <!-- Category Selection -->
                    <div x-data="{ categoryFields: [] }" class="form-group mb-4">
                        <label class="block text-gray-800 text-sm font-semibold mb-2">Select Category</label>
                        <template x-for="field in categoryFields" :key="field.id">
                            <div class="flex items-center mb-4">
                                <select class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" id="category_id[]" name="category_id[]">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('category_id', [])) ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" @click="categoryFields = categoryFields.filter(f => f.id !== field.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                    -
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="categoryFields.push({ id: categoryFields.length + 1 })" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2">
                            + Category
                        </button>
                    </div>

                    <!-- Additional Selection -->
                    <div x-data="{ additionalFields: [] }" class="form-group mb-4">
                        <label class="block text-gray-800 text-sm font-semibold mb-2">Select Additional</label>
                        <template x-for="field in additionalFields" :key="field.id">
                            <div class="flex items-center mb-4">
                                <select class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" id="additional_id[]" name="additional_id[]">
                                    @foreach ($additionals as $additional)
                                        <option value="{{ $additional->id }}" {{ in_array($additional->id, old('additional_id', [])) ? 'selected' : '' }}>
                                            {{ $additional->additional_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" @click="additionalFields = additionalFields.filter(f => f.id !== field.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                    -
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="additionalFields.push({ id: additionalFields.length + 1 })" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2">
                            + Additional
                        </button>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Menu</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
