<?php

namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;
use App\Order_header;
use App\Policies\Order_headerPolicy;
use App\Customer;
use App\Policies\CustomerPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        User::class => UserPolicy::class,
        Order_header::class => Order_HeaderPolicy::class,
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
