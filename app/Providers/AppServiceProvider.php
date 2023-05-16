<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
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

        // dd(!Str::contains(url()->current(), '/messages'));
        if (!Str::contains(url()->current(), '/conversations') && !Str::contains(url()->current(), '/messages')) {
            Model::preventLazyLoading(!$this->app->isProduction());
        }
        Relation::enforceMorphMap([
            'post' => Post::class,
            'user' => User::class,
            'shot' => Shot::class,
        ]);
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
