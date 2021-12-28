<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'post' => Post::class,
            'user' => User::class,
            'shot' => Shot::class,
        ]);
    }
}
