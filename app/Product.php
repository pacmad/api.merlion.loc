<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Product extends Model
{
    //
    use NodeTrait;

    protected $fillable = [
        'product_id',
        'active',
        'date_update',
        'articul',
        'name',
        'about',
        'section',
        'image',
        'price_base',
        'price_old',
        'price_sp',
        'min',
        'box',
        'fix',
        'new',
        'hit',
        'brand',
        'store_ekb',
        'store_msk',
        'store_nsk',
        'way',
        'barcode',
        'props',
        'specifications',
        'includes'
    ];

    protected $casts = [
        'id' => 'int',
        'sert' => 'array',
        'specifications' => 'array',
        'includes' => 'array',
        'images' => 'array',
        'props' => 'array'
    ];

}
