<?php

namespace App\Providers;

use App\Http\Controllers\DealerController;
use App\Http\Repositories\DealerRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Service\DealerService;
use App\Http\Service\UserService;
use App\Interfaces\IDealerRepository;
use App\Interfaces\IDealerService;
use App\Interfaces\IUserRepository;
use Illuminate\Support\ServiceProvider;


class CrudServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     */
    public function register(): void
    {
        //đăng ký service như thế này
        $this->assignServices(UserService::class, IUserRepository::class, UserRepository::class);
        $this->assignServices(DealerService::class, IDealerRepository::class, DealerRepository::class);
        // $this->assignServices(DealerController::class, IDealerService::class, DealerService::class);

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
    private function assignServices(string|array $class, string $dependency, string $implementation): void
    {
        $this->app->when($class)->needs($dependency)->give($implementation);
    }
}
