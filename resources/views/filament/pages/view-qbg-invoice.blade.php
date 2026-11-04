<x-filament-panels::page>
    <div class="max-w-7xl bg-white dark:bg-gray-900 shadow-xl rounded-2xl p-8 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100">
        
        {{-- Tombol Atas (Badge Payment & Tombol Back) --}}
        <div class="flex justify-between items-center mb-6">
            <span class="inline-flex items-center px-4 py-1.5 rounded-md text-sm font-semibold text-white bg-emerald-500 shadow-sm">
                {{ strtoupper($invoice->payment_status ?? 'Payment') }}
            </span>

            {{-- <x-filament::button 
                color="gray" 
                icon="heroicon-m-arrow-left" 
                tag="a" 
                href="{{ \App\Filament\Resources\QbgInvoiceResource::getUrl() }}">
                Back
            </x-filament::button> --}}
        </div>

        <hr class="border-gray-200 dark:border-gray-700 mb-8">

        {{-- Header Perusahaan & Kontak --}}
        <div class="flex justify-between items-start mb-8">
            <div>
                {{-- Logo Qubagift --}}
                <div class="flex items-center space-x-2">
                    <img src="/assets/img/sub-bisnis/qubagift/logo.png" alt="" class='h-15'>
                </div>
            </div>
            <div class="text-right text-sm text-gray-600 dark:text-gray-400 space-y-1">
                <p>qubagift@gmail.com</p>
                <p>081290399933</p>
            </div>
        </div>

        <hr class="border-t-2 border-gray-900 dark:border-gray-100 mb-8">

        {{-- Judul Invoice & No Invoice --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold tracking-widest uppercase">INVOICE</h1>
            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mt-1">
                No. Invoice : {{ $invoice->kode_invoice ?? 'Q2602038' }}
            </p>
        </div>

        {{-- Informasi Pelanggan & Tanggal --}}
        <div class="grid grid-cols-2 gap-8 mb-8 text-sm">
            <div>
                <p class="text-gray-500 dark:text-gray-400 font-medium mb-1">Kepada Yth.</p>
                <h2 class="text-xl font-bold mb-3">{{ $invoice->nama_customer ?? 'Rizky Saputra' }}</h2>
                <div class="space-y-1">
                    <p><span class="inline-block w-20 text-gray-500">Email</span> : {{ $invoice->email_customer ?? 'tes@gmail.com' }}</p>
                    <p><span class="inline-block w-20 text-gray-500">Telepon</span> : {{ $invoice->nomor_customer ?? '089567' }}</p>
                    <p><span class="inline-block w-20 text-gray-500">Alamat</span> : {{ $invoice->alamat_customer ?? 'tes' }}</p>
                </div>
            </div>

            <div class="space-y-2 text-right">
                <p><span class="font-medium">Tanggal Invoice</span> : {{ $invoice->tgl_invoice ? date('d/m/Y', strtotime($invoice->tgl_invoice)) : '19/02/2026' }}</p>
                <p><span class="font-medium">Tanggal Jatuh Tempo</span> : {{ $invoice->tgl_tempo ? date('d/m/Y', strtotime($invoice->tgl_tempo)) : '20/02/2026' }}</p>
            </div>
        </div>

        {{-- Label Detail Pemesanan --}}
        <div class="bg-emerald-500 text-white font-bold px-4 py-2 rounded-t-lg mb-0 text-sm">
            Detail Pemesanan :
        </div>

        {{-- Tabel Rincian Produk --}}
        <div class="overflow-x-auto mb-8">
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 text-sm">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800 text-center font-semibold">
                        <th class="border border-gray-300 dark:border-gray-700 p-2.5">PRODUK</th>
                        <th class="border border-gray-300 dark:border-gray-700 p-2.5 w-24">JUMLAH</th>
                        <th class="border border-gray-300 dark:border-gray-700 p-2.5 w-36">HARGA</th>
                        <th class="border border-gray-300 dark:border-gray-700 p-2.5 w-36">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoice->details ?? [] as $detail)
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5">{{ $detail->nama_produk ?? 'Kurma Ajwa 250 gram' }}</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-center">{{ $detail->jumlah ?? '5' }}</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Rp. {{ number_format($detail->harga ?? 10000, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Rp. {{ number_format($detail->total ?? 50000, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        {{-- Data Dummy Default Sesuai Gambar --}}
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5">Kurma Ajwa 250 gram</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-center">5</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Rp. 10.000</td>
                            <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Rp. 50.000</td>
                        </tr>
                    @endforelse

                    {{-- Baris Biaya Pengiriman, Diskon, dan Total --}}
                    <tr>
                        <td colspan="3" class="border border-gray-300 dark:border-gray-700 p-2 text-right font-medium">Biaya Pengiriman</td>
                        <td class="border border-gray-300 dark:border-gray-700 p-2 text-right">Rp. {{ number_format($invoice->ongkir ?? 20000, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border border-gray-300 dark:border-gray-700 p-2 text-right font-medium">Potongan Harga</td>
                        <td class="border border-gray-300 dark:border-gray-700 p-2 text-right text-red-600">Rp. -{{ number_format($invoice->potongan_harga ?? 10000, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="font-bold bg-gray-50 dark:bg-gray-800">
                        <td colspan="3" class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Total</td>
                        <td class="border border-gray-300 dark:border-gray-700 p-2.5 text-right">Rp. {{ number_format($invoice->grand_total ?? 60000, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Metode Pembayaran --}}
        <div class="mb-8 text-sm space-y-2">
            <h3 class="font-bold underline mb-2">Metode Pembayaran</h3>
            @forelse($invoice->accounts ?? [] as $acc)
                <div class="pl-2 space-y-1">
                    <p>1. Bank : {{ $acc->nama_bank ?? 'tes' }}</p>
                    <p class="pl-4">No. Rekening : {{ $acc->no_rek ?? '7257364545' }}</p>
                    <p class="pl-4">Atas Nama : {{ $acc->atas_nama ?? 'tes' }}</p>
                </div>
            @empty
                <div class="pl-2 space-y-1">
                    <p>1. Bank : tes</p>
                    <p class="pl-4">No. Rekening : 7257364545</p>
                    <p class="pl-4">Atas Nama : tes</p>
                </div>
            @endforelse
        </div>

        {{-- Catatan --}}
        <div class="mb-12 text-sm">
            <p class="font-medium">Catatan :</p>
            <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $invoice->keterangan ?? 'tes' }}</p>
        </div>

        {{-- Tanda Tangan / Penutup --}}
        <div class="text-right text-sm font-semibold text-gray-700 dark:text-gray-300">
            <p>Terima Kasih, QubaGift</p>
        </div>

    </div>
</x-filament-panels::page>