<?php

namespace InChetanThumar\LaravelAuth\lib;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

trait AuthUsers {
    
    use AuthenticatesUsers;
    
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    

}
