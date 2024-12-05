@vite(['resources/css/core.css', 'resources/css/theme-default.css','resources/fonts/boxicons.css','resources/css/core2.css','resources/js/app.js'])
<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Customer List</h1>
            <div class="flex space-x-4">
                <a href="{{ route('customers.create') }}" class="bg-green-500 text-white font-semibold py-2 px-3 rounded hover:bg-green-600 transition duration-300 ease-in-out">+ Create New Customer</a>
                @if(request('sort') === 'desc')
                <a href="{{ route('customers.index', ['sort' => 'asc']) }}" class="bg-blue-600 text-gray-800 font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAKtJREFUSEvtlcENgzAQBIcOKCElUAJURlIZKSElUEI6gPiHbIHWcHBE8kl+YJmd09iYCqeqnLgU8GXmi2p31a1xB+84b22PJ2Nwwrkd2E21sek0TvmOa6DJ7OQDfLfeUcBB+5AJ7oDkJC8zbg12U51pWVuuqI6THkAYyxqBMOTaA34CfUR4/Z7DvFx/BXZTLes8eoGYgNTf4imw3JvrlCb2nGqTRgrYRKMSMgO5kxQfRwhZ0wAAAABJRU5ErkJggg=="/>Descending 
                    </a>
                @else
                    <a href="{{ route('customers.index', ['sort' => 'desc']) }}" class="bg-blue-600 text-white font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAKtJREFUSEvtlcENgzAQBIcOKCElUAJURlIZKSElUEI6gPiHbIHWcHBE8kl+YJmd09iYCqeqnLgU8GXmi2p31a1xB+84b22PJ2Nwwrkd2E21sek0TvmOa6DJ7OQDfLfeUcBB+5AJ7oDkJC8zbg12U51pWVuuqI6THkAYyxqBMOTaA34CfUR4/Z7DvFx/BXZTLes8eoGYgNTf4imw3JvrlCb2nGqTRgrYRKMSMgO5kxQfRwhZ0wAAAABJRU5ErkJggg=="/>Ascending
                    </a>
                @endif
            </div>
        </div>
    
        @if (session('success'))
            <div class="bg-green-500 text-gray-800 font-semibold p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    
        @if($customers->isEmpty())
            <p class="text-red-800 font-semibold">No customer found.</p>
        @else
            
            
        <div class="overflow-x-auto mb-4 shadow-lg rounded">
                <table class="min-w-full bg-white shadow rounded">
                    <thead class="bg-gray-700 text-white text-base">
                        <tr>
                            <th class="px-4 py-2 text-center">Name</th>
                            <th class="px-4 py-2 text-center">Gender</th>
                            <th class="px-4 py-2 text-center">Email</th>
                            <th class="px-4 py-2 text-center">Phone</th>
                            <th class="px-4 py-2 text-center">Birth</th>
                            <th class="px-4 py-2 text-center">Status</th>
                  
                            <th class="px-4 py-2 text-center">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($customers as $customer)
                            <tr class="text-center text-gray-800 font-semibold text-base hover:bg-blue-200">
                                
                                <td class="px-4 py-3 text-center">{{ $customer->customer_fullname }}</td>
                                <td class="px-4 py-3 text-center">{{ $customer->customer_gender }}</td>
                                <td class="px-4 py-3 text-center">{{ $customer->customer_email }}</td>
                                <td class="px-4 py-3 text-center">{{ $customer->customer_phone }}</td>
                                <td class="px-4 py-3 text-center">{{ $customer->customer_birth }}</td>
                                <td class="px-4 py-3 text-center">{{ $customer->customer_status }}</td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn rounded-pill btn-primary py-1 px-3 font-semibold">View</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn rounded-pill btn-warning py-1 px-3 font-semibold">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn rounded-pill py-1 px-3 btn-danger font-semibold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        @endif
    </div>
</x-layouts.layout>
