<?php

namespace App\Models;

use Database\Factories\Dealer\GroupDetail_dealerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupDetailDealer extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return GroupDetail_dealerFactory::new();
    }
    protected $fillable = [
        'IDDealer',
        'IDGroup'
    ];

    public function groupDealer(){
        return $this->belongsTo(groupDealer::class,'IDGroup','id');
    }
    public function dealer(){
        return $this->belongsTo(dealer::class,'IDDealer','id');
    }

}
