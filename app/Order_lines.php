<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_lines extends Model
{
    protected $table = "order_lines";

    protected $fillable = [
        'order_id','order_line_num','issue_date','deleted',
    ];
}
