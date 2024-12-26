<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Variant Details</h1>
            <a href="{{ route('variants.index') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                Variant List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Variant Information</h2>
                <p class="text-gray-800"><strong>Name:</strong> {{ $variant->variant_name }}</p>
                <p class="text-gray-800"><strong>Status:</strong> {{ $variant->variant_status }}</p>
                <p class="text-gray-800"><strong>Created At:</strong> {{ $variant->created_at->format('d M Y, H:i') }}</p>
                <p class="text-gray-800"><strong>Updated At:</strong> {{ $variant->updated_at->format('d M Y, H:i') }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Associated Additional Items</h2>
                @if($variant->additionals->isEmpty())
                    <p class="text-gray-800">No additional items are associated with this variant.</p>
                @else
                    <ul class="list-disc pl-5 text-gray-800">
                        @foreach ($variant->additionals as $additional)
                            <li>{{ $additional->additional_name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-layouts.layout>
