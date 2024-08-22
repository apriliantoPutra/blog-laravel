<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // mengatasi lazy loading (jika terdapat lazy loading akan error) Optional
        Model::preventLazyLoading();

        // fitur admin
        Gate::define('admin', function(User $user){
            return $user->is_admin;
        });
    }
}
