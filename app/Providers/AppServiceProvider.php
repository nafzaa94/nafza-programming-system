<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('update', function (User $user) {
            return $user->status_update === "0";
        });

        Gate::define('order', function (User $user) {
            return $user->status_update === "1";
        });

        Gate::define('github', function (User $user) {
            return $user->status_github === "1";
        });

        Gate::define('halfpayment', function (User $user) {
            return $user->status_payment === "half payment";
        });

        Gate::define('fullpayment', function (User $user) {
            return $user->status_payment === "full payment";
        });

        Gate::define('nopayment', function (User $user) {
            return $user->status_payment === "no payment";
        });

        Gate::define('admin', function (User $user) {
            return $user->status === "Admin";
        });

        Gate::define('user', function (User $user) {
            return $user->status === "User";
        });
    }
}
