<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Edit Table</h1>
            <a href="{{ route('tables.index') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                Back To List
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tables.update', $table->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Table Name (Readonly) -->
                    <div class="form-group">
                        <label for="table_name" class="block text-gray-800 font-semibold mb-2">Table Name</label>
                        <input type="text" id="table_name" name="table_name" class="form-input border-gray-200 rounded w-full bg-gray-100" value="{{ $table->table_name }}" readonly>
                    </div>

                    <!-- Table Number (Readonly) -->
                    <div class="form-group">
                        <label for="table_number" class="block text-gray-800 font-semibold mb-2">Table Number</label>
                        <input type="text" id="table_number" name="table_number" class="form-input border-gray-200 rounded w-full bg-gray-100" value="{{ $table->table_number }}" readonly>
                    </div>

                    <!-- Table Capacity -->
                    <div class="form-group">
                        <label for="table_capacity" class="block text-gray-800 font-semibold mb-2">Capacity</label>
                        <input type="number" id="table_capacity" name="table_capacity" class="form-input border-gray-200 rounded w-full" value="{{ old('table_capacity', $table->table_capacity) }}" placeholder="Enter table capacity" min="1" required>
                    </div>

                    <!-- Table Width -->
                    <div class="form-group">
                        <label for="table_width" class="block text-gray-800 font-semibold mb-2">Width (cm)</label>
                        <input type="number" id="table_width" name="table_width" class="form-input border-gray-200 rounded w-full" value="{{ old('table_width', $table->table_width) }}" placeholder="Enter table width (cm)" min="1" required>
                    </div>

                    <!-- Table Height -->
                    <div class="form-group">
                        <label for="table_height" class="block text-gray-800 font-semibold mb-2">Height (cm)</label>
                        <input type="number" id="table_height" name="table_height" class="form-input border-gray-200 rounded w-full" value="{{ old('table_height', $table->table_height) }}" placeholder="Enter table height (cm)" min="1" required>
                    </div>

                    <!-- Table Color -->
                    <div class="form-group">
                        <label for="table_color" class="block text-gray-800 font-semibold mb-2">Color</label>
                        <input type="text" id="table_color" name="table_color" class="form-input border-gray-200 rounded w-full" value="{{ old('table_color', $table->table_color) }}" placeholder="Enter table color" required>
                    </div>

                    <!-- Table Status -->
                    <div class="form-group">
                        <label for="table_status" class="block text-gray-800 font-semibold mb-2">Status</label>
                        <select id="table_status" name="table_status" class="form-select border-gray-200 rounded w-full" required>
                            <option value="Empty" {{ old('table_status', $table->table_status) == 'Empty' ? 'selected' : '' }}>Empty</option>
                            <option value="Filled" {{ old('table_status', $table->table_status) == 'Filled' ? 'selected' : '' }}>Filled</option>
                        </select>
                    </div>

                    <!-- Table Position -->
                    <div class="form-group">
                        <label for="table_position" class="block text-gray-800 font-semibold mb-2">Position</label>
                        <select id="table_position" name="table_position" class="form-select border-gray-200 rounded w-full" required>
                            <option value="1" {{ old('table_position', $table->table_position) == '1' ? 'selected' : '' }}>Position 1</option>
                            <option value="2" {{ old('table_position', $table->table_position) == '2' ? 'selected' : '' }}>Position 2</option>
                            <option value="3" {{ old('table_position', $table->table_position) == '3' ? 'selected' : '' }}>Position 3</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Update Table</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
