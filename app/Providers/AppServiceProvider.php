<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $navigation_parts = DB::select('select id, title, slug from parts');
        View::share('navigation_parts', $navigation_parts);

        $navigation_cats = DB::select('select title, slug, part_id from categories');
        View::share('navigation_cats', $navigation_cats);
    }
}
