<?php

namespace App\Models;

use App\Traits\QueryScopes\SearchScope;
use Database\Factories\Dealer\otherContact_dealerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherContact extends Model
{
    use HasFactory, SearchScope ;
    protected static function newFactory(): Factory
    {   
        return otherContact_dealerFactory::new();
    }
    protected $fillable = [
        'fullName',
        'dateOfBirth',
        'gender',
        'phoneNumber',
        'IDDealer',
    ];
}
