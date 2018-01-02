<?php

namespace InChetanThumar\LaravelAuth\lib;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait CustomAuthUsers {
    
    use AuthenticatesUsers;

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', '_token');
    }
}
