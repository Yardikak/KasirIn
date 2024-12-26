<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Variant List</h1>
            <div class="flex space-x-4">
                <a href="{{ route('variants.create') }}" class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 transition duration-300 ease-in-out">+ Create New Variant</a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if($variants->isEmpty())
            <p class="text-gray-800 font-semibold">No variants found.</p>
        @else
        <div class="overflow-x-auto mb-4 shadow-lg rounded">
            <table class="min-w-full bg-white text-gray-800 shadow rounded-lg">
                <thead class="bg-gray-700 text-white">
                    <tr class="text-center text-white">
                            <th class="px-4 py-2 font-semibold tracking-wider">Name</th>
                            <th class="px-4 py-2 font-semibold tracking-wider">Status</th>
                            <th class="px-4 py-2 font-semibold tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-inner">
                        @foreach($variants as $variant)
                            <tr class="text-center text-gray-800 border-y font-semibold text-base hover:bg-blue-200">
                                <td class="px-5 py-3">{{ $variant->variant_name }}</td>
                                <td class="px-5 py-3">{{ $variant->variant_status }}</td>
                                <td class="px-5 py-3 font-medium">
                                    <a href="{{ route('variants.show', $variant->id) }}" class="btn rounded-pill btn-primary py-1 px-3 font-semibold">View</a>
                                    <a href="{{ route('variants.edit', $variant->id) }}" class="btn rounded-pill btn-warning py-1 px-3 font-semibold">Edit</a>
                                    <form action="{{ route('variants.destroy', $variant->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn rounded-pill py-1 px-3 btn-danger font-semibold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $variants->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layouts.layout>
