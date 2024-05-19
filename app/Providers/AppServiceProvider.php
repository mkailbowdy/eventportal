<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);

        // Hides the directories from malicious users
        Relation::morphMap([
            'event' => 'App\Models\Event',
            'user' => 'App\Models\User',
            'group' => 'App\Models\Group',
        ]);

    }
}
