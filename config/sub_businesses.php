<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Base Path Akun Hostinger
    |--------------------------------------------------------------------------
    | Sesuaikan dengan root path akun Hostinger Anda (cek via File Manager / pwd).
    | Contoh: '/home/u123456789/domains'
    */
    'hostinger_domains_root' => env('HOSTINGER_DOMAINS_ROOT', '/home/u123456789/domains'),

    /*
    |--------------------------------------------------------------------------
    | Mapping Sub Bisnis (Tenants)
    |--------------------------------------------------------------------------
    */
    'tenants' => [
        // === KELOMPOK 1: MENGGUNAKAN KONEKSI DB 'sw' & DOMAIN UTAMA ===
        'kps' => [
            'name'          => 'KPS',
            'db_connection' => 'sw',
            'table_prefix'  => 'kps_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_kps',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/kps_attachment',
            ],
        ],
        'bmn' => [
            'name'          => 'BMN',
            'db_connection' => 'sw',
            'table_prefix'  => 'bmn_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_bmn',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/bmn_attachment',
            ],
        ],
        'ctz' => [
            'name'          => 'CTZ',
            'db_connection' => 'sw',
            'table_prefix'  => 'ctz_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_ctz',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/ctz_attachment',
            ],
        ],
        'sw' => [
            'name'          => 'SW',
            'db_connection' => 'sw',
            'table_prefix'  => 'sw_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_sw',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/sw_attachment',
            ],
        ],
        'swi' => [
            'name'          => 'SWI',
            'db_connection' => 'sw',
            'table_prefix'  => 'swi_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_swi',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/swi_attachment',
            ],
        ],
        'pu' => [
            'name'          => 'PU',
            'db_connection' => 'sw',
            'table_prefix'  => 'pu_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_pu/',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/pu_attachment',
            ],
        ],
        'qbg' => [
            'name'          => 'QBG',
            'db_connection' => 'sw',
            'table_prefix'  => 'qbg_',
            'base_path'     => env('PATH_CI3_SW', '/home/u123456789/domains/domainutama.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_qbg',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/qbg_attachment',
            ],
        ],

        // === KELOMPOK 2: DATABASE & DOMAIN TERPISAH ===
        'mac' => [
            'name'          => 'MAC',
            'db_connection' => 'mac',
            'table_prefix'  => 'mac_',
            'base_path'     => env('PATH_CI3_MAC', '/home/u123456789/domains/domain-mac.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_mac',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/mac_attachment',
            ],
        ],
        'hm' => [
            'name'          => 'HM',
            'db_connection' => 'hm',
            'table_prefix'  => 'hm_', // Sesuaikan jika nama tabelnya hmn_reimbust atau hm_reimbust
            'base_path'     => env('PATH_CI3_HM', '/home/u123456789/domains/domain-hm.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_hmn',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/hmn_attachment',
            ],
        ],
        'samlog' => [
            'name'          => 'SAMLOG',
            'db_connection' => 'samlog',
            'table_prefix'  => 'sml_', // Sesuaikan dengan prefix tabel di database samlog (misal: sml_ atau samlog_)
            'base_path'     => env('PATH_CI3_SML', '/home/u123456789/domains/domain-samlog.com/public_html'),
            'paths' => [
                'reimbust_kwitansi'   => 'assets/backend/document/reimbust/kwitansi/kwitansi_sml',
                'reimbust_attachment' => 'assets/backend/document/reimbust/attachment/sml_attachment',
            ],
        ],
    ],
];