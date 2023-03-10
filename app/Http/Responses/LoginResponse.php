<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Termwind\Components\Dd;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        $redirect = '/role';

        if (Auth::user()->hasRole('admin')) {
            // dd('admin');
            $redirect = '/admin-dashboard';
        }
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended($redirect);
    }
}
