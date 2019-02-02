<?php

namespace App\Providers;

use App\Task;
use App\Observers\TaskObserver;
use App\Post;
use App\Observers\PostObserver;



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
        Task::observe(TaskObserver::class);
        Post::observe(PostObserver::class);

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
