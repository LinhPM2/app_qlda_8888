<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthorizeService
{
    /**
     * @var Illuminate\Support\Facades\Auth
     * @return string | null User's Role
     * @author vdac
     * */
    public static function getRole(): string | null
    {
        $Role = Auth::user()->roles;
        if ($Role != null) {
            strtoupper($Role);
        }
        return $Role;
    }

    public static function getUserRole(User $user): string | null{
        return $user->roles;
    }

    public static function isAdmin(): bool{
        return strtoupper(Auth::user()->roles) == "ADMIN";
    }
    public static function isLeader(): bool{
        return strtoupper(Auth::user()->roles) == "LEADER";
    }
    public static function isUser(): bool{
        return strtoupper(Auth::user()->roles) == "USER";
    }

    
}
