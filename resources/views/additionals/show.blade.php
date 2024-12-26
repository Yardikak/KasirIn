<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Additional Details</h1>
        
        @if(session('success'))
            <div class="bg-green-500 text-gray-800 p-4 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-wjite p-6 rounded-lg shadow">
            <!-- Additional Information -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Additional Information</h2>
                <p class="text-gray-800"><strong>ID:</strong> {{ $additional->id }}</p>
                <p class="text-gray-800"><strong>Additional Name:</strong> {{ $additional->additional_name }}</p>
                <p class="text-gray-800"><strong>Description:</strong> {{ $additional->additional_description }}</p>
                <p class="text-gray-800"><strong>Status:</strong> {{ $additional->additional_status }}</p>
            </div>

            <!-- Associated Menu -->
            <div class="mb-6 p-3 shadow rounded-lg bg-gray-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Associated Menu</h2>
                @if($additional->menus->isEmpty())
                    <p class="text-gray-800">No associated menu found.</p>
                @else
                    <div class="bg-gray-200 p-4 rounded-lg">
                        @foreach ($additional->menus as $menu)
                            <div class="mb-4">
                                <p class="text-gray-800"><strong>Menu Name:</strong> {{ $menu->product_name }}</p>
                                <p class="text-gray-800"><strong>Status:</strong> {{ $menu->product_status }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Associated Variants -->
            <div class="mb-6 p-3 shadow rounded-lg bg-gray-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Associated Variants</h2>
                @if($additional->variants->isEmpty())
                    <p class="text-gray-800">No associated variant found.</p>
                @else
                    <div class="bg-white p-4 rounded-lg">
                        @foreach ($additional->variants as $variant)
                            <div class="mb-4">
                                <p class="text-gray-800"><strong>Variant Name:</strong> {{ $variant->variant_name }}</p>
                                <p class="text-gray-800"><strong>Status:</strong> {{ $variant->variant_status }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="flex space-x-4">
                <a href="{{ route('additionals.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Back to List</a>
                <a href="{{ route('additionals.edit', $additional->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Edit</a>
            </div>
        </div>
    </div>
</x-layouts.layout>
