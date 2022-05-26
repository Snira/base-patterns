<?php

namespace App\Providers;

use App\Contracts\Support\ClassInstantiator as ClassInstantiatorContract;
use App\Support\ClassInstantiator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClassInstantiatorContract::class, ClassInstantiator::class);
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
