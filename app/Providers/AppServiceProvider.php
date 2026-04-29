<?php
namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('viewPanel', function (User $user) {
            return $user->role === 'admin';
        });
    }
}