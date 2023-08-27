<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anniversaryDealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventDate',
        'name',
        'IDDealer',
    ];
}
