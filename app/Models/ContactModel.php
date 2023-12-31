<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_school',
        'logo',
        'bg',
        'address',
        'phone_number',
        'email',
        'facebook',
        'whatsapp'
    ];
}
