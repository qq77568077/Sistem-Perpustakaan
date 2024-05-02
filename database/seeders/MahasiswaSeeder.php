<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/mahasiswa.json');
        $data = json_decode($json);
        foreach ($data as $obj){
            Mahasiswa::create(array(
                'nama' => $obj->nama,
                'nrp' => $obj->nrp,
                'email' => $obj->email,
                'user_id' => $obj->user_id,
                'prodi_id' => $obj->prodi_id,
            ));
        }
    }
}
