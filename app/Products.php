<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'article_id','company_id','price','stock','family_id','deleted'
    ];
}
