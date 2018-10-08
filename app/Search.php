<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    //
    use ElasticquentTrait;
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'active',
        'date_update',
        'articul',
        'name',
        'about',
        'category_id',
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
        'sert' => 'array',
        'specifications' => 'array',
        'includes' => 'array',
        'images' => 'array',
        'props' => 'array',
    ];

    protected $mappingProperties = array(
        'name' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'about' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],

    );
}
