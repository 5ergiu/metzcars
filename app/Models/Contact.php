<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'brand',
        'model',
        'gearbox',
        'price',
        'year',
        'message',
    ];
}
