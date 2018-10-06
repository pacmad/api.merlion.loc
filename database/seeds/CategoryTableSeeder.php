<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $json = file_get_contents('http://www.galacentre.ru/api/v2/sections/json/?key=d27b9aa09102f001d6f6f5c5fc97d222');
        $data =  (array)json_decode($json);
        $catalogs = $data['DATA'];

        $categories = [];

        foreach ($catalogs as $key => $item) {

            DB::table('categories')->insert(
                [
                    'id' => $categories[$key] = $item->id,
                    'parent_id' => $categories[$key] = $item->parent_id,
                    'name' => $categories[$key] = $item->name,
                    'code' => $categories[$key] = $item->code,
                    'active' => $categories[$key] = $item->active,
                    'count' => $categories[$key] = $item->count,
                ]
            );
        }

    }
}
