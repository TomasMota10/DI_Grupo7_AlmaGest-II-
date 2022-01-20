<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";

    protected $fillable = [
        'num','issue_date','delivery_note_id','deleted'
    ];
    
}
