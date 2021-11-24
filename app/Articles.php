<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'name','description','price_min','price_max','color_name',
        'weight','size','family_id','deleted'
    ];
}