<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain_art_orderlines extends Model

{
    protected $table = 'contain_art_orderlines';

    protected $fillable = [
        'article_id','order_line_id','deleted',
    ];
}
