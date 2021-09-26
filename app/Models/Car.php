<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
