<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'dealerName',
        'gender',
        'phoneNumber',
        'dateOfBirth',
        'country',
        'specificAddress',
        'businessItem',
    ];
}
