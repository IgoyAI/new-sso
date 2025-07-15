<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Applications extends BaseConfig
{
    public array $apps = [
        'simkeu' => [
            'label' => 'Sistem Informasi Keuangan (SIMKEU)',
            'icon'  => 'fas fa-coins',
            'color' => 'primary',
            'url'   => '#',
        ],
        'persuratan' => [
            'label' => 'Sistem Informasi Persuratan',
            'icon'  => 'fas fa-envelope',
            'color' => 'secondary',
            'url'   => '#',
        ],
        'kepegawaian' => [
            'label' => 'Sistem Informasi Kepegawaian',
            'icon'  => 'fas fa-id-badge',
            'color' => 'success',
            'url'   => '#',
        ],
    ];
}
