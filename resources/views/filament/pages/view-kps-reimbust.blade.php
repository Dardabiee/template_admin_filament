<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow border border-gray-200 dark:border-gray-800 text-sm">
        
        <!-- HEADER / KOP -->
        <div class="flex justify-between items-center pb-4 mb-6">
            <div class="flex items-center gap-3">
                <!-- Ganti dengan asset logo Anda -->
                <img src="{{ asset('/assets/img/sub-bisnis/kps/logo.png') }}" alt="Logo" class="h-15 object-contain">
                {{-- <div>
                    <h2 class="font-bold text-gray-700 dark:text-gray-200">KOLABORASI PARA SAHABAT</h2>
                </div> --}}
            </div>
            <div class="text-center">
                <h1 class="text-lg font-bold uppercase tracking-wider text-gray-900 dark:text-white">FORM PELAPORAN / REIMBURSE</h1>
                <h2 class="text-md font-semibold text-gray-600 dark:text-gray-400">KPS</h2>
            </div>
            <div></div> <!-- Spacer -->
        </div>

        <!-- INFORMASI UTAMA -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="space-y-1">
                <p><span class="font-semibold inline-block w-36">NAMA</span> : {{ $record->user->fullname ?? '-' }}</p>
                <p><span class="font-semibold inline-block w-36">SIFAT PELAPORAN</span> : {{ $record->sifat_pelaporan }}</p>
                <p><span class="font-semibold inline-block w-36">TANGGAL</span> : {{ \Carbon\Carbon::parse($record->tgl_pengajuan)->translatedFormat('d F Y') }}</p>
                <p><span class="font-semibold inline-block w-36">TUJUAN</span> : {{ $record->tujuan }}</p>
            </div>
            <div class="text-right">
                <p class="font-semibold">No. Prepayment : {{ $record->kode_prepayment ?? '-' }}</p>
            </div>
        </div>

        <!-- TABEL DETAIL PEMAKAIAN -->
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 mb-6 text-left">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <th class="border border-gray-300 dark:border-gray-700 p-2 font-semibold" colspan="2">JUMLAH PREPAYMENT</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 text-center font-semibold" colspan="3">Rp. {{ number_format($record->jumlah_prepayment, 0, ',', '.') }}</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 text-right font-semibold ">BUKTI PENGELUARAN</th>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800/50">
                    <th class="border border-gray-300 dark:border-gray-700 p-2 ">PEMAKAIAN</th>
                    <th class="text-center border border-gray-300 dark:border-gray-700 p-2" colspan="2">TGL NOTA</th>
                    <th class="text-center border border-gray-300 dark:border-gray-700 p-2">JUMLAH</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2 text-center">KWITANSI</th>
                    <th class="text-right border border-gray-300 dark:border-gray-700 p-2 text-center">DEKLARASI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record->detail ?? [] as $index => $detail)
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2" colspan="1">{{ $index + 1 }}. {{ $detail->pemakaian ?? '-' }}</td>
                    <td class="text-center border border-gray-300 dark:border-gray-700 p-2" colspan="2">{{ $detail->tgl_nota }}</td>
                    <td class="text-center border border-gray-300 dark:border-gray-700 p-2">{{ number_format($detail->jumlah, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-center">
                        @if($detail->kwitansi)
                            <a href="{{ asset('http://192.168.90.5/sw//assets/backend/document/reimbust/kwitansi/kwitansi_kps/' . $detail->kwitansi) }}" target="_blank" class="px-3 py-1 bg-blue-600 text-white rounded text-xs">Lihat Foto</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="text-right border border-gray-300 dark:border-gray-700 p-2 text-center">-</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 font-semibold" colspan="5">TOTAL PEMAKAIAN</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-right font-semibold">Rp. {{ number_format($record->total_pemakaian ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 font-semibold" colspan="5">SISA PREPAYMENT</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-right font-semibold">Rp. {{ number_format($record->sisa_prepayment ?? 0, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- TABEL APPROVAL / TANDA TANGAN DI BAWAH -->
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 text-center">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <th class="border border-gray-300 dark:border-gray-700 p-2">Yang melakukan</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2">Mengetahui</th>
                    <th class="border border-gray-300 dark:border-gray-700 p-2">Menyetujui</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-blue-600">CREATED</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-green-600">APPROVED</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-4 font-bold uppercase text-yellow-600">WAITING</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-xs text-gray-500">{{ $record->created_at }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-xs text-gray-500">{{ $record->app_date ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-2 text-xs text-gray-500">{{ $record->app2_date ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold">{{ $record->user->fullname ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold">{{ $record->app_name ?? '-' }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 p-6 font-semibold">{{ $record->app2_name ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

    </div>
</x-filament-panels::page>