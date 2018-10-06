<?php

namespace App;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use NodeTrait;
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'code',
        'active',
        'count'
    ];



}
