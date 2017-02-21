<?php

namespace App\Providers;

use App\Policies\GetUserInfo;
use App\Policies\IsSellingTicket;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => GetUserInfo::class,
        Ticket::class => IsSellingTicket::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        foreach($this->getPermissions() as $permission){
//            Gate::define($permission->name, function($user) use ($permission){
//                return $user->hasRole($permission->roles);
//            });
//        }

    }

    protected function getPermissions() {
        return Permission::with('roles')->get();
    }
}
