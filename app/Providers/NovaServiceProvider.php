<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Metrics\Order_headersPerDay;
use App\Nova\Metrics\OrderamountPerDay;
use App\Nova\Metrics\OrderamountPerMonth;
use App\Task;
use App\Observers\TaskObserver;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::serving(function () {
            Task::observe(TaskObserver::class);
        });

    }


    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'wasandev@gmail.com',
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new OrderamountPerMonth)->width('full')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new Order_headersPerDay)->width('1/2')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),
            (new OrderamountPerDay)->width('1/2')
                ->canSee(function ($request) {
                    return $request->user()->role == 'admin';
                }),


        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
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
}
