<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'email',
        'user_id',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
    ];
}
