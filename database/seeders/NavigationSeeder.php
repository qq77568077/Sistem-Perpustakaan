<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $konfigurasi = Navigation::create([
        "name" => 'Konfigurasi',
        "url"  => 'konfigurasi',
        "icon" => 'ti-settings',
        'main_menu' => null,
        ]);
            $konfigurasi->subMenus()->create([
                "name" => 'Roles',
                "url"  => 'konfigurasi/roles',
                "icon" => '',
            ]);
            $konfigurasi->subMenus()->create([
            "name" => 'Permissions',
            "url"  => 'konfigurasi/permissions',
            "icon" => '',
            ]);

       $transaksi =  Navigation::create([
        "name" => 'Layanan',
        "url"  => 'layanan',
        "icon" => 'ti-book',
        'main_menu' => null,
        ]);
            $transaksi->subMenus()->create([
            "name" => 'Plagiarism',
            "url"  => 'layanan/plagiarism',
            "icon" => '',
            ]);
    }
}
