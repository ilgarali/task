<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\CompanyRepository;
use App\Repository\EmployeeRepository;
use App\Repository\Interfaces\BaseInterface;
use App\Repository\Interfaces\CompanyInterface;
use App\Repository\Interfaces\EmployeeInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseInterface::class,BaseRepository::class);
        $this->app->bind(CompanyInterface::class,CompanyRepository::class);
        $this->app->bind(EmployeeInterface::class,EmployeeRepository::class);


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
