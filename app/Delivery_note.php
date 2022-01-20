<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_note extends Model
{
    protected $table = "delivery_note";

    protected $fillable = [
        'num','issue_date','order_id','deleted'
    ];
}
