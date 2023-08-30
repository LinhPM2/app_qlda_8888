<?php

namespace App\Models;

use Database\Factories\Dealer\Anniversary_dealerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anniversaryDealer extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return Anniversary_dealerFactory::new();
    }
    protected $fillable = [
        'eventDate',
        'name',
        'IDDealer',
    ];
}
