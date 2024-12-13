<div>
    <div class="fixed right-5 top-20 z-50 transform transition-transform duration-500 ease-in-out translate-x-full opacity-0" id="notification" style="display: none;">
        <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-4 max-w-xs">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ __("Selamat Datang, ") }} {{ auth()->user()->name }}!
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ __("Anda berhasil login.") }}
                    </p>
                </div>
                <button class="ml-4 text-gray-400 hover:text-gray-600 focus:outline-none" onclick="hideNotification()">
                    &times;
                </button>
            </div>
        </div>
    </div>
    
    <script>
        window.onload = function () {
            const notification = document.getElementById('notification');
            notification.style.display = 'block';
            setTimeout(() => {
                notification.classList.remove('translate-x-full', 'opacity-0');
            }, 100);
        };
    
        function hideNotification() {
            const notification = document.getElementById('notification');
            notification.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => notification.remove(), 500);
        }
    
        setTimeout(() => hideNotification(), 5000);
    </script>
</div>
