<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Auth;

Trait Funcs {

    function success($msg = 'all.done_successfully'){
        session()->flash('success', __($msg));
    }

    function error($msg = 'all.not_done_successfully'){
        session()->flash('error', __($msg));
    }


    function role($role)
    {
        if (!Auth::user()->checkRole($role)) {
            session()->flash('error', __('auth.403'));
            return back();
        }
    }
}
