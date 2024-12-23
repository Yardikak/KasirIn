<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $additional->additional_name }} Detail :</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- additional Details -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">additional ID: {{ $additional->id }}</h2>
                    <p class="text-gray-700"><strong>additional Name:</strong> {{ $additional->additional_name }}</p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $additional->additional_description }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $additional->additional_status }}</p>
                    
                    <!-- @if($additional->additional_image)
                        <div class="mt-4">
                            <strong>additional Image:</strong>
                            <img src="{{ asset('storage/' . $additional->additional_image) }}" alt="{{ $additional->additional_name }}" class="w-full h-auto mt-2 rounded">
                        </div>
                    @endif -->
                </div>

                
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('additionals.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                <a href="{{ route('additionals.edit', $additional->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('additionals.destroy', $additional->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
