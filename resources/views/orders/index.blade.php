<x-layouts.layout>
    <div class="flex"></div>
    <div class="container mx-auto px-4 content">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-600">Create Order</h1>
            <button class="btn bg-orange-500 hover:bg-orange-600 text-white font-semibold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Order Menu</button>
        </div>
        <!-- Orderan (Bagian Atas) -->
        <div class="bg-white w-full shadow-md rounded-lg p-4 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nomor Order -->
                <div class="mb-4">
                    <label class="block font-semibold text-gray-800">Number Order :</label>
                    <input type="text" value="{{ $orderCode }}" readonly class="form-input mt-1 border rounded block bg-gray-200 text-gray-800">
                </div>
                <!-- Table Name -->
                <div class="mb-4 flex flex-col items-center">
                    <label class="block font-semibold text-gray-800 mb-1">Table Name :</label>
                    <input type="text" readonly class="form-input border rounded bg-gray-200 text-gray-800 w-48">
                </div>
            </div>

            <!-- Pencarian dan Penambahan Customer -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Pencarian Customer (Sebelah Kiri) -->
            <div>
                <form action="{{ route('orders.searchCustomer') }}" method="GET">
                    <label class="block font-semibold text-gray-800 mb-1">Cari Customer</label>
                    <div class="flex form-group mb-4">
                        <input type="text" name="customer_search" value="{{ request('customer_search') }}" placeholder="Cari Customer..." class="border rounded p-2 w-full bg-white text-gray-800 focus:outline-none focus:bg-gray-100">
                        <button type="submit" class="rounded bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 ml-2">
                            Cari
                        </button>
                    </div>
                </form>

                {{-- Menampilkan pesan error jika customer tidak ditemukan --}}
                @if (session('error'))
                    <small class="text-red-600 mt-2">{{ session('error') }}</small>
                @endif

                {{-- Menampilkan informasi customer jika ditemukan --}}
                @if (session('customer'))
                    <div class="mt-4">
                        <h3 class="text-gray-800 font-semibold">Customer Ditemukan:</h3>
                        <p><strong>Nama:</strong> {{ session('customer')->name }}</p>
                        {{-- Tampilkan informasi customer lainnya di sini jika diperlukan --}}
                    </div>
                @endif
            </div>

            <!-- Penambahan Customer (Sebelah Kanan) -->
            <div>
                <form action="{{ route('orders.createCustomer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="customer_full_name" class="block text-gray-800 font-semibold mb-1">Add Customer</label>
                    <div class="flex form-group mb-4">
                        <input type="text" id="customer_full_name" name="customer_full_name" class="border rounded p-2 w-full bg-white text-gray-800 focus:outline-none focus:bg-gray-100" value="{{ old('customer_full_name') }}" placeholder="Customer Name..." required>
                        <button type="submit" class="rounded bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 ml-2">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Menu (Sebelah Kanan) -->
        @livewire('components.menu-off-canvas')
    </div>

    <!-- Table Order (Content) -->
    @php $cart = session()->get('cart', []); @endphp
    @livewire('components.cart-order', 'cartUpdate')

    <!-- Order Summary (Content) -->
    @livewire('components.order-summary', 'finalPrice')

    <!-- Confirm Button -->
    @if (count($cart) > 0)
    <div class="flex justify-end mt-4">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <input type="hidden" name="order_code" value="{{ $orderCode }}">
            <input type="hidden" name="cart" value="{{ json_encode(session()->get('cart', [])) }}">
            <input type="hidden" name="customer_id" value="{{ session('customer')->id ?? '' }}">
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4">
                Confirm Order
            </button>
        </form>
    </div>
    @endif
    </div>
</x-layouts.layout>
