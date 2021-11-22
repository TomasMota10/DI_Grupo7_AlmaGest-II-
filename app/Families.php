<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Families extends Model
{
    protected $table = 'families';

    protected $fillable = [
        'name','profit_margin','deleted'
    ];
}