<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TanamanJenis;

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
        View::composer('*', function ($view) {
            $userId = auth()->id();  // Get the logged-in user's id
            $tanaman = TanamanJenis::where('id_user', $userId)->get();  // Filter based on user id
            $view->with('tanaman', $tanaman);
        });
    }
}
