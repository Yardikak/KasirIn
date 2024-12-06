<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Categories</h1>
            <div class="flex space-x-4">
                <a href="{{ route('categories.create') }}" class="bg-green-500 text-white font-semibold py-2 px-3 rounded hover:bg-green-600 transition duration-300 ease-in-out">+ Create New Category</a>
                @if(request('sort') === 'desc')
                <a href="{{ route('categories.index', ['sort' => 'asc']) }}" class="bg-blue-600 text-gray-800 font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAKtJREFUSEvtlcENgzAQBIcOKCElUAJURlIZKSElUEI6gPiHbIHWcHBE8kl+YJmd09iYCqeqnLgU8GXmi2p31a1xB+84b22PJ2Nwwrkd2E21sek0TvmOa6DJ7OQDfLfeUcBB+5AJ7oDkJC8zbg12U51pWVuuqI6THkAYyxqBMOTaA34CfUR4/Z7DvFx/BXZTLes8eoGYgNTf4imw3JvrlCb2nGqTRgrYRKMSMgO5kxQfRwhZ0wAAAABJRU5ErkJggg=="/>Descending 
                    </a>
                @else
                    <a href="{{ route('categories.index', ['sort' => 'desc']) }}" class="bg-blue-600 text-white font-semibold px-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out flex items-center">
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
    
        @if($categories->isEmpty())
            <p class="text-red-800 font-semibold">No Category Found.</p>
        @else
            <div class="overflow-x-auto mb-4 shadow-lg rounded">
                <table class="min-w-full bg-white shadow rounded">
                    <thead class="bg-gray-700 text-white text-base">
                        <tr>
                            <th class="px-4 py-2 text-center">ID</th>
                            <th class="px-4 py-2 text-center">Category Name</th>
                            <th class="px-4 py-2 text-center">Status</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-inner">
                        @foreach ($categories as $category)
                            <tr class="text-center text-gray-800 border-gray-700 font-semibold text-base hover:bg-blue-200">
                                <td class="px-4 py-3 text-center">{{ $category->id }}</td>
                                <td class="px-4 py-3 text-center">{{ $category->category_name }}</td>
                                <td class="px-4 py-3 text-center">{{ $category->category_status }}</td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn rounded-pill btn-primary py-1 px-3 font-semibold">View</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn rounded-pill btn-warning py-1 px-3 font-semibold">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
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
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</x-layouts.layout>
