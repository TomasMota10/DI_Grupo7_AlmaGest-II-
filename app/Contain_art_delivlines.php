<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain_art_delivlines extends Model
{
    protected $table = "contain_art_delivlines";

    protected $fillable = [
        'article_id','delivery_lines_id','deleted'
    ];
}
