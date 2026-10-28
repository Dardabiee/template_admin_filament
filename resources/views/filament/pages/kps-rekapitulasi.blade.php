<x-filament-panels::page>
    {{-- Filter periode --}}
    <x-filament::section heading="Filter Periode" compact>
        <form wire:submit="filterData" class="space-y-4">
            {{ $this->form }}

            <div class="flex flex-wrap gap-3">
                <x-filament::button type="submit" icon="heroicon-m-funnel">
                    Terapkan
                </x-filament::button>
                <x-filament::button type="button" color="gray" wire:click="resetFilter">
                    Reset
                </x-filament::button>
            </div>
        </form>
    </x-filament::section>

    {{-- Ringkasan total --}}
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach ([
            'Prepayment'  => 'total_prepayment',
            'Reimbust'    => 'total_reimbust',
            'Pelaporan'   => 'total_pelaporan',
            'Pengeluaran' => 'total_pengeluaran',
        ] as $label => $key)
            <x-filament::section compact>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $label }}</div>
                <div class="mt-1 text-xl font-semibold text-gray-950 dark:text-white">
                    Rp {{ number_format($totals[$key] ?? 0, 0, ',', '.') }}
                </div>
            </x-filament::section>
        @endforeach
    </div>

    {{-- Tabs + tabel --}}
    <div class="space-y-3">
        <x-filament::tabs label="Kategori Rekapitulasi">
            <x-filament::tabs.item
                :active="$activeTab === 'pelaporan'"
                wire:click="switchTab('pelaporan')">
                Pelaporan
            </x-filament::tabs.item>

            <x-filament::tabs.item
                :active="$activeTab === 'reimbust'"
                wire:click="switchTab('reimbust')">
                Reimbust
            </x-filament::tabs.item>
        </x-filament::tabs>

        {{ $this->table }}
    </div>
</x-filament-panels::page>