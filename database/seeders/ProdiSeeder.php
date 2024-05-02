<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/prodi.json');
        $data = json_decode($json);
        foreach ($data as $obj){
            Prodi::create(array(
                'nama' => $obj->nama
            ));
        }
    }
}
