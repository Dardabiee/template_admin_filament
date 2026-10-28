<?php

namespace App\Filament\Resources\KpsPrepayments\Pages;

use App\Filament\Resources\KpsPrepayments\KpsPrepaymentResource;
use App\Models\KpsPrepayment;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateKpsPrepayment extends CreateRecord
{
    protected static string $resource = KpsPrepaymentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $filamentUser = Auth::user(); // User yang login dari Filament (tabel users)

        // 1. Generate Kode Prepayment otomatis
        if (empty($data['kode_prepayment'])) {
            $data['kode_prepayment'] = KpsPrepayment::generateKodePrepayment($data['tgl_prepayment'] ?? now());
        }

        // 2. Hubungkan Filament User ke tbl_data_user (legacy) berdasarkan kesamaan Nama
        $legacyUser = DB::table('tbl_data_user')
            ->where('name', $filamentUser->name)
            ->first();

        if ($legacyUser) {
            $data['id_user'] = $legacyUser->id_user;
            $data['divisi'] = $legacyUser->divisi;
            $data['jabatan'] = $legacyUser->jabatan;
        } else {
            // Fallback jika nama tidak ditemukan di database legacy sw
            throw new \Exception("Data profil legacy untuk user '{$filamentUser->name}' tidak ditemukan di tabel tbl_data_user.");
        }

        // 3. Ambil Approver 1 & Approver 2 secara otomatis dari tbl_approval (seperti logic CI3)
        $menu = DB::table('tbl_submenu')->where('link', 'kps_prepayment')->first();
        if ($menu) {
            $approval = DB::table('tbl_approval')->where('id_menu', $menu->id_menu)->first();
            if ($approval) {
                $data['app_name'] = DB::table('tbl_data_user')->where('id_user', $approval->app_id)->value('name');
                $data['app2_name'] = DB::table('tbl_data_user')->where('id_user', $approval->app2_id)->value('name');
            }
        }

        // 4. Kalkulasi total nominal dari repeater details
        if (!empty($data['details'])) {
            $data['total_nominal'] = collect($data['details'])->sum('nominal');
        }

        // 5. Set status awal workflow
        $data['status'] = 'on-process';
        $data['app_status'] = 'waiting';
        $data['app2_status'] = 'waiting';
        $data['payment_status'] = 'unpaid';

        return $data;
    }

    protected function afterCreate(): void
    {
        // Hitung total_nominal otomatis dari relasi details setelah record & detail tersimpan
        $record = $this->getRecord();
        $totalNominal = $record->details()->sum('nominal');
        
        // Update total_nominal pada record utama
        $record->update([
            'total_nominal' => $totalNominal
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}