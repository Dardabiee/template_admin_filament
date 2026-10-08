<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow border border-gray-200 dark:border-gray-800 text-sm">
        
        <!-- HEADER / KOP -->
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-kps.png') }}" alt="Logo" class="h-15 object-contain">
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-500 font-semibold uppercase">Kode Deklarasi</span>
                <p class="font-bold text-base text-gray-900 dark:text-white">{{ $record->kode_deklarasi ?? '-' }}</p>
            </div>
        </div>

        <!-- JUDUL FORM -->
        <div class="text-center mb-8">
            <h1 class="text-xl font-bold uppercase tracking-wider text-gray-900 dark:text-white">FORM DEKLARASI</h1>
        </div>

        <!-- INFORMASI UTAMA DENGAN GARIS BAWAH -->
        <div class="space-y-4 mb-8">
            <div class="flex items-center border-b border-gray-300 dark:border-gray-700 pb-2">
                <span class="font-semibold w-36">Tanggal</span>
                <span class="mr-4">:</span>
                <span>{{ \Carbon\Carbon::parse($record->tgl_deklarasi)->translatedFormat('d F Y') }}</span>
            </div>
            <div class="flex items-center border-b border-gray-300 dark:border-gray-700 pb-2">
                <span class="font-semibold w-36">Nama</span>
                <span class="mr-4">:</span>
                <span>{{ $record->user->fullname ?? '-' }}</span>
            </div>
            
            <p class="italic text-gray-600 dark:text-gray-400 pt-2">Telah/akan melakukan pembayaran kepada :</p>

            <div class="flex items-center border-b border-gray-300 dark:border-gray-700 pb-2">
                <span class="font-semibold w-36">Nama</span>
                <span class="mr-4">:</span>
                <span>{{ $record->nama_dibayar ?? '-' }}</span>
            </div>
            <div class="flex items-center border-b border-gray-300 dark:border-gray-700 pb-2">
                <span class="font-semibold w-36">Tujuan</span>
                <span class="mr-4">:</span>
                <span>{{ $record->tujuan ?? '-' }}</span>
            </div>
            <div class="flex items-center border-b border-gray-300 dark:border-gray-700 pb-2">
                <span class="font-semibold w-36">Sebesar</span>
                <span class="mr-4">:</span>
                <span class="font-bold">Rp. {{ number_format($record->sebesar ?? 0, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- TABEL APPROVAL / TANDA TANGAN -->
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 text-center text-xs mt-6">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold">Yang melakukan</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold">Mengetahui</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold">Menyetujui</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-blue-600">CREATED</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-yellow-600">{{ strtoupper($record->app_status ?? 'WAITING') }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-yellow-600">{{ strtoupper($record->app2_status ?? 'WAITING') }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-gray-500">{{ $record->created_at ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-gray-500">{{ $record->app_date ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-gray-500">{{ $record->app2_date ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold text-sm">{{ $record->user->fullname ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold text-sm">{{ $record->app_name ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold text-sm">{{ $record->app2_name ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

    </div>
</x-filament-panels::page>