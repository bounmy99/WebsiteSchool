<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'contents_1',
        'contents_2'
    ];
}
