<x-layouts.layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-600 mb-6">Edit Customer</h1>
        <a href="{{ route('customers.index') }}" class="block mt-7 mb-7 bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded">Back to List</a>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                     <!-- Customer Details -->
                     <div class="form-group mb-4">
                        <label for="customer_fullname" class="block text-gray-800 text-sm font-semibold mb-2">Customer Name</label>
                        <input type="text" id="customer_fullname" name="customer_fullname" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('customer_fullname') }}" placeholder="Customer Fullname.." required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="customer_gender" class="block text-gray-800 text-sm font-semibold mb-2">Gender</label>
                        <select id="customer_gender" name="customer_gender" class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" required>
                            <option value="Male" {{ old('customer_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('customer_gender') == 'Female Ready' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="customer_email" class="block text-gray-800 text-sm font-semibold mb-2">Email</label>
                        <input type="text" id="customer_email" name="customer_email" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('customer_email') }}" placeholder="example@Gmail.com" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="customer_phone" class="block text-gray-800 text-sm font-semibold mb-2">Phone Number</label>
                        <input type="text" id="customer_phone" name="customer_phone" class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full" value="{{ old('customer_phone') }}" placeholder="08...." required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="customer_birth" class="block text-gray-800 text-sm font-semibold mb-2">Birth Date</label>
                        
                            <input 
                                class="form-input bg-white border-gray-200 shadow text-gray-800 rounded w-full"
                                type="date" 
                                id="customer_birth" 
                                name="customer_birth" 
                                value="{{ old('customer_birth') }}" 
                                placeholder="mm-dd-yy" 
                                 
                            />
                       
                    </div>


                    <div class="form-group mb-4">
                        <label for="customer_status" class="block text-gray-800 text-sm font-semibold mb-2">Status</label>
                        <select id="customer_status" name="customer_status" class="form-select bg-white border-gray-200 shadow text-gray-800 rounded w-full" required>
                            <option value="Active" {{ old('customer_status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('customer_status') == 'Inactive Ready' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Customer</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
