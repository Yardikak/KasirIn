<div>
    <div x-data="{ 
            tax: @entangle('tax'), 
            discount: @entangle('discount'), 
            finalPrice: @entangle('finalPrice'), 
            cart: @entangle('cart'), 
            calculateFinalPrice() {
                let totalPrice = 0;
                this.cart.forEach(item => {
                    totalPrice += item.price * item.quantity;
                });
                let discountAmount = (this.discount / 100) * totalPrice;
                let taxAmount = (this.tax / 100) * totalPrice;
                this.finalPrice = totalPrice - discountAmount + taxAmount;
            }
        }" 
        x-init="calculateFinalPrice()" 
        x-effect="calculateFinalPrice()">
        @if (count($cart) > 0)
        <!-- Order Summary Card -->
        <div class="bg-gradient-to-r from-green-400 to-blue-500 shadow-lg rounded-xl p-6 mt-6 text-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold">Order Summary</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V6z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tax Input -->
                <div class="flex flex-col">
                    <label class="block font-semibold">Tax (%)</label>
                    <input type="number" name="tax" x-model="tax" class="form-input mt-2 p-2 border-none rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-green-400" min="0" step="0.01" oninput="this.value = Math.abs(this.value)">
                </div>
                <!-- Discount Input -->
                <div class="flex flex-col">
                    <label class="block font-semibold">Discount (%)</label>
                    <input type="number" name="discount" x-model="discount" class="form-input mt-2 p-2 border-none rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-400" min="0" step="0.01" oninput="this.value = Math.abs(this.value)">
                </div>
                <!-- Order Status -->
                <div class="flex flex-col">
                    <label class="block font-semibold">Order Status</label>
                    <select name="status" class="form-select mt-2 block w-full p-2 bg-gray-50 text-gray-800 rounded-lg focus:ring-2 focus:ring-purple-400">
                        <option hidden>Select Status</option>
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                    </select>
                </div>
            </div>
            <!-- Total Price -->
            <div class="mt-6">
                <label class="block font-semibold text-lg">Total Price</label>
                <div class="mt-2 p-4 bg-gray-100 rounded-lg flex items-center justify-between">
                    <span class="text-xl font-bold text-gray-800">Rp.</span>
                    <span class="text-3xl font-extrabold text-gray-800" x-text="parseFloat(finalPrice).toFixed(2)"></span>
                </div>
            </div>
            <!-- Confirm Order Button -->
            <div class="mt-6 flex justify-end">
                <button 
                    type="button" 
                    wire:click="confirmOrder" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    Confirm Order
                </button>
            </div>
        </div>
        @else
        <div class="bg-red-500 text-white p-6 rounded-xl mt-6 shadow-lg">
            <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-4" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm1-16a1 1 0 10-2 0v4a1 1 0 002 0V6zm-1 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
                </svg>
                <p class="text-lg font-semibold">Your cart is empty. Please add items to your cart before proceeding.</p>
            </div>
        </div>
        @endif
    </div>
</div>
