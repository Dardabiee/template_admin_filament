<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Gunakan flex atau grid dengan jumlah kolom yang pas dengan jumlah itemmu (4 item) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-900 rounded-xl shadow border border-gray-200 dark:border-gray-800 hover:shadow-lg transition">
                <img src="{{ asset('images/logo-holding Background Removed.png') }}" alt="Logo Holding" class="h-6 object-contain mb-3">
            </div>
            <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-900 rounded-xl shadow border border-gray-200 dark:border-gray-800 hover:shadow-lg transition">
                <img src="{{ asset('images/logo-holding Background Removed.png') }}" alt="Logo Holding" class="h-6 object-contain mb-3">
            </div>
            <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-900 rounded-xl shadow border border-gray-200 dark:border-gray-800 hover:shadow-lg transition">
                <img src="{{ asset('images/logo-holding Background Removed.png') }}" alt="Logo Holding" class="h-6 object-contain mb-3">
            </div>
            <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-900 rounded-xl shadow border border-gray-200 dark:border-gray-800 hover:shadow-lg transition">
                <img src="{{ asset('images/logo-holding Background Removed.png') }}" alt="Logo Holding" class="h-6 object-contain mb-3">
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>