<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Settings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $delete_dialog = filter_var(Setting::find('delete_dialog')->value ?? 0 , FILTER_VALIDATE_BOOLEAN);
        $dark_mode = filter_var(Setting::find('dark_mode')->value ?? 0 , FILTER_VALIDATE_BOOLEAN);
        $fixed_navbar = filter_var(Setting::find('fixed_navbar')->value ?? 0 , FILTER_VALIDATE_BOOLEAN);
        $collaps_sidebar = filter_var(Setting::find('collaps_sidebar')->value ?? 0 , FILTER_VALIDATE_BOOLEAN);
        $font = Setting::find('font')->value ?? 'sans-serif';
        $notification_sound = Setting::find('notification_sound')->value ?? 'no_sound';

        View::share('fixed_navbar' , $fixed_navbar);
        View::share('delete_dialog' , $delete_dialog);
        View::share('dark_mode' , $dark_mode);
        View::share('font' , $font);
        View::share('notification_sound' , $notification_sound);
        View::share('collaps_sidebar' , $collaps_sidebar);

        return $next($request);
    }
}
