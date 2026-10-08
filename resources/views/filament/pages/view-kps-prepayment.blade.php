<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow border border-gray-200 dark:border-gray-800 text-sm">
        
        <!-- HEADER / KOP -->
        <div class="flex justify-between items-center pb-4 mb-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('/assets/img/sub-bisnis/kps/logo.png') }}" alt="Logo" class="h-15 object-contain">
                
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-500 font-semibold uppercase">Kode Prepayment</span>
                <p class="font-bold text-base text-gray-900 dark:text-white">{{ $record->kode_prepayment ?? '-' }}</p>
            </div>
        </div>

        <!-- JUDUL FORM -->
        <div class="text-center mb-6">
            <h1 class="text-lg font-bold uppercase tracking-wider text-gray-900 dark:text-white">FORM PENGAJUAN PREPAYMENT</h1>
        </div>

        <!-- INFORMASI UTAMA -->
        <div class="space-y-2 mb-6">
            <p><span class="font-semibold inline-block w-28">Tanggal</span> : {{ \Carbon\Carbon::parse($record->tgl_prepayment)->translatedFormat('d F Y') }}</p>
            <p><span class="font-semibold inline-block w-28">Nama</span> : {{ $record->user->fullname ?? '-' }}</p>
            <p class="italic text-gray-600 dark:text-gray-400">Dengan ini bermaksud mengajukan prepayment untuk :</p>
            <p><span class="font-semibold inline-block w-28">Tujuan</span> : {{ $record->tujuan }}</p>
        </div>

        <!-- TABEL RINCIAN ITEM -->
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 mb-6 text-left">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold text-center w-5/12">Rincian</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold text-center w-3/12">Nominal</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold text-center w-4/12">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($record->details as $detail)
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $detail->rincian ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 flex justify-between">
                        <span>Rp.</span>
                        <span>{{ number_format($detail->nominal ?? 0, 0, ',', '.') }}</span>
                    </td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $detail->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-center" colspan="3">Tidak ada rincian detail.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-gray-50 dark:bg-gray-800/50">
                    <td class="border border-gray-300 dark:border-gray-700 p-2 font-bold" colspan="2">Total :</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-right font-bold" colspan="1">
                        Rp. {{ number_format($record->total_nominal ?? 0, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- TABEL APPROVAL / TANDA TANGAN -->
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 text-center text-xs">
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
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-green-600">{{ strtoupper($record->app_status ?? 'WAITING') }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-green-600">{{ strtoupper($record->app2_status ?? 'WAITING') }}</td>
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