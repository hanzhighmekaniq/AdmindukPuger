@if (session('success'))
    <div id="toast-success"
        class="fixed top-5 left-1/2 -translate-x-1/2 z-50 flex items-center max-w-xs p-4 text-gray-700 bg-white border border-green-500 rounded-lg shadow">
        <div class="flex items-center justify-center w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            ✅
        </div>
        <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
        <button type="button" onclick="this.parentElement.remove()" class="ml-auto text-gray-500 hover:text-gray-700">
            ✖
        </button>
    </div>
@endif

@if (session('error'))
    <div id="toast-error"
        class="fixed top-5 left-1/2 -translate-x-1/2 z-50 flex items-center max-w-xs p-4 text-gray-700 bg-white border border-red-500 rounded-lg shadow">
        <div class="flex items-center justify-center w-8 h-8 text-red-500 bg-red-100 rounded-lg">
            ❌
        </div>
        <div class="ml-3 text-sm font-medium">{{ session('error') }}</div>
        <button type="button" onclick="this.parentElement.remove()" class="ml-auto text-gray-500 hover:text-gray-700">
            ✖
        </button>
    </div>
@endif

<script>
    // Auto-hide toast setelah 5 detik
    setTimeout(() => {
        document.getElementById('toast-success')?.remove();
        document.getElementById('toast-error')?.remove();
    }, 5000);
</script>
