<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">Table Details:</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Table Details -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Table ID: {{ $table->id }}</h2>
                    <p class="text-gray-700"><strong>Table Name:</strong> {{ $table->table_name }}</p>
                    <p class="text-gray-700"><strong>Table Number:</strong> {{ $table->table_number }}</p>
                    <p class="text-gray-700"><strong>Capacity:</strong> {{ $table->table_capacity }}</p>
                    <p class="text-gray-700"><strong>Width:</strong> {{ $table->table_width }} cm</p>
                    <p class="text-gray-700"><strong>Height:</strong> {{ $table->table_height }} cm</p>
                    <p class="text-gray-700"><strong>Color:</strong> {{ $table->table_color }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $table->table_status }}</p>
                    <p class="text-gray-700"><strong>Position:</strong> {{ $table->table_position }}</p>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('tables.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                <a href="{{ route('tables.edit', $table->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this table?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
