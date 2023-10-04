<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolleyballModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'Contents',
        'images',
        'logo'
    ];
}
