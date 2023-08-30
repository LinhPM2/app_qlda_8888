<?php

namespace App\Models;

use Database\Factories\Dealer\Note_dealerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noteDealer extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return Note_dealerFactory::new();
    }
    protected $fillable = [
        'description',
        'name',
        'IDDealer',
    ];
}
