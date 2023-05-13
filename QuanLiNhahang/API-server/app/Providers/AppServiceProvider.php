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
use  App\Repositories\Role\RoleRepository;
use  App\Repositories\Role\RoleRepositoryInterface;
use  App\Repositories\Material\MaterialRepository;
use  App\Repositories\Material\MaterialRepositoryInterface;

use  App\Repositories\MaterialBillInfo\MaterialBillInfoRepository;
use  App\Repositories\MaterialBillInfo\MaterialBillInfoRepositoryInterface;

use  App\Repositories\MaterialBill\MaterialBillRepository;
use  App\Repositories\MaterialBill\MaterialBillRepositoryInterface;


use  App\Repositories\Inventory\InventoryRepository;
use  App\Repositories\Inventory\InventoryRepositoryInterface;
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
        RoleRepositoryInterface::class => RoleRepository::class,
        MaterialRepositoryInterface::class => MaterialRepository::class,
        MaterialBillRepositoryInterface::class => MaterialBillRepository::class,
        MaterialBillInfoRepositoryInterface::class => MaterialBillInfoRepository::class,
        InventoryRepositoryInterface::class => InventoryRepository::class,



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
