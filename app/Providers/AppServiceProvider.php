<?php

namespace App\Providers;

use App\Models\Ability;
use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupBouncer();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function setupBouncer()
    {
        \Bouncer::useRoleModel(Role::class);
        \Bouncer::useAbilityModel(Ability::class);

        \Bouncer::tables([
            'abilities'      => 'auth.abilities',
            'permissions'    => 'auth.permissions',
            'roles'          => 'auth.roles',
            'assigned_roles' => 'auth.assigned_roles'
        ]);
    }
}
