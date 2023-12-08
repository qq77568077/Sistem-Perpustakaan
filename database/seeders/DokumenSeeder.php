<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/document.json');
        $data = json_decode($json);
        foreach ($data as $obj){
            Document::create(array(
                'dokumen' => $obj->dokumen
            ));
        }
    }
}
