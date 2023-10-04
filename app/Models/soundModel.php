<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soundModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'Contents',
        'images',
        'logo'
    ];
}
