<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-100">Edit Variant</h1>
            <a href="{{ route('variants.index') }}" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                Back to Variant List
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

        <form action="{{ route('variants.update', $variant->id) }}" method="POST" class="bg-gray-800 rounded-lg shadow-lg p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label for="variant_name" class="text-gray-100">Variant Name</label>
                    <input type="text" class="form-control w-full md:w-3/4 bg-gray-700 text-gray-100 border-gray-600 rounded" id="variant_name" name="variant_name" value="{{ old('variant_name', $variant->variant_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="variant_status" class="text-gray-100">Status</label>
                    <select class="form-control bg-gray-700 text-gray-100 border-gray-600 rounded" id="variant_status" name="variant_status" required>
                        <option value="Ready" {{ old('variant_status', $variant->variant_status) == 'Ready' ? 'selected' : '' }}>Ready</option>
                        <option value="Not Ready" {{ old('variant_status', $variant->variant_status) == 'Not Ready' ? 'selected' : '' }}>Not Ready</option>
                    </select>
                </div>

                <div x-data="{ additionalFields: @json($selectedAdditionals) }" class="form-group mb-4">
                    <label class="block text-gray-100 text-sm font-semibold mb-2">Select Additional</label>
                    <template x-for="(additionalId, index) in additionalFields" :key="index">
                        <div class="flex items-center mb-4">
                            <select class="form-select bg-gray-700 text-gray-100 border-gray-600 rounded w-full" :name="'additional_id['+index+']'" x-model="additionalFields[index]">
                                <option>Select an Additional</option>
                                @foreach ($additionals as $additional)
                                    <option value="{{ $additional->id }}" :selected="additionalId == {{ $additional->id }}">
                                        {{ $additional->additional_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="additionalFields.splice(index, 1)">Remove</button>
                        </div>
                    </template>
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="additionalFields.push(null)">Add Additional</button>
                </div> 
            </div>

            <button type="submit" class="mt-6 w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Update Variant
            </button>
        </form>
    </div>
</x-layouts.layout>
