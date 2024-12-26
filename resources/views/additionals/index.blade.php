<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Additional List</h1>
            <div class="flex space-x-4">
                <a href="{{ route('additionals.create') }}" class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 transition duration-300 ease-in-out">+ Create New Additional</a>
                <a href="{{ route('variants.index') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Variant List</a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-gray-800 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if($additionals->isEmpty())
            <p class="text-gray-600">No additional found.</p>
        @else
            <div class="overflow-x-auto mb-4 shadow-lg rounded">
                <table class="min-w-full bg-white text-gray-800 shadow rounded-lg">
                    <thead class="bg-gray-700 text-white">
                        <tr class="text-center text-white">
                            <th class="px-4 py-2 text-center">ID</th>
                            <th class="px-4 py-2 text-center">Additional Name</th>
                            <th class="px-4 py-2 text-center">Status</th>
                            <th class="px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 text-base font-semibold">
                        @foreach($additionals as $additional)
                        <tr class="text-center text-gray-800 border-gray-700 font-semibold text-base hover:bg-blue-200">
                            <td class="px-5 py-3 whitespace-nowrap text-center">{{ $additional->id }}</td>
                                <td class="px-5 py-3 whitespace-nowrap text-center">{{ $additional->additional_name }}</td>
                                <td class="px-5 py-3 whitespace-nowrap text-center">{{ $additional->additional_status }}</td>
                                <td class="px-5 py-3 whitespace-nowrap text-center">
                                    <a href="{{ route('additionals.show', $additional->id) }}" class="bg-blue-500 text-white shadow font-semibold py-1 px-3 rounded-pill hover:bg-blue-600 btn">View</a>
                                    <a href="{{ route('additionals.edit', $additional->id) }}" class="bg-yellow-500 text-white shadow font-semibold py-1 px-3 rounded-pill hover:bg-yellow-600 btn">Edit</a>
                                    <form action="{{ route('additionals.destroy', $additional->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white shadow font-semibold py-1 px-3 rounded-pill hover:bg-red-600">Delete</button>
                                    </form>
                                    <a href="{{ route('variants.create', ['additional_id' => $additional->id]) }}" class="bg-green-500 text-white shadow font-semibold py-1 px-3 rounded-pill hover:bg-green-600 btn">+ Add Variant</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $additionals->links() }}
            </div>
        @endif
    </div>
</x-layouts.layout>
