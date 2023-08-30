<?php

namespace App\Models;

use Database\Factories\Dealer\Group_dealerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupDealer extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return Group_dealerFactory::new();
    }
    protected $fillable = ['groupName'];

    public function groupDetailDealer()
    {
        return $this->hasMany(groupDetailDealer::class, 'IDGroup');
    }
}
