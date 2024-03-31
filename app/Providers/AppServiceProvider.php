<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        $this->registerAuthMiddleware();
    }

    /**
     * Register authentication middleware.
     */
    protected function registerAuthMiddleware(): void
    {
        // Define authentication middleware for web routes
        // Route::middlewareGroup('web', [
        //     \App\Http\Middleware\Authenticate::class,
        //     // Other middleware...
        // ]);

        // Define authentication middleware for API routes
        Route::middlewareGroup('api', [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // Other middleware...
        ]);
    }
}
