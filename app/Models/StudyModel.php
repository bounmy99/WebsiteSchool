<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'Contents',
        'images'
    ];
}
