<?php

namespace Database\Seeders;

use App\Models\Pengumpulan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class PengumpulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/pengumpulan.json');
        $data = json_decode($json);
        foreach ($data as $obj){
            Pengumpulan::create(array(
                'nama' => $obj->nama
            ));
        }
    }
}
