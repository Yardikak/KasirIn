<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Edit Additional</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-gray-800 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('additionals.update', $additional->id) }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="additional_name" class="block text-gray-800 text-sm font-semibold mb-2">Additional Name</label>
                <input type="text" id="additional_name" name="additional_name" class="form-input border bg-white text-gray-800 shadow rounded w-full" value="{{ old('additional_name', $additional->additional_name) }}" required>
            </div>

            <div class="form-group">
                <label for="additional_description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
                <input type="text" id="additional_description" name="additional_description" class="form-input border bg-white text-gray-800 shadow rounded w-full" value="{{ old('additional_description', $additional->additional_description) }}" required>
            </div>

            <div class="form-group">
                <label for="additional_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                <select id="additional_status" name="additional_status" class="form-select border bg-white text-gray-800 shadow rounded w-full" required>
                    <option value="">Select Status</option>
                    <option value="Ready" {{ old('additional_status', $additional->additional_status) == 'Ready' ? 'selected' : '' }}>Ready</option>
                    <option value="Not Ready" {{ old('additional_status', $additional->additional_status) == 'Not Ready' ? 'selected' : '' }}>Not Ready</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('additionals.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Back to List</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Update</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
