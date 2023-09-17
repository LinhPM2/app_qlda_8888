<?php

namespace App\Models;

use Database\Factories\Dealer\DealerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class dealer extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return DealerFactory::new();
    }
    protected $fillable = [
        'dealerName',
        'gender',
        'phoneNumber',
        'dateOfBirth',
        'country',
        'specificAddress',
        'businessItem',
    ];

    public function anniversaryDealer(){
        return $this -> hasMany(anniversaryDealer::class, 'IDDealer','id');
    }
    public function noteDealer(){
        return $this -> hasMany(noteDealer::class, 'IDDealer','id');
    }
    public function groupDetailDealer(){
        return $this -> hasMany(groupDetailDealer::class, 'IDDealer','id');
    }
    public function otherContact(){
        return $this -> hasMany(otherContact::class, 'IDDealer','id');
    }
    public function order(){
        return $this -> hasMany(Order::class, 'IDDealer','id');
    }
}
