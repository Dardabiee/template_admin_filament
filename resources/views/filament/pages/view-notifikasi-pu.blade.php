<x-filament-panels::page>
    <style>
        /* Scoped dengan prefix "fn-" supaya tidak bergantung pada Tailwind theme Filament */
        .fn-paper {
            max-width: 64rem;
            margin: 0 auto;
            padding: 2.75rem;
            background: #fff;
            color: #2b2b2b;
            border: 1px solid #e5e7eb;
            border-radius: .9rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
            font-family: Arial, Helvetica, sans-serif;
            font-size: .95rem;
            line-height: 1.5;
        }

        /* Header: logo | judul | tombol back */
        .fn-head {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: start;
            margin-bottom: 2rem;
        }
        .fn-logo { height: 4.5rem; width: auto; object-fit: contain; }
        .fn-title {
            align-self: end;
            margin: 0;
            font-size: 1.35rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
        }
        .fn-back {
            justify-self: end;
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            padding: .45rem .8rem;
            background: #1f2740;
            color: #fff;
            border-radius: .4rem;
            font-size: .875rem;
            font-weight: 600;
            text-decoration: none;
        }
        .fn-back:hover { background: #2d3758; }
        .fn-back svg { width: 1rem; height: 1rem; }

        /* Baris label : nilai */
        .fn-intro { margin: 0 0 .75rem; }
        .fn-group { margin-bottom: 1.5rem; }
        .fn-row {
            display: grid;
            grid-template-columns: 7.5rem 1fr;
            padding: .15rem 0;
        }
        .fn-row--wide { grid-template-columns: 9rem 1fr; }

        /* Pilihan ( ✔ ) */
        .fn-options { display: flex; flex-wrap: wrap; gap: .25rem 1.6rem; }
        .fn-box { display: inline-block; min-width: .9rem; text-align: center; }

        /* Judul section */
        .fn-heading {
            margin: 0 0 .75rem;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .fn-dots { margin: 1.1rem 0 1.5rem; border-bottom: 2px dotted #2b2b2b; }

        /* Tabel approval */
        .fn-table {
            width: 100%;
            margin-top: 2.5rem;
            border-collapse: collapse;
            table-layout: fixed;
            text-align: center;
            font-size: .85rem;
        }
        .fn-table th,
        .fn-table td {
            padding: .65rem;
            border: 1px solid #111;
            font-weight: 400;
        }
        .fn-table .fn-created td { padding: 1.4rem .65rem; text-transform: uppercase; }

        @media (max-width: 40rem) {
            .fn-paper { padding: 1.25rem; }
            .fn-head { grid-template-columns: 1fr auto; }
            .fn-title { grid-column: 1 / -1; grid-row: 2; margin-top: 1rem; }
            .fn-options { gap: .25rem 1rem; }
        }
    </style>

    <div class="fn-paper">

        {{-- Header: Logo, Judul, & Tombol Back --}}
        <div class="fn-head">
            <img class="fn-logo"
                 src="{{ asset('assets/img/sub-bisnis/pengenumroh/logo.png') }}"
                 alt="Pengen Umroh">

            <h1 class="fn-title">Form Notifikasi</h1>

            {{-- Ganti url()->previous() dengan XxxResource::getUrl('index') kalau mau tujuan yang pasti --}}
            <a class="fn-back" href="{{ url()->previous() }}">
                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M12.79 5.23a.75.75 0 0 1-.02 1.06L8.832 10l3.938 3.71a.75.75 0 1 1-1.04 1.08l-4.5-4.25a.75.75 0 0 1 0-1.08l4.5-4.25a.75.75 0 0 1 1.06.02Z"/>
                </svg>
                Back
            </a>
        </div>

        {{-- Informasi Pengaju --}}
        <p class="fn-intro">Saya yang bertanda tangan dibawah ini :</p>
        <div class="fn-group">
            <div class="fn-row">
                <div>Nama</div>
                <div>: {{ $notification->user->name ?? 'Administrator' }}</div>
            </div>
            <div class="fn-row">
                <div>Jabatan</div>
                <div>: {{ $notification->jabatan ?? 'Staff' }}</div>
            </div>
            <div class="fn-row">
                <div>Department</div>
                <div>: {{ $notification->departemen ?? 'IT' }}</div>
            </div>
        </div>

        {{-- Detail Pengajuan Izin --}}
        <div class="fn-group">
            @php $pengajuan = $notification->pengajuan ?? 'Tidak Masuk'; @endphp

            <div class="fn-row" style="margin-bottom: .5rem;">
                <div>Mengajukan Izin</div>
                <div class="fn-options">
                    <span>:</span>
                    <span>( <span class="fn-box">{{ $pengajuan == 'Tidak Masuk' ? '✔' : '' }}</span> ) Tidak Masuk</span>
                    <span>( <span class="fn-box">{{ $pengajuan == 'Pulang Awal' ? '✔' : '' }}</span> ) Pulang Awal</span>
                    <span>( <span class="fn-box">{{ $pengajuan == 'Datang Terlambat' ? '✔' : '' }}</span> ) Datang Terlambat</span>
                </div>
            </div>

            <div class="fn-row">
                <div>Tanggal</div>
                <div>: {{ $notification->tgl_notifikasi ?? '11 Maret 2026' }}</div>
            </div>
            <div class="fn-row">
                <div>Waktu</div>
                <div>: {{ $notification->waktu ?? '11:49' }}</div>
            </div>
            <div class="fn-row">
                <div>Alasan</div>
                <div>: {{ $notification->alasan ?? 'tes' }}</div>
            </div>
        </div>

        {{-- Bagian Atasan --}}
        <h3 class="fn-heading" style="margin-top: 2.5rem;">Diisi oleh atasan karyawan bersangkutan</h3>

        <div class="fn-row" style="margin-bottom: .5rem;">
            <div>Notifikasi ini</div>
            <div class="fn-options">
                <span>( <span class="fn-box">{{ ($notification->status ?? '') == 'approved' ? '✔' : '' }}</span> ) Disetujui</span>
                <span>( <span class="fn-box">{{ ($notification->status ?? '') == 'rejected' ? '✔' : '' }}</span> ) Tidak Disetujui</span>
            </div>
        </div>

        <div class="fn-row">
            <div>Dengan catatan</div>
            <div>: {{ $notification->catatan ?? '' }}</div>
        </div>

        <div class="fn-dots"></div>

        {{-- Catatan Human Capital --}}
        <h3 class="fn-heading">Catatan Human Capital Departement</h3>
        <div class="fn-row fn-row--wide">
            <div>NOTIFIKASI KE</div>
            <div>: {{ $notification->id ?? '8' }} ( {{ date('Y') }} )</div>
        </div>

        {{-- Tabel Approval Workflow --}}
        <table class="fn-table">
            <thead>
                <tr>
                    <th>KARYAWAN</th>
                    <th>HC-DEPARTMENT</th>
                    <th>DEPT. HEAD</th>
                </tr>
            </thead>
            <tbody>
                <tr class="fn-created">
                    <td>
                        Created<br>
                        <span style="text-transform: none;">{{ $notification->created_at ?? '2026-03-11 10:48:40' }}</span>
                    </td>
                    <td>{{ $notification->app_hc_status ?? 'WAITING' }}</td>
                    <td>{{ $notification->app2_status ?? 'WAITING' }}</td>
                </tr>
                <tr>
                    <td>{{ $notification->user->name ?? 'Administrator' }}</td>
                    <td>{{ $notification->app_hc_name ?? 'Tyas' }}</td>
                    <td>{{ $notification->app2_name ?? 'arya' }}</td>
                </tr>
            </tbody>
        </table>

    </div>
</x-filament-panels::page>