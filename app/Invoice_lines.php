<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_lines extends Model
{
    protected $table = "invoice_lines";

    protected $fillable = [
        'invoice_id','delivery_lines_id','invoice_lines_num','issue_date','deleted'
    ];

}
