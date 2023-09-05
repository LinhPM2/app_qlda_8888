<?php

namespace App\Providers;

use App\Http\Controllers\UserMgt\UserController;
use App\Http\Service\UserService;
use App\Interfaces\ICrud;
use Illuminate\Support\ServiceProvider;
use IUserRepository;
use UserRepository;

class CrudServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //đăng ký service như thế này
        $this->assignServices(UserService::class, IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    /**
     * Hàm dùng để đăng ký class implement từ interface để Laravel tự động inject
     * @param string|array $class class muốn được DI
     * @param string $dependency có thể là interface cả 2 lớp còn lại kế thừa
     * @param string $implementation service/repository implement từ interface trên
     * @author vdac
     */
    public function assignServices(string|array $class, string $dependency, string $implementation): void
    {
        $this->app->when($class)->needs($dependency)->give(function () use ($implementation) {
            return $implementation;
        });
    }
}
