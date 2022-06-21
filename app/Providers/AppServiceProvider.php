<?php

namespace App\Providers;

use App\Http\Middleware\cansee;

use App;
use App\Models\Admins;

use App\Models\lead;
use App\Models\TestClass;
use Illuminate\Support\Facades\Route;
use App\Models\data;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Leads;
use Illuminate\Support\Facades\DB;
use App\Service\ServiceClass;
use App\Http\Test;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    $this->app->singleton("Test1",function(){
        return new Test('Bulzart');
    });
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
