<?php

namespace App\Providers;

use App\Http\Repositories\DealerRepository;
use App\Http\Repositories\OtherContactRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Service\DealerService;
use App\Http\Service\OtherContactService;
use App\Http\Service\UserService;
use App\Interfaces\Repositories\IDealerRepository;
use App\Interfaces\Repositories\IOtherContactRepository;
use App\Interfaces\Repositories\IUserRepository;
use App\Interfaces\Services\IDealerService;
use App\Interfaces\Services\IOtherContactService;
use App\Interfaces\Services\IUserService;
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

        // $this->assignServices(UserService::class, IUserRepository::class, UserRepository::class);
        $this->interfaceBinder(IUserRepository::class, UserRepository::class);
        $this->interfaceBinder(IUserService::class, UserService::class);
        $this->interfaceBinder(IDealerService::class, DealerService::class);
        $this->interfaceBinder(IDealerRepository::class, DealerRepository::class);
        $this->interfaceBinder(IOtherContactService::class, OtherContactService::class);
        $this->interfaceBinder(IOtherContactRepository::class, OtherContactRepository::class);
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
    private function interfaceBinder($interface, $implementation)
    {
        $this->app->bind($interface,  $implementation);
    }
}
