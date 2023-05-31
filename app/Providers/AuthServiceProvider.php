<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // gate untuk admin
        Gate::define('is-admin', function($user){
            return $user->role == 'admin';
        });

        // gate untuk guru
        Gate::define('is-guru', function($user){
            return $user->role == 'guru';
        });

        Gate::define('is-siswa', function($user){
            return $user->role == 'siswa';
        });
    }
}
