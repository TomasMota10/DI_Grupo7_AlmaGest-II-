<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_note_lines extends Model
{
    protected $table = "delivery_note_lines";

    protected $fillable = [
        'delivery_note_id','delivery_note_line_num','order_line_id','issue_date','deleted'
    ];
}
