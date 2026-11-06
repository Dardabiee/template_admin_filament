<x-filament-panels::page>
    <style>
        /* ===== Toolbar (di luar kertas, tidak ikut tercetak) ===== */
        .sw-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 56rem;
            margin: 0 auto 1rem;
        }
        .sw-toolbar-label {
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .05em;
            text-transform: uppercase;
            opacity: .6;
        }

        /* ===== Kertas A4 dengan kop surat sebagai background ===== */
        .sw-paper {
            container-type: inline-size;            /* basis unit cqw */
            max-width: 56rem;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            aspect-ratio: 210 / 297;                /* min. setinggi A4, tumbuh kalau isi lebih panjang */
            background-color: #fff;
            background-image: url('{{ asset('/assets/img/kop_surat_sw.png') }}');
            background-size: 100% auto;             /* tidak di-stretch */
            background-repeat: repeat-y;
            background-position: top center;
            color: #1f2937;
            border: 1px solid #e5e7eb;
            border-radius: .5rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;              /* paksa background ikut tercetak */
        }
        .sw-paper p { margin: 0; }

        /* Logo di kop selesai di ±16% lebar kertas -> isi mulai di bawahnya */
        .sw-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 0 6.6cqw 5cqw;
        }
        .sw-kop-gap { flex: none; height: 19cqw; }
        @supports not (width: 1cqw) {
            .sw-body { padding: 0 3.5rem 4rem; }
            .sw-kop-gap { height: 11rem; }
        }

        /* ===== Isi invoice ===== */
        .sw-invoice-container {
            flex: none;
            font-family: sans-serif;
            font-size: 13px;
            line-height: 1.5;
        }
        .sw-invoice-container > * + * { margin-top: 1.5rem; }
        .sw-invoice-container .title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin: 15px 0;
            text-decoration: underline;
            letter-spacing: 2px;
        }
        .sw-invoice-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .sw-invoice-container th, .sw-invoice-container td {
            border: 1px solid #333;
            padding: 7px 10px;
            font-size: 12px;
        }
        .sw-invoice-container .no-border td { border: none; }
        .sw-invoice-container .text-right { text-align: right; }
        .sw-invoice-container .text-center { text-align: center; }
        .sw-invoice-container .bold { font-weight: bold; }

        .sw-muted { color: #6b7280; }
        .sw-pay-box {
            padding: .75rem;
            font-size: .875rem;
            font-weight: 700;
            background: rgba(249, 250, 251, .85);
            border: 1px solid #e5e7eb;
            border-radius: .5rem;
        }
        .sw-pay-amount { color: #059669; }
        .sw-method-note { margin: .25rem 0 .5rem; font-size: .75rem; color: #4b5563; }
        .sw-notes { font-size: .75rem; color: #4b5563; }
        .sw-notes p + p { margin-top: .5rem; }
        .sw-sign { margin-top: 2rem; padding-top: 1rem; }
        .sw-sign-img { margin: .5rem 0; }
        .sw-sign-name { margin-left: .5rem; font-weight: 700; }
        .sw-sign-company { margin-left: .25rem; font-size: .75rem; color: #6b7280; }

        /* Company / PIC (kiri) dan Type event / No Telepon (kanan) */
        .sw-info {
            display: flex;
            justify-content: space-between;
            gap: 1.5rem;
            font-size: 12px;
        }
        .sw-info-col {
            display: grid;
            grid-template-columns: 5.5rem auto;     /* titik dua selalu sejajar */
            row-gap: .35rem;
            align-content: start;
            min-width: 0;
            margin: 0;
        }
        .sw-info-col dt,
        .sw-info-col dd { margin: 0; }

        /* Footer alamat: menempel di dasar kertas */
        .sw-footer {
            margin-top: auto;
            padding-top: 2.5rem;
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.5;
            text-align: center;
        }
        .sw-footer a { color: #1d4ed8; text-decoration: underline; }

        @media (max-width: 40rem) {
            .sw-invoice-container { font-size: 11px; }
        }

        @media print {
            .sw-toolbar { display: none; }
            .sw-paper {
                max-width: none;
                border: 0;
                border-radius: 0;
                box-shadow: none;
            }
        }
    </style>

    {{-- Tombol Navigasi Kembali --}}
    <div class="sw-toolbar">
        <span class="sw-toolbar-label">Preview Dokumen Invoice</span>
        {{-- <x-filament::button
            color="gray"
            icon="heroicon-m-arrow-left"
            tag="a"
            href="{{ \App\Filament\Resources\SwInvoices\SwInvoiceResource::getUrl() }}">
            Kembali
        </x-filament::button> --}}
    </div>

    <div class="sw-paper">
        <div class="sw-body">
            <div class="sw-kop-gap"></div>

            <div class="sw-invoice-container">

                {{-- Header Nomor Surat & Tanggal --}}
                <table class="no-border">
                    <tr>
                        <td>No : <b>{{ $invoice->letter_number ?? '-' }}</b></td>
                        <td class="text-right">{{ !empty($invoice->letter_date) ? date('l, d F Y', strtotime($invoice->letter_date)) : '-' }}</td>
                    </tr>
                </table>

                {{-- Judul Invoice --}}
                <div class="title">INVOICE</div>

                {{-- Info Perusahaan, PIC, Tipe Event & No Telepon --}}
                @php
                    // Sesuaikan nama kolom di sini kalau berbeda di tabel invoice
                    $pic   = filled($invoice->pic ?? null) ? $invoice->pic : '-';
                    $phone = filled($invoice->no_telp ?? null) ? $invoice->no_telp : '-';
                @endphp
                <div class="sw-info">
                    <dl class="sw-info-col">
                        <dt>Company</dt>
                        <dd>: <b>{{ $invoice->company_name ?? '-' }}</b></dd>
                        <dt>PIC</dt>
                        <dd>: <b>{{ $pic }}</b></dd>
                    </dl>
                    <dl class="sw-info-col">
                        <dt>Type event</dt>
                        <dd>: <b>{{ $invoice->event_type ?? '-' }}</b></dd>
                        <dt>No Telepon</dt>
                        <dd>: <b>{{ $phone }}</b></dd>
                    </dl>
                </div>

                {{-- Tabel Rincian Item --}}
                <table>
                    <thead>
                        <tr style="background-color: #f3f4f6; color: #111;">
                            <th width="5%">No</th>
                            <th width="45%">Remarks</th>
                            <th width="20%">Unit Price (IDR)</th>
                            <th width="10%">Qty</th>
                            <th width="20%">Total (IDR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $items = $invoice->items ?? collect();
                            $totalAmount = $items->sum('total_price');
                            $pph23 = $totalAmount * 0.02;
                            $grandTotal = $totalAmount - $pph23;
                        @endphp
                        @forelse($items as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->remarks }}</td>
                                <td class="text-right">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-right">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center sw-muted">Tidak ada rincian item.</td>
                            </tr>
                        @endforelse

                        {{-- Kalkulasi Total, PPh 23, dan Grand Total --}}
                        <tr>
                            <td colspan="4" class="text-right bold">Total</td>
                            <td class="text-right bold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right bold">Pph 23 (2%)</td>
                            <td class="text-right bold">Rp {{ number_format($pph23, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right bold">Grand Total</td>
                            <td class="text-right bold">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Batas Waktu Pembayaran --}}
                
                
                {{-- Metode Pembayaran (Tabel Bank Mandiri & BCA) --}}
                <div>
                    <div class="font-bold mb-3">
                    Payment is to be paid on :
                    <span class="font-bold">
                        {{ (empty($invoice->final_date) || $invoice->final_date == "0000-00-00 00:00:00") ? '-' : date('l, d F Y', strtotime($invoice->final_date)) . ' Rp. ' . number_format($grandTotal, 0, ',', '.') . ',-' }}
                    </span>
                </div>
                    <b>METHOD OF PAYMENT:</b>
                    <p class="sw-method-note">
                        Payment to be settle by Cash, TT, Credit Card or Company Cheque to be made payable to:
                    </p>
                    <table>
                        <thead>
                            <tr style="background-color: #b4c6e7; color: #000;">
                                <th class="font-italic">Bank</th>
                                <th class="font-italic">MANDIRI</th>
                                <th class="font-italic">BCA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Branch</td>
                                <td>ITC Fatmawati</td>
                                <td>Cibodas Tangerang</td>
                            </tr>
                            <tr>
                                <td>Account No</td>
                                <td>127-001-463-6029</td>
                                <td>713-225-222-2</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>PT. SOBAT WISATA DUNIA</td>
                                <td>SOBAT WISATA DUNIA PT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Catatan Kaki / Kebijakan EO --}}
                <div class="sw-notes">
                    <p>
                        The EO is not responsible for any loss or damage to any goods, property or equipment brought in the hotel. Please note that this quotation does not confirm your booking. We will reserve your booking after receiving 50% of deposit. Please do not hesitate to contact us at +62 21 84311622 or 081282229700 for any information you may need.
                    </p>
                    <p>
                        We would like to thank you and look forward to the opportunity to organize your event and assure you the best service and attention at all times.
                    </p>
                </div>

                {{-- Tanda Tangan --}}
                <div class="sw-sign">
                    <p>With warmest regards,</p>
                    <div class="sw-sign-img">
                        <img src="{{ asset('/assets/img/sw-signature-letter.png') }}" alt="Signature" width="180" style="margin-left: -10px;">
                    </div>
                    <div class="sw-sign-name">Pristiani</div>
                    <div class="sw-sign-company">SebelasWarna</div>
                </div>

            </div>

            {{-- Footer alamat perusahaan --}}
            <div class="sw-footer">
                <div>PT SOBAT WISATA DUNIA</div>
                <div>Kp. Empu No.1, RT.001/RW.007,</div>
                <div>Kelurahan Setu Sari, Kec. Cileungsi, Kab. Bogor.</div>
                <div>0812-8222-9700 | <a href="https://www.sebelaswarna.com" target="_blank" rel="noopener">www.sebelaswarna.com</a></div>
            </div>
        </div>
    </div>
</x-filament-panels::page>