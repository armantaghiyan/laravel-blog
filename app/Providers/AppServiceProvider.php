<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void {
        Relation::morphMap([
            'post' => Post::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}
