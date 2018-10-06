<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222');
        $data =  (array)json_decode($json);
        $catalogs = $data['DATA'];

        $products = [];

        foreach ($catalogs as $key => $item) {

            Product::create(
                [
                    'product_id' => $products[$key] = $item->id,
                    'active' => $products[$key] = $item->active,
                    'date_update' => $products[$key] = $item->date_update,
                    'articul' => $products[$key] = $item->articul,
                    'name' => $products[$key] = $item->name,
                    'about' => $products[$key] = $item->about,
                    'section' => $products[$key] = $item->section,
                    'image' => $products[$key] = $item->image,
                    'price_base' => $products[$key] = $item->price_base,
                    'price_old' => $products[$key] = $item->price_old,
                    'price_sp' => $products[$key] = $item->price_sp,
                    'min' => $products[$key] = $item->min,
                    'box' => $products[$key] = $item->box,
                    'fix' => $products[$key] = $item->fix,
                    'new' => $products[$key] = $item->new,
                    'hit' => $products[$key] = $item->hit,
                    'brand' => $products[$key] = $item->brand,
                    'store_ekb' => $products[$key] = $item->store_ekb,
                    'store_msk' => $products[$key] = $item->store_msk,
                    'store_nsk' => $products[$key] = $item->store_nsk,
                    'way' => $products[$key] = $item->way,
                    'barcode' => $products[$key] = $item->barcode,
                    'props' => $products[$key] = $item->props,
                    'specifications' => $products[$key] = $item->specifications,
                    'includes' => $products[$key] = $item->includes,
                ]
            );
        }
    }
}
