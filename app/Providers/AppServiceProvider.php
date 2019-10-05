<?php

namespace App\Providers;

use App\Repositories\BillRepositoryInterface;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\impl\BillRepository;
use App\Repositories\impl\CartRepository;
use App\Repositories\impl\CustomerRepository;
use App\Repositories\impl\ProductRepository;
use App\Repositories\impl\UserRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\BillServiceInterface;
use App\Services\CartServiceInterface;
use App\Services\CustomerServiceInterface;
use App\Services\impl\BillService;
use App\Services\impl\CartService;
use App\Services\impl\CustomerService;
use App\Services\impl\ProductService;
use App\Services\impl\UserService;
use App\Services\ProductServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserServiceInterface::class,
            UserService::class);

        $this->app->singleton(UserRepositoryInterface::class,
            UserRepository::class);

        $this->app->singleton(CustomerRepositoryInterface::class,
            CustomerRepository::class);

        $this->app->singleton(CustomerServiceInterface::class,
            CustomerService::class);

        $this->app->singleton(BillRepositoryInterface::class,
            BillRepository::class);

        $this->app->singleton(BillServiceInterface::class,
            BillService::class);

        $this->app->singleton(ProductRepositoryInterface::class,
            ProductRepository::class);

        $this->app->singleton(ProductServiceInterface::class,
            ProductService::class);

        $this->app->singleton(CartRepositoryInterface::class,
            CartRepository::class);

        $this->app->singleton(CartServiceInterface::class,
            CartService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Resource::withoutWrapping();
    }
}
