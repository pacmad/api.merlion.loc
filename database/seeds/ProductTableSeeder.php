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
        // $json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&section=1439&store=msk');
        $data =  array_merge((array) json_decode($json));
        $products = $data['DATA'];

        
        foreach ($products as $key => $item) {

            Product::create(
                [
                    'product_id' =>     $item->id,
                    'active' =>         $item->active,
                    'date_update' =>    $item->date_update,
                    'articul' =>        $item->articul,
                    'name' =>           $item->name,
                    'about' =>          $item->about,
                    'section' =>        $item->section,
                    'image' =>          $item->image,
                    'price_base' =>     $item->price_base,
                    'price_old' =>      $item->price_old,
                    'price_sp' =>       $item->price_sp,
                    'min' =>            $item->min,
                    'box' =>            $item->box,
                    'fix' =>            $item->fix,
                    'new' =>            $item->new,
                    'hit' =>            $item->hit,
                    'brand' =>          $item->brand,
                    'store_ekb' =>      $item->store_ekb,
                    'store_msk' =>      $item->store_msk,
                    'store_nsk' =>      $item->store_nsk,
                    'way' =>            $item->way,
                    'barcode' =>        $item->barcode,
                    'props' =>          $item->props,
                    'specifications' => $item->specifications,
                    'includes' =>       $item->includes,
                ]
            );
        }
    }
}
