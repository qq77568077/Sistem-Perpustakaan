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
        $master = Navigation::create([
            "name" => 'Master',
            "url"  => 'master',
            "icon" => 'ti-settings',
            'main_menu' => null,
        ]);
        $master->subMenus()->create([
            "name" => 'Roles',
            "url"  => 'master/roles',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'Permissions',
            "url"  => 'master/permissions',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'Harga',
            "url"  => 'master/prices',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'Prodi',
            "url"  => 'master/prodi',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'User',
            "url"  => 'master/users',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'Mahasiswa',
            "url"  => 'master/mahasiswa',
            "icon" => '',
        ]);
        $master->subMenus()->create([
            "name" => 'Syarat & Ketentuan',
            "url"  => 'master/term',
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
        $transaksi->subMenus()->create([
            "name" => 'Plagiarism',
            "url"  => 'layanan/pengajuan-plagiarism',
            "icon" => '',
        ]);
        $transaksi->subMenus()->create([
            "name" => 'Jilid Laporan',
            "url"  => 'layanan/jilid',
            "icon" => '',
        ]);
        $transaksi->subMenus()->create([
            "name" => 'Jilid Laporan',
            "url"  => 'layanan/pengajuan-jilid',
            "icon" => '',
        ]);
        $transaksi->subMenus()->create([
            "name" => 'Berkas Ta',
            "url"  => 'layanan/berkas',
            "icon" => '',
        ]);
        $transaksi->subMenus()->create([
            "name" => 'Berkas Ta',
            "url"  => 'layanan/file',
            "icon" => '',
        ]);
    }
}
