<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // way how to implement lavary menus https://github.com/lavary/laravel-menu, 19.9.2021 + about use https://lavary.github.io/laravel-menu/, 19.9.2021
        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('Home');
            $menu->add('About', 'about');
            $menu->add('Services', 'services');
            $menu->divide(); // separator in menu
            $menu->add('Contact', 'contact');
            
            
        });

        \Menu::make('SecondNavBar', function ($menu) {
            
            $menu->add('About', 'about');
            $menu->add('Guestbook', 'services');
            $menu->add('Contact', 'contact');
        });

        return $next($request);
    }
}
