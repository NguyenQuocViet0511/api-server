<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Repositories\Table\TableRepository;
use  App\Repositories\Table\TableRepositoryInterface;
use  App\Repositories\Category\CategoryRepository;
use  App\Repositories\Category\CategoryRepositoryInterface;
use  App\Repositories\Food\FoodRepository;
use  App\Repositories\Food\FoodRepositoryInterface;
use  App\Repositories\Bill\BillRepository;
use  App\Repositories\Bill\BillRepositoryInterface;
use  App\Repositories\User\UserRepository;
use  App\Repositories\User\UserRepositoryInterface;
use  App\Repositories\BillInfo\BillInfoRepository;
use  App\Repositories\BillInfo\BillInfoRepositoryInterface;
use  App\Repositories\TimeSheet\TimeSheetRepository;
use  App\Repositories\TimeSheet\TimeSheetRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

     private $_listRepoMapInterface = [
        TableRepositoryInterface::class => TableRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
        FoodRepositoryInterface::class => FoodRepository::class,
        BillRepositoryInterface::class => BillRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        BillInfoRepositoryInterface::class => BillInfoRepository::class,
        TimeSheetRepositoryInterface::class => TimeSheetRepository::class,

    ];

    public function register()
    {
        foreach($this -> _listRepoMapInterface as $key =>  $value)
        {
            $this->app->bind($key,$value);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
