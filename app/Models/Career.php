<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
 protected $fillable = [
        'title',
        'company',
        'image',
        'start_date',
        'end_date',
        'description',
        'status',
    ];
}
