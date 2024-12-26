<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-6">
            <h1 class="text-3xl font-bold text-gray-600">Create Variant</h1>
        </div>

        <form action="{{ route('variants.store') }}" method="POST" x-data="{ selectedAdditional: {{ request('additional_id', 'null') }} }">
            @csrf

            <!-- Form -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="variant_name" class="block text-gray-800 font-semibold mb-2">Variant Name</label>
                    <input type="text" name="variant_name" id="variant_name" class="form-input mt-1 block w-full bg-white text-gray-800 border rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Variant Name.." required>
                </div>

                <div class="mb-4">
                    <label for="variant_status" class="block text-gray-800 font-semibold mb-2">Status</label>
                    <select name="variant_status" id="variant_status" class="form-select mt-1 block w-full bg-white text-gray-800 border rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                        <option value="Ready">Ready</option>
                        <option value="Not Ready">Not Ready</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="additional_id" class="block text-gray-800 font-semibold mb-2">Additional</label>
                    <select name="additional_id" id="additional_id" class="form-select mt-1 block w-full bg-white text-gray-800 border rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                        @foreach ($additionals as $additional)
                            <option value="{{ $additional->id }}" {{ isset($selectedAdditionalId) && $selectedAdditionalId == $additional->id ? 'selected' : '' }}>{{ $additional->additional_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.layout>
