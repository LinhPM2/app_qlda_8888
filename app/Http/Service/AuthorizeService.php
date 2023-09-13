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
    private static $instance;
    private $user;
    private static $staticUser;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function getRole(): string | null
    {
        $Role = Auth::user()->roles;
        if ($Role != null) {
            strtoupper($Role);
        }
        return $Role;
    }
    public function setUser()
    {
        $this->user = Auth::user();
        self::$staticUser = Auth::user();
    }
    public static function getUser()
    {
        return self::$staticUser;
    }
    public static function getUserRole(User $user): string | null
    {
        return $user->roles;
    }

    public static function isAdmin(): bool
    {
        return strtoupper(Auth::user()->roles) == "ADMIN";
    }
    public static function isLeader(): bool
    {
        return strtoupper(Auth::user()->roles) == "LEADER";
    }
    public static function isUser(): bool
    {
        return strtoupper(Auth::user()->roles) == "USER";
    }
    public static function getRoleList(): array
    {
        return [
            __('roles.admin') => "ADMIN",
            __('roles.leader') => "LEADER",
            __('roles.user') => "USER",
        ];
    }

    /**
     * return inner html string for displaying selectboxes
     */
    public static function HTML_getRoleList(): array
    {
        return [
            __('roles.user') => "<span><i class='fa fa-circle text-primary'></i></span> USER",
            __('roles.leader') => "<span><i class='fa fa-circle text-primary'></i></span> LEADER",
            __('roles.admin') => "<span><i class='fa fa-circle text-success'></i></span> ADMIN",
        ];
    }
}
