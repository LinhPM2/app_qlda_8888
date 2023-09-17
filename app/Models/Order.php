<?php

namespace App\Models;

use App\Traits\QueryScopes\SearchScope;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Order extends Model
{
    use HasFactory, SearchScope;
    protected static function newFactory(): Factory
    {
        return OrderFactory::new();
    }
    protected $fillable = [
        'IDDealer',
        'unit',
        'quantity',
        'notes',
    ];
}
