<div>
    <!-- Table Order (Content) -->
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-y-auto max-h-80">
                <table class="min-w-full border table-auto">
                    <thead class="bg-gray-700 sticky top-0 z-10">
                        <tr class="text-center text-white">
                            <th class="p-2">No</th>
                            <th class="p-2">Nama Menu</th>
                            <th class="p-2">Kuantitas</th>
                            <th class="p-2">Harga</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cart ==null)
                            <tr>
                                <td colspan="5" class="p-2 text-center text-red-600">No Item in Cart.</td>
                            </tr>
                        @else
                        
                            @forelse ($cart as $index => $details)
                                <tr class="w-full text-center border-b border-gray-200">
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $details['name'] }}</td>
                                    <td class="p-2">
                                        <div class="flex justify-center items-center space-x-2">
                                            <button wire:click="updateQuantity({{ $index }}, 'decrease')" class="bg-red-500 text-white rounded-lg px-2 py-1">-</button>
                                            <input readonly type="text" wire:model.lazy="cart.{{ $index }}.quantity" class="text-center w-20 border rounded" pattern="\d*" inputmode="numeric" min="1">
                                            <button wire:click="updateQuantity({{ $index }}, 'increase')" class="bg-blue-500 text-white rounded-lg px-2 py-1">+</button>
                                        </div>
                                    </td>
                                    <td class="p-2">Rp{{ number_format($details['price'], 0, ',', '.') }}</td>
                                    <td class="p-2">
                                        <!-- Dropdown untuk memilih variant -->
                                        @if (!empty($details['variants']))
                                            <select wire:change="updateVariant({{ $index }}, $event.target.value)" class="text-center bg-gray-700 text-white rounded">
                                                <option value="">Pilih Variant</option>
                                                @foreach ($details['variants'] as $variant)
                                                    <option value="{{ $variant['id'] }}" {{ $variant['id'] == ($details['selected_variant'] ?? '') ? 'selected' : '' }}>
                                                        {{ $variant['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <p class="text-gray-500">Tidak ada variant tersedia</p>
                                        @endif
                                        <button wire:click="removeFromCart({{ $index }})" class="text-red-500 mt-2">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-2 text-center text-red-600">No Item in Cart.</td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
