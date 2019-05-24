<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Item;
use App\User;
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
        //share categories data globally with other views
        $categories = Category::all();
        View::share('categories', $categories);

        $items = Item::all();
        View::share('items', $items);

        $user= new User;
        $usersOnline= $user->allOnline();
        View::share('usersOnline', $usersOnline);


    }
}
