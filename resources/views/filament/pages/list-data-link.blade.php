<x-filament-panels::page>
    {{-- Komponen Tabs Bawaan Filament --}}
    <div class="mb-4">
        <x-filament::tabs label="Kategori Data Link">
            <x-filament::tabs.item 
                :active="$activeTab === 'crew'" 
                wire:click="switchTab('crew')">
                Data Crew
            </x-filament::tabs.item>

            <x-filament::tabs.item 
                :active="$activeTab === 'member'" 
                wire:click="switchTab('member')">
                Data Member
            </x-filament::tabs.item>
        </x-filament::tabs>
    </div>
    
    {{ $this->table }}
</x-filament-panels::page>