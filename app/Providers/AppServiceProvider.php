<?php

namespace App\Providers;

use App\Http\Controllers\LangController;
use App\Repositories\AdminRepositoryInterface;
use App\Repositories\BillRepositoryInterface;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\impl\AdminRepository;
use App\Repositories\impl\AdminService;
use App\Repositories\impl\BillRepository;
use App\Repositories\impl\CartRepository;
use App\Repositories\impl\CustomerRepository;
use App\Repositories\impl\ProductRepository;
use App\Repositories\impl\ProfileRepository;
use App\Repositories\impl\UserRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProfileRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\AdminServiceInterface;
use App\Services\BillServiceInterface;
use App\Services\CartServiceInterface;
use App\Services\CustomerServiceInterface;
use App\Services\impl\BillService;
use App\Services\impl\CartService;
use App\Services\impl\CustomerService;
use App\Services\impl\LangService;
use App\Services\impl\MailService;
use App\Services\impl\ProductService;
use App\Services\impl\ProfileService;
use App\Services\impl\UserService;
use App\Services\LangServiceInterface;
use App\Services\MailServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\ProfileServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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

        $this->app->singleton(ProfileServiceInterface::class,
            ProfileService::class);

        $this->app->singleton(ProfileRepositoryInterface::class,
            ProfileRepository::class);

        $this->app->singleton(AdminServiceInterface::class,
            AdminService::class);
        $this->app->singleton(AdminRepositoryInterface::class,
            AdminRepository::class);

        $this->app->singleton(MailServiceInterface::class,
            MailService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
