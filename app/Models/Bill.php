<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'last_name',
        'company',
        'phone_number',
        'security_question',
    ];
}
