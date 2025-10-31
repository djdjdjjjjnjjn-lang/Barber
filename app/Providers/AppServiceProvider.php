<?php

namespace App\Providers;

use App\Models\User; // <-- Jangan lupa import User Model
use Illuminate\Support\Facades\Gate; // <-- Jangan lupa import Gate
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
public function boot(): void
{
    Gate::define('manage-services', function ($user) {
    return $user->role === 'admin';
});
}
}