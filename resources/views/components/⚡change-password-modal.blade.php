<?php

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function save(): void
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(3)],
        ]);

        $user = Filament::auth()->user();
        $user->update(['password' => Hash::make($this->password)]);

        session()->put([
            'password_hash_' . Filament::getAuthGuard() => $user->getAuthPassword(),
        ]);

        $this->reset();
        $this->dispatch('close-modal', id: 'change-password-modal');

        Notification::make()->title('Password berhasil diubah')->success()->send();
    }
};
?>


<div>
    <x-filament::modal id="change-password-modal" width="lg">
        <x-slot name="heading">Change Password</x-slot>

        <form wire:submit="save" class="space-y-4">
            <div>
                <x-filament::input.wrapper :valid="! $errors->has('current_password')">
                    <x-filament::input type="password" wire:model="current_password" placeholder="Password saat ini" />
                </x-filament::input.wrapper>
                @error('current_password') <p class="mt-1 text-sm text-danger-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <x-filament::input.wrapper :valid="! $errors->has('password')">
                    <x-filament::input type="password" wire:model="password" placeholder="Password baru" />
                </x-filament::input.wrapper>
                @error('password') <p class="mt-1 text-sm text-danger-600">{{ $message }}</p> @enderror
            </div>

            <x-filament::input.wrapper>
                <x-filament::input type="password" wire:model="password_confirmation" placeholder="Konfirmasi password baru" />
            </x-filament::input.wrapper>

            <x-filament::button type="submit">Simpan</x-filament::button>
        </form>
    </x-filament::modal>
</div>