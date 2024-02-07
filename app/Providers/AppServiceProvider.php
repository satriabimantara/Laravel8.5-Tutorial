<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        // change from default Tailwind to CSS for pagination feature
        Paginator::useBootstrap();

        // Implementasi Gate untuk authorization bagi user yang sudah login
        Gate::define('is_admin', function (User $user) {
            return $user->is_admin == 1;
        });
    }
}
