<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain_art_invlines extends Model
{
    protected $table = "contain_art_invlines";

    protected $fillable = [
        'article_id','invoice_line_id'
    ];
}
