<?php

namespace App\Providers;

use App\Contracts\Factories\ResourceFactory as ResourceFactoryContract;
use App\Contracts\Factories\RecipeFactory as RecipeFactoryContract;
use App\Contracts\Repositories\RecipeRepository;
use App\Contracts\Support\ClassInstantiator as ClassInstantiatorContract;
use App\Factories\RecipeFactory;
use App\Factories\ResourceFactory;
use App\Repositories\EloquentRecipeRepository;
use App\Support\ClassInstantiator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected static array $factories = [
        ResourceFactoryContract::class => ResourceFactory::class,
        RecipeFactoryContract::class => RecipeFactory::class,
    ];

    protected static array $repositories = [
        RecipeRepository::class => EloquentRecipeRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClassInstantiatorContract::class, ClassInstantiator::class);

        $this->registerFactories();
        $this->registerRepositories();
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

    private function registerFactories(): void
    {
        foreach (static::$factories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    private function registerRepositories(): void
    {
        foreach (static::$repositories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
