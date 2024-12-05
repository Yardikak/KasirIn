<x-layouts.layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $customer->customer_fullname }} Detail :</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- cus Details -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">cus ID: {{ $customer->id }}</h2>
                    <p class="text-gray-700"><strong>Customer Name:</strong> {{ $customer->customer_fullname }}</p>
                    <p class="text-gray-700"><strong>Gender:</strong> {{ $customer->customer_gender }}</p>
                    <p class="text-gray-700"><strong>Email:</strong> {{$customer->customer_email }}</p>
                    <p class="text-gray-700"><strong>Phone Number:</strong> {{$customer->customer_phone }}</p>
                    <p class="text-gray-700"><strong>Birth Date:</strong> {{ $customer->customer_birth }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $customer->customer_status }}</p>
                    
                    
                </div>

               
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('customers.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
