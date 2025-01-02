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
        <!-- Pesan Konfirmasi -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show fixed-top right-10 mr-5 mt-5" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V6z" clip-rule="evenodd" />
                </svg>
                <div class="flex-1 ml-3">
                    <h5 class="alert-heading text-lg font-semibold">{{ session('success') }}</h5>
                    <p class="mb-0">Pesanan Anda berhasil dibuat dan akan segera diproses. Terima kasih!</p>
                </div>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <!-- Daftar Menu (Sebelah Kanan) -->
        @livewire('components.menu-off-canvas')
    </div>

    <!-- Table Order (Content) -->
    @php $cart = session()->get('cart', []); @endphp
    @livewire('components.cart-order', 'cartUpdate')

    <!-- Order Summary (Content) -->
    @livewire('components.order-summary', 'finalPrice')

    </div>
</x-layouts.layout>
