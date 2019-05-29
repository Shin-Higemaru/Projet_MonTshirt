<?php

namespace App\Providers;

use App\Category;
use App\Http\ViewComposers\HeaderComposer;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
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
    public function boot(UrlGenerator $url)
    {
        if (env('APP_ENV') ==="production") {
            $url->forceScheme('https');
        }
        //
        Schema::defaultStringLength(191);
//        View::share('categories',Category::all());
//        View::share('categories',Category::where('id_parent','=',null)->get());
//        View::share('total_products_cart',\Cart::getContent()->count());
//        dd($request->session

        view()->composer(['shop','process','shop.*'],HeaderComposer::class);
    }
}
