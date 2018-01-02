<?php

namespace InChetanThumar\LaravelAuth\lib;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

trait CustomAuthUsers {
    
    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('laravel-auth::auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        if(config('auth.providers.users.driver') == 'database') {
            return \DB::table(config('auth.providers.users.table'))->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } else {
            return config('auth.providers.users.model')::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        }
    }
}
