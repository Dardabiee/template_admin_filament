<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NotificationService
{
    /**
     * Mendapatkan ringkasan notifikasi pending untuk user yang sedang login.
     * Menggantikan method pending_notification() di CI3.
     */
    public function getPendingNotifications(): array
    {
        $filamentUser = auth()->user();
        if (!$filamentUser) {
            return ['notif_pending' => [], 'notif_menu' => []];
        }

        // Ambil nama lengkap user dari tabel legacy 'tbl_user' atau user aktif
        $legacyUser = DB::table('tbl_user')->where('email', $filamentUser->email)->first();
        $name = $legacyUser ? $legacyUser->fullname : $filamentUser->name;

        $submenus = DB::table('tbl_submenu')
            ->select('tbl_submenu.id_submenu', 'tbl_submenu.id_menu', 'tbl_submenu.link', 'tbl_submenu.nama_tbl', 'tbl_menu.nama_menu')
            ->leftJoin('tbl_menu', 'tbl_menu.id_menu', '=', 'tbl_submenu.id_menu')
            ->whereNotNull('tbl_submenu.nama_tbl')
            ->get();

        $tbl = [];

        foreach ($submenus as $submenu) {
            $tableName = $submenu->nama_tbl;
            $link = $submenu->link;

            if (!empty($tableName) && Schema::hasTable($tableName)) {
                $columns = Schema::getColumnListing($tableName);
                $where = [];

                if (in_array('app4_name', $columns) && in_array('app4_status', $columns)) {
                    $where[] = "(LOWER(app4_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app4_status = 'waiting' AND app4_name IS NOT NULL)";
                }

                if (in_array('app_hc_name', $columns) && in_array('app_hc_status', $columns)) {
                    $where[] = "(LOWER(app_hc_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app_hc_status = 'waiting')";
                }

                if (in_array('app_name', $columns) && in_array('app_status', $columns)) {
                    if (in_array('app4_status', $columns) && in_array('app4_name', $columns)) {
                        $where[] = "(LOWER(app_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app_status = 'waiting' AND (app4_name IS NULL OR app4_name = '' OR app4_status = 'approved'))";
                    } else {
                        $where[] = "(LOWER(app_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app_status = 'waiting')";
                    }
                }

                if (in_array('app2_name', $columns) && in_array('app2_status', $columns)) {
                    if (in_array('app_status', $columns)) {
                        $where[] = "(LOWER(app2_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app2_status = 'waiting' AND app_status = 'approved')";
                    } elseif (in_array('app_hc_status', $columns)) {
                        $where[] = "(LOWER(app2_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app2_status = 'waiting' AND app_hc_status = 'approved')";
                    } else {
                        $where[] = "(LOWER(app2_name) = " . DB::getPdo()->quote(strtolower($name)) . " AND app2_status = 'waiting')";
                    }
                }

                if (!empty($where)) {
                    $total = DB::table($tableName)
                        ->whereRaw(implode(' OR ', $where))
                        ->count();
                    $tbl[$link] = $total;
                } else {
                    $tbl[$link] = 0;
                }
            }
        }

        // Mapping ke menu utama
        $notifMenu = [];
        foreach ($tbl as $link => $jumlah) {
            $menuName = null;
            foreach ($submenus as $row) {
                if ($row->link === $link) {
                    $menuName = $row->nama_menu;
                    break;
                }
            }

            if ($menuName !== null) {
                if (!isset($notifMenu[$menuName])) {
                    $notifMenu[$menuName] = 0;
                }
                $notifMenu[$menuName] += (int) $jumlah;
            }
        }

        return [
            'notif_pending' => $tbl,
            'notif_menu' => $notifMenu,
        ];
    }

    /**
     * Mendapatkan detail data pending untuk modal atau daftar.
     * Menggantikan get_pending_details() di CI3.
     */
    public function getPendingDetails(?string $menuId = null): array
    {
        $filamentUser = auth()->user();
        if (!$filamentUser) {
            return [];
        }

        $legacyUser = DB::table('tbl_user')->where('email', $filamentUser->email)->first();
        $name = $legacyUser ? $legacyUser->fullname : $filamentUser->name;

        $query = DB::table('tbl_submenu')
            ->select('tbl_submenu.id_submenu', 'tbl_submenu.id_menu', 'tbl_submenu.link', 'tbl_submenu.nama_tbl', 'tbl_menu.nama_menu')
            ->leftJoin('tbl_menu', 'tbl_menu.id_menu', '=', 'tbl_submenu.id_menu')
            ->whereNotNull('tbl_submenu.nama_tbl')
            ->where('tbl_submenu.nama_tbl', '!=', '');

        if (!empty($menuId)) {
            $query->where('tbl_submenu.id_menu', $menuId);
        }

        $submenus = $query->get();
        $details = [];

        foreach ($submenus as $submenu) {
            $tableName = $submenu->nama_tbl;
            $link = $submenu->link;

            if (!empty($tableName) && Schema::hasTable($tableName)) {
                $columns = Schema::getColumnListing($tableName);
                $where = [];

                // (Gunakan logika kondisi $where yang sama seperti di getPendingNotifications)
                // ...
                
                // Fetch data dan mapping ke $details
            }
        }

        return $details;
    }

    /**
     * Notifikasi khusus Admin / 'eko' dengan status 'on-process'.
     * Menggantikan M_notifikasiAdmin.
     */
    public function getAdminNotifications(): array
    {
        $filamentUser = auth()->user();
        $username = $legacyUser = DB::table('tbl_user')->where('email', $filamentUser?->email)->value('username') ?? $filamentUser?->name;

        if ($username !== 'eko') {
            return [];
        }

        $submenus = DB::table('tbl_submenu')
            ->select('tbl_submenu.link', 'tbl_submenu.nama_submenu', 'tbl_submenu.nama_tbl', 'tbl_menu.nama_menu')
            ->leftJoin('tbl_menu', 'tbl_menu.id_menu', '=', 'tbl_submenu.id_menu')
            ->whereNotNull('tbl_submenu.nama_tbl')
            ->get();

        $result = [];

        foreach ($submenus as $row) {
            $tableName = $row->nama_tbl;
            if (!empty($tableName) && Schema::hasTable($tableName)) {
                $columns = Schema::getColumnListing($tableName);

                if (in_array('status', $columns)) {
                    $count = DB::table($tableName)->where('status', 'on-process')->count();

                    $result[] = [
                        'menu' => $row->nama_menu,
                        'link' => $row->link,
                        'submenu' => $row->nama_submenu,
                        'nama_tbl' => $tableName,
                        'jumlah' => $count,
                    ];
                }
            }
        }

        return $result;
    }
}