<div class="relative flex items-center" x-data="{ open: false }">
    <button @click="open = !open" class="relative p-2 text-gray-500 transition duration-150 ease-in-out rounded-full hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
        <!-- Icon Lonceng (Heroicon: Bell) -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
        </svg>
        
        @php
            $unreadCount = auth()->user() ? auth()->user()->unreadNotifications()->count() : 0;
        @endphp

        @if($unreadCount > 0)
            <span class="absolute top-1 right-1 flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-600 rounded-full">
                {{ $unreadCount }}
            </span>
        @endif
    </button>

    <!-- Dropdown Notifikasi -->
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-50 border border-gray-200" style="display: none;">
        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
            <span class="text-sm font-semibold text-gray-700">Notifikasi Approval</span>
            <form action="{{ route('notifications.readAll') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs text-primary-600 hover:underline">Tandai Dibaca</button>
            </form>
        </div>

        <div class="divide-y divide-gray-100 max-h-80 overflow-y-auto">
            @forelse(auth()->user()->notifications()->latest()->take(10)->get() as $notification)
                <a href="{{ $notification->data['url'] ?? '#' }}" class="block px-4 py-3 hover:bg-gray-50 transition {{ is_null($notification->read_at) ? 'bg-blue-50/50' : '' }}">
                    <p class="text-sm font-medium text-gray-800">{{ $notification->data['title'] ?? 'Notifikasi' }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $notification->data['message'] ?? '' }}</p>
                    <span class="text-[10px] text-gray-400 mt-1 block">{{ $notification->created_at->diffForHumans() }}</span>
                </a>
            @empty
                <div class="px-4 py-6 text-center text-sm text-gray-500">
                    Tidak ada notifikasi
                </div>
            @endforelse
        </div>
    </div>
</div>
