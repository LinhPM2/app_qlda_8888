<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'dateOfBirth',
        'gender',
        'phoneNumber',
        'IDDealer',
    ];
}
