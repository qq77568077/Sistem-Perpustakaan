<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/category.json');
        $data = json_decode($json);
        foreach ($data as $obj){
            Category::create(array(
                'kategori_ta' => $obj->kategori_ta
            ));
        }
    }
}
